<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	var $conditions = array();
 
    function beforefilter() {
		parent::beforefilter();	
		$this->Auth->allow("login","logout","forgotpassword","signup","loginwith");		 
    }	
	
	/*
     * @function name	: login
     * @purpose			: login for superadmin
     * @arguments		: none
     * @return			: none  
     * @description		: NA
     */
	function login($url = NULL) {	
		//echo $this->Auth->password(123456);
		$this->layout ="admin";
        $this->Auth->logout();
        $this->set('title_for_layout', 'User Login');
        if (!empty($url)) {
            $url = implode("/", $this->params['pass']);
        }
        if ($this->Session->read("Auth.User.id")) {
            $val = $this->Session->read("Auth");
			if ( $val['User']['user_type'] == 1 ) {
				$this->redirect("/admin/dashboard");
			} else {
				$this->redirect("/admin/dashboard");
			}
        } else {
			
            if ((isset($this->data) && !empty($this->data))) {
				//pr($this->data);
			//die;
                $this->__login($url);
            } elseif ($this->Cookie->read('Auth.User')) {
                $user = $this->Session->read("Auth.User.id");
                if (empty($user)) {
                    $this->__login($url);
                }
            }
        }
    }    
	/* end of function */
    function __login($url = NULL) {       
		 if (isset($this->data) && !empty($this->data)) {
			// pr($this->data);
			// die;
			if ($this->Auth->login()) {
				
				$this->loginedUserInfo = $this->Session->read("Auth.User");
				$status = array(1);
                if (!empty($this->loginedUserInfo) && empty($this->loginedUserInfo['status']) ) {
                    $this->Session->setFlash("Your account is not activated yet.");
                    $this->Auth->logout();
                    $this->redirect(array("action" => "login"));
                    exit;
                }
            } else {
				$this->Session->setFlash("The email or password you entered is incorrect.");
                $this->Auth->logout();
                $this->redirect(SITE_LINK."login");
                exit;
            }
			//$log = $this->User->getDataSource()->getLog(false, false);
			//debug($log);
			//pr($log);
			//die;
        }
        /* code to perform remeber me functinality " remember_login " */
        //condition to check if remember me checkbox is checked or not, if checked a cookie Auth.Member will be written
        if (isset($this->data['User']['remember_me']) && !empty($this->data['User']['remember_me']) && !empty($this->loginedUserInfo)) {
            $cookie = array();
            $cookie['remembertoken'] = $this->encryptpass($this->data['User']['email']) . "^" . base64_encode($this->data['User']['password']);
            $data['User']['remembertoken'] = $this->encryptpass($this->data['User']['email']);
            $this->User->create();
            $this->User->id = $this->loginedUserInfo['id'];
            $this->User->save($data);
            $this->Cookie->write('Auth.User', $cookie, false, '+2 weeks');
        }
        //condition to check if cookie Auth.Member is set or not if set then automatically logged in
        if (empty($this->data)) {
            $cookie = $this->Cookie->read('Auth.User');
            if (!is_null($cookie)) {
                $cookie = explode("^", $cookie['remembertoken']);
                $this->User->recursive = 0;
                $user = $this->User->find("first", array("conditions" => array("User.remembertoken" => $cookie[0], "User.status" => 1), "fields" => array("User.email", "User.password")));
                $user['User']['password'] = base64_decode($cookie[1]);
                unset($user['User']['id']);
                $this->data = $user;
                if ($this->Auth->login()) {
                    $this->loginedUserInfo = $this->Auth->user();
                    // Clear auth message, just in case we use it.
                    $this->Session->delete('Message.auth');
                }
            } else {
                $this->Auth->logout();
            }
        }
		if ($this->Session->check('login_referrer')) {
			$loginReferrer = $this->Session->read('login_referrer'); 
			$this->Session->delete('login_referrer');
			$this->redirect($loginReferrer);
			return true;
		} else {
			$val = $this->Session->read("Auth");
			if ( $val['User']['user_type_id'] == 1 ) {
				$this->redirect(SITE_LINK."admin/dashboard");
			} else {
				$this->redirect(SITE_LINK."dashboard");
			}
		}

        
    }

    /* end of function */
    
	/*
     * @function name	: dashboard
     * @purpose			: dashboard for superadmin
     * @arguments		: none
     * @return			: none  
     * @description		: NA
     */
    function admin_dashboard() {
               
       $this->set('title_for_layout', 'Dashboard');
	   $this->render("dashboard");
    }
    
     
	/*
     * @function name	: logout
     * @purpose			: logout for superadmin
     * @arguments		: none
     * @return			: none  
     * @description		: NA
     */
	function admin_logout() {
		$loginReferrer = $this->referer();
		$this->Session->write('login_referrer',$loginReferrer); 
        $this->Cookie->delete('Auth.User');
        $this->Cookie->destroy();
        $this->Session->delete("Auth.User");
        $this->Auth->logout();
        $this->response->disableCache();
        $this->redirect(SITE_LINK."login");
      // $this->redirect($this->Auth->loginAction);
    }
    /* end of function */
    
	/*
     * @function name	: forgotpassword
     * @purpose			: forgot password for superadmin before login
     * @arguments		: none
     * @return			: none  
     * @description		: NA
     */
	function forgotpassword() {	
		$this->layout ="admin";
		$this->set("title_for_layout", "Forgot Password");
		if ($this->Session->read('Auth.User.id')) {
			$this->response->disableCache();
			$this->redirect("/");
		}
		if (isset($this->data) && !empty($this->data)) {			
			$arr = $this->User->find("first", array("conditions" => array("email" => $this->data['User']['email']),'fields'=>array('User.email','User.status','Userdetail.first_name','Userdetail.last_name'),'recursive'=>0));			
			//pr($arr); die;
			if (empty($arr)) {
				$this->Session->setFlash('Email does not exists.');
			} else {
				if ($arr['User']['status'] == 1) {					
					$new_password = rand(100000, 999999);
					$arr['User']['password'] = $this->Auth->password($new_password);
					/* code to send email confirmation for signup */
					$user = $arr['Userdetail']['first_name'] . ' ' . $arr['Userdetail']['last_name'];
					$this->getmaildata(FORGOT_PASSWORD);
					$this->mailBody = str_replace("{USER}", $user, $this->mailBody);
					$this->mailBody = str_replace("{PASSWORD}", $new_password, $this->mailBody);
					
					$flag = $this->sendmail($arr['User']['email']);
					/* code to send email confirmation for signup */

					if ($flag) {
						$this->Session->setFlash('Your password has been sent to your registered email.', 'default', array("class" => "success_message"));
						$this->User->save($arr);
					} else {
						$this->Session->setFlash('An error occured, please try later.');
					}
				} else {
					$this->Session->setFlash("This account has not been activated yet.");
				}
			}
			$this->redirect(SITE_LINK."forgotpassword");
		}
    }
    /* end of function */
    
    
    	/*
	 * @function name	: changepassword
	 * @purpose			: display form of change password and also performs password change functionlity
	 * @arguments		: none
	 * @return			: none
	 * @description		: NA
	*/
	public function admin_changepassword() {					
		if (!empty($this->data)) {			
			$password = $this->Auth->password($this->data['User']['currentpassword']);			
			$user = $this->User->find("first",array("conditions"=>array("User.id"=>$this->Auth->user('id'),'User.password'=>$password),'recursive'=>-1));				
			$new_pass =$this->Auth->password($this->data['User']['newpassword']);			
			if (empty($user)) {
				$this->Session->setFlash('Current password is not correct.');	
			} elseif(empty($this->data['User']['newpassword']) || empty($this->data['User']['confirmpassword'])) {
				$this->Session->setFlash('New and confirm password do not match.');
			} elseif($password == $new_pass){
			  	$this->Session->setFlash('New password can not be same as current password.');
			} elseif($this->data['User']['newpassword'] != $this->data['User']['confirmpassword']) {
				$this->Session->setFlash('New and confirm password do not match.', 'default');
			} else {				
				$data['User']['password'] =  $new_pass;				
				$this->User->create();	
				$this->User->id = $this->Auth->user('id');			
				$this->User->save($data);
				$this->Session->setFlash('Password has been updated successfully.', 'default');			
			}				
		}		
	}
	/* end of function 	*/
	
	
	
	

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$userTypes = $this->User->UserType->find('list');
		$this->set(compact('userTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$userTypes = $this->User->UserType->find('list');
		$this->set(compact('userTypes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	function signup() {
		$this->layout = "frontend";
		$accountstatus = '';
		$this->set("title_for_layout","User Signup");
	}
	
	
	public function loginwith($provider) {
	    $this->autoRender = false;
		require_once( WWW_ROOT . 'hybridauth/Hybrid/Auth.php' );
		$hybridauth_config = array(
            "base_url" => 'http://' . $_SERVER['HTTP_HOST'] . $this->base . "/hybridauth/", // set hybridauth path
            "providers" => array(
                "Facebook" => array(
                    "enabled" => true,
                    "keys" => array("id" => "124384158044511", "secret" => "4ae9dd2f209893e63807b02c929fe17e"),
                    'scope'   => 'email, user_about_me, user_birthday, user_hometown, user_website, read_stream',
                    'trustForwarded' => false
                ),
                "Twitter" => array(
                    "enabled" => true,
                    "keys" => array("key" => "gjWVPpuiOsBpmql5ecCCKqf13", "secret" => "3vhOiytkkCldzmdZXQS7CpJUYOxcZS5LjVpEstVgP1gK4ZDBNH")
                )
	// for another provider refer to hybridauth documentation
            )
        );
		//pr($hybridauth_config);
		//echo($provider);
        try {
            // create an instance for Hybridauth with the configuration file path as parameter
            $hybridauth = new Hybrid_Auth($hybridauth_config);
			// try to authenticate the selected $provider
            $adapter = $hybridauth->authenticate($provider);
            // grab the user profile
            $user_profile = $adapter->getUserProfile();
			//pr($user_profile);
			//die("here");
            //login user using auth component
            if (!empty($user_profile)) {
                $user = $this->_findOrCreateUser($user_profile, $provider); // optional function if you combine with Auth component
                //unset($user['password']);
                $user['password'] = $user['email'];
				//pr($user);
				$udata['email'] = $user['email'];
				$udata['password'] = $user['email'];
				//die;
                $this->request->data['User'] = $udata;
                if ($this->Auth->login($this->request->data['User'])) {
					$res = $this->Session->read("Auth");
					echo "<pre>";
					print_r($res);
					die;
					//$this->getuserdetail();
					$this->Session->setFlash('You are successfully logged in.', 'default', array("class"=>"success_message"));
					$this->redirect(SITE_LINK."/profile");
                    
                } else {
                    $this->Session->setFlash('Failed to login.');
                }
            }
        } catch (Exception $e) {
            // Display the recived error
            switch ($e->getCode()) {
                case 0 : $error = "Unspecified error.";
                    break;
                case 1 : $error = "Hybriauth configuration error.";
                    break;
                case 2 : $error = "Provider not properly configured.";
                    break;
                case 3 : $error = "Unknown or disabled provider.";
                    break;
                case 4 : $error = "Missing provider application credentials.";
                    break;
                case 5 : $error = "Authentification failed. The user has canceled the authentication or the provider refused the connection.";
                    break;
                case 6 : $error = "User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.";
                    $adapter->logout();
                    break;
                case 7 : $error = "User not connected to the provider.";
                    $adapter->logout();
                    break;
            }

            // well, basically you should not display this to the end user, just give him a hint and move on..
            $error .= "Original error message: " . $e->getMessage();
            $error .= "Trace: " . $e->getTraceAsString();
            $this->set('error', $error);
        }
        //die("here");
    }
	
	
	function logoutwith($provider = NULL) {
		$this->autoRender = false;
		require_once( WWW_ROOT . 'hybridauth/Hybrid/Auth.php' );
		$hybridauth_config = array(
            "base_url" => 'http://' . $_SERVER['HTTP_HOST'] . $this->base . "/hybridauth/", // set hybridauth path

            "providers" => array(
                "Facebook" => array(
                    "enabled" => true,
                    "keys" => array("id" => "your_fb_api_key", "secret" => "fb_api_secret"),
                    "scope" => 'email',
                ),
                "Twitter" => array(
                    "enabled" => true,
                    "keys" => array("key" => "CSpbRJK5eAEod91O7js5Gg", "secret" => "8KGhKpPzYRDX6FYkPVXTzvELN1D7pXtA78SYSnq44")
                )
	// for another provider refer to hybridauth documentation
            )
        );
        
         try {
            // create an instance for Hybridauth with the configuration file path as parameter
            $hybridauth = new Hybrid_Auth($hybridauth_config);
			// try to authenticate the selected $provider
            $adapter = $hybridauth->logoutAllProviders();
            // grab the user profile
            
        } catch (Exception $e) {
            // Display the recived error
            switch ($e->getCode()) {
                case 0 : $error = "Unspecified error.";
                    break;
                case 1 : $error = "Hybriauth configuration error.";
                    break;
                case 2 : $error = "Provider not properly configured.";
                    break;
                case 3 : $error = "Unknown or disabled provider.";
                    break;
                case 4 : $error = "Missing provider application credentials.";
                    break;
                case 5 : $error = "Authentification failed. The user has canceled the authentication or the provider refused the connection.";
                    break;
                case 6 : $error = "User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.";
                    $adapter->logout();
                    break;
                case 7 : $error = "User not connected to the provider.";
                    $adapter->logout();
                    break;
            }

            // well, basically you should not display this to the end user, just give him a hint and move on..
            $error .= "Original error message: " . $e->getMessage();
            $error .= "Trace: " . $e->getTraceAsString();
            $this->set('error', $error);
        }
	}

	// this is optional function to create user if not already in database. you can do anything with your hybridauth object
	private function _findOrCreateUser($user_profile = array(), $provider=null) {
        if (!empty($user_profile)) {

			$user = $this->User->find('first', array('conditions' => array('User.email' => $user_profile->identifier)));
			if (empty($user)) {
				$this->User->create();
				$userval['User']['email'] = !empty($user_profile->email)?$user_profile->email:$user_profile->identifier;
				//$userval['User']['password'] = $this->Auth->password($userval['User']['email']);
				$userval['User']['password'] = $this->Auth->password($userval['User']['email']);
				$userval['User']['loginfrom']= $provider;
				
                if ($this->User->save($userval,array('validate' => false))) {
					$this->loadModel("Userdetail");
					$this->Userdetail->create();
					$userid = $this->User->getLastInsertId();
					$userdetail['Userdetail']['user_id'] = $userid;
					if (!empty($user_profile->firstName)) { 
						$userdetail['Userdetail']['first_name'] = $user_profile->firstName;
						if(!empty($user_profile->lastName)) {
							$userdetail['Userdetail']['last_name'] = $user_profile->lastName;
						}
					} else {
						$userdetail['Userdetail']['first_name'] = $user_profile->displayName;
					}
					$this->Userdetail->save($userdetail);
                    $this->User->recursive = 0;
                    $user = $this->User->read(null, $userid);
                    return $user['User'];
                }
            } else {
				return $user['User'];
            }
        }
    }
	
	function profile() {
		die("here");
	}
	
}
