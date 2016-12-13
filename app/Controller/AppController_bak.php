<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
		
/*
 * Below written arrays and variable will be used in calling APIs and check the component to be called
 * 
*/     
	public $helpers		= array("Form","Html","Session");
    public $components = array("Paginator", "Session", "Cookie", "Auth" => array(
            'loginAction' => array(
                'controller' => 'users',
                'action' => 'login'
            ),
            'authError' => 'Did you really think you are allowed to see that?',
            'authenticate' => array(
                'Form' => array(
                    'userModel' => 'User',
                    'fields' => array(
                        'username' => 'email',
                        'password' => 'password'
                    )
                )
            ),
            'loginRedirect' => array('controller' => 'users', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login')
    ));
    
	
	
	
	public $mailBody = '';
    public $from = '';
    public $subject = '';
    public $siteUrl = '';
    public $msg = '';
	/* public array variable to be used to get ids of records to be deleted */	
	public $delarr = array();
	/* public array variable to be used to get ids of records to be updated */	
	public $updatearr = array();
	public $uploaddir = '';
	public $imagename = '';
	
	function beforeFilter() {	
		Security::setHash('sha256');	
		//echo $this->Auth->password('123456'); die;		
		if(!defined('SITE_LINK')) {
				define("SITE_LINK", "http://swankcook.com/");				
				//define("SITE_LINK", "http://".$_SERVER['SERVER_NAME'].$this->params->base."/");				
		}
		
		if ( $this->params['prefix'] == 'admin' ) {
			$this->layout = 'admin';
			if ( !$this->Session->read("Auth.User.id") || $this->Session->read("Auth.User.user_type_id") != 1 ) {
				$this->Session->setFlash("You are not authorized to perform this action.");
				$this->redirect("/");
			}
		} else {
			$this->layout = 'frontend';
		}
		$this->siteUrl = "http://".$_SERVER['SERVER_NAME'].$this->params->base."/";
	}
	
	function beforeRender() {
        if ($this->name == 'CakeError') {
            $this->layout = 'error';
        }
    }

	//~ if (!$this->Session->check('User')) {
		//~ $this->Session->write('login_referrer',$this->params['url']['url']);
	//~ }
	/*
     * @function name	: getmaildata
     * @purpose			: getting email data for various purposes
     * @arguments		: Following are the arguments to be passed:
     * id				: id of email templates from cmsemail table
     * @return			: NONE
     * @created on		: 
     * @description		: function will assign value to global variables like mailbody,from, subject which will be used while sending email
     */

    function getMailData($mail_slug = null, $to = null) {
        $this->loadModel('Cmsemail');
        $cmsemail = $this->Cmsemail->find('first', array('conditions' => array('Cmsemail.mail_slug' => $mail_slug)));
        if (!empty($cmsemail)) {
			$this->mailBody = $cmsemail['Cmsemail']['mailcontent'];
            $this->from = $cmsemail['Cmsemail']['mailfrom'];
            $this->subject = str_replace("{TO}", $to, $cmsemail['Cmsemail']['mailsubject']);
        }
    }

    /* end of function */
    /*
     * @function name	: sendmail
     * @purpose			: sending email for various actions
     * @arguments		: Following are the arguments to be passed:
     * from		: contain email address from which email is sending
     * Subject	: Subject of Email
     * to		: Email address to whom the email is sending
     * body		: content of email
     * template : if defining a html template for sending email else false.
     * values	: to be given in email template like username etc.
     * @return			: true if email sending successfull else return false.
     * @created on		: 11th March 2014
     * @description		: NA
     */

    function sendMail($to, $template = 'email', $fromname = 'JioCart') {
        App::uses('CakeEmail', 'Network/Email');
       // if (isset($this->params->base) && !empty($this->params->base)) {
            $email = new CakeEmail("gmail");
        //} else {
         //   $email = new CakeEmail();
        //}
        //Use filter_var_array for multiple emails
        $is_valid = is_array($to) ? filter_var_array($to, FILTER_VALIDATE_EMAIL) : filter_var($to, FILTER_VALIDATE_EMAIL);
        
        if ($is_valid) {
			$email->from(array($this->from => $fromname));
            $email->to($to);
            $email->subject($this->subject);
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=iso-8859-1';
            $email->addHeaders($headers);
            $email->emailFormat('both');
            if (empty($template)) {
                try {
                    if ( !$email->send($this->mailBody)) {
						throw new Exception;
					} else {
						return true;
					}
                } catch (Exception $e) {
                    echo $e->getMessage();
                    die;
                    return false;
                }
            } else {
                if (!empty($this->mailBody)) {
                    $email->viewVars(array("mail" => $this->mailBody));
                }
                $email->template($template, 'default');
                try {
                    if (!$email->send()) {
						throw new Exception;
					} else {
						return true;
					}
                    
                } catch (Exception $e) {
                    echo $e->getMessage();
                    die;
                    return false;
                } 
            }
        } else {
            return false;
        }
    }

    /* end of function */
    
    
   function encryptpass($password, $method = 'md5', $crop = true, $start = 4, $end = 10) {
        if ($crop) {
            $password = $method(substr($method($password), $start, $end));
        } else {
            $password = $method($password);
        }
        return $password;
    }
    
	function uploadProductImage($file , $destination = NULL, $old_img = NULL,$first = NULL,$second=NULL, $filetypes = array('jpg', 'jpeg', 'png')) {
		$flag = false;
		$file_ext = explode(".",$file['name']);
		$file_ext = strtolower(end($file_ext));
		$this->imagename = $this->uploaddir =  '';
		if ( in_array($file_ext,$filetypes) ) {
			
			$this->uploaddir = WWW_ROOT."/img/".$destination."/";
			
			if ( !empty($destination) && !is_dir($this->uploaddir) ) {
				mkdir($this->uploaddir,0777,true);
			}
			$this->imagename = mt_rand().strtotime(date("y-m-d h:i:s")).".".$file_ext;
			
			
			if ( move_uploaded_file($file['tmp_name'],$this->uploaddir.$this->imagename) ) {
				if(!empty($old_img)) {					
					@unlink($first);					
					@unlink($second);					
				}
				$flag = true;
			} 
		} else {			
			$flag = false;
		}
		return $flag; 
	}
	
	function uploadProductfile($file , $destination = NULL, $old_img = NULL,$first = NULL,$second=NULL, $filetypes = array('pdf')) {
		$flag = false;
		$file_ext = explode(".",$file['name']);
		$file_ext = strtolower(end($file_ext));
		$this->imagename = $this->uploaddir =  '';
		if ( in_array($file_ext,$filetypes) ) {
			
			$this->uploaddir = WWW_ROOT."/img/".$destination."/";
			
			if ( !empty($destination) && !is_dir($this->uploaddir) ) {
				mkdir($this->uploaddir,0777,true);
			}
			$this->imagename = mt_rand().strtotime(date("y-m-d h:i:s")).".".$file_ext;
			
			
			if ( move_uploaded_file($file['tmp_name'],$this->uploaddir.$this->imagename) ) {
				if(!empty($old_img)) {					
					@unlink($first);					
					@unlink($second);					
				}
				$flag = true;
			} 
		} else {			
			$flag = false;
		}
		return $flag; 
	}
	
	function bulkactions($flag = false) {
		/* code to change status and delete by checking data from page */
		$controller = is_array($this->data)?array_keys($this->data):'';
		$statuskey  = '';
		$controller = isset($controller[0])?$controller[0]:'';
		$allowedarr = array("Account","User");
		if (isset($this->data[$controller]) && !empty($this->data[$controller]['options']) && !empty($controller) && !empty($this->data['id'])) {
			//pr($this->data);
			//die;
			foreach ($this->data['id'] as $key=>$val) {
				if ($val > 0) {
					$this->delarr[]	= $key;
					if ($flag) {
						$statuskey		= ($this->data[$controller]['options']);
						$this->updatearr[$controller][$key]	= array("id"=>$key,"approve"=>($this->data[$controller]['options']));
					} else {
						$statuskey		= ($this->data[$controller]['options'] == 'Active'?1:0);
						$this->updatearr[$controller][$key]	= array("id"=>$key,"status"=>($this->data[$controller]['options'] == 'Active'?1:0));
					}
				}
			}
			if (isset($this->data[$controller]['options']) && $this->data[$controller]['options'] == 'Delete') {
				if($flag == 1){
					if($this->unlinkDB($this->delarr)){
						$this->$controller->delete($this->delarr);
						$this->redirect($this->referer());
					}
				}
				else{
					if($this->$controller->delete($this->delarr)) {
						$this->Session->setFlash(__('Record has been deleted successfully.'));
					}
					$this->redirect($this->referer());
				}
				$statuskey = -1;
			} else {								
				if($this->$controller->saveAll($this->updatearr[$controller])) {
					 $this->Session->setFlash(__('Record has been updated successfully.'));
				}				
				$this->redirect($this->referer());
				
			}
			if (empty($this->data['Admin']['searchval'])) {
				$this->data = array();
			}
		}
		if (in_array($controller,$allowedarr) && $statuskey > -1) {
			$arr['keys'] 	= $this->delarr;
			$arr['status']  = $statuskey;
			return $arr; 
		}
		if ($flag) {
			$arr['keys'] = $this->delarr;
			$arr['status']  = $statuskey;
			return $arr; 
		}
		
		/* end of code to change status and delete by checking data from page */
	}
/* end of function */
    
	
}



