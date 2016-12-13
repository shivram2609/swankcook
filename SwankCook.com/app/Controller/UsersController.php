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
		$this->allowed = array('login','signup','logout','loginwith','logoutwith','forgotpassword',"confirmation","admin_logout");
		parent::beforefilter();
		$this->checkAction();
	}	
	
	/*
     * @function name	: login
     * @purpose			: login for superadmin
     * @arguments		: none
     * @return			: none  
     * @description		: NA
     */
	function login($url = NULL) {
	//pr($this->Session->read("AuthUser"));
	//die("here");
		$this->checklogin();
		//$this->layout ="admin";
        $this->set('title_for_layout', 'User Login');
        if (!empty($url)) {
            $url = implode("/", $this->params['pass']);
        }
        if ($this->Session->read("AuthUser.User.id")) {
            $val = $this->Session->read("AuthUser");
			if ( $val['User']['user_type'] == 1 ) {
				$this->redirect("/admin/dashboard");
			} else {
				$this->redirect("/admin/dashboard");
			}
        } elseif ((isset($this->data) && !empty($this->data))) {
			$this->__login();
        } 
    }    
    
    function __login($identifier = NULL) {
		if (isset($this->data) && !empty($this->data) && empty($identifier)) {
			$userName = $this->data['User']['email'];
			$password = $this->encryptpass($this->data['User']['password']);
			$this->User->hasMany = $this->User->belongsTo = $this->User->hasOne = array();
			$this->User->hasOne = array(
			
				"UserDetail" => array (
					"className" => "UserDetail",
					"foreignKey" => false,
					"conditions" => "User.id = UserDetail.user_id",
					"type" => "Inner"
				)
			);
			
			if ( $user = $this->User->find("first",array("conditions"=>array("email"=>$userName,"password"=>$password))) ) {
				if ( $user['User']['status'] == 1 ) {
					$this->Session->write("AuthUser",$user);
					
					if ( $user['User']['user_type_id'] == 1 ) {
						$this->redirect(SITE_LINK."admin/dashboard");
					} else {
						$this->redirect(SITE_LINK."dashboard");
					}
					
				} else {
					$this->Session->setFlash("Your account is not activated yet.");
                    $this->redirect(array("action" => "login"));
                    exit;
				}
			} else {
				$this->Session->setFlash("The email or password you entered is incorrect.");
                $this->redirect(SITE_LINK."login");
                exit;
			}
		} elseif (!empty($identifier)) {
			$this->User->hasMany = $this->User->belongsTo = $this->User->hasOne = array();
			$this->User->hasOne = array(
			
				"UserDetail" => array (
					"className" => "UserDetail",
					"foreignKey" => false,
					"conditions" => "User.id = UserDetail.user_id",
					"type" => "Inner"
				)
			);
			if ( $user = $this->User->find("first",array("conditions"=>array("identifier"=>$identifier))) ) {
				if ( $user['User']['status'] == 1 ) {
					$this->Session->write("AuthUser",$user);
					
					if ( $user['User']['user_type_id'] == 1 ) {
						$this->redirect(SITE_LINK."admin/dashboard");
					} else {
						$this->redirect(SITE_LINK."dashboard");
					}
					
				} else {
					$this->Session->setFlash("Your account is not activated yet.");
                    $this->redirect(array("action" => "login"));
                    exit;
				}
			} else {
				$this->Session->setFlash("The email or password you entered is incorrect.");
                $this->redirect(SITE_LINK."login");
                exit;
			}
		}
	}
    	
    	
    	function forgotpassword( $token = NULL ) {
    		if ($this->request->is("post")) {
    		
    		} elseif( !empty($token) ) {
    				
    		}
    	}
    
	/* end of function */
    function __login_bak($url = NULL) {       
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
			$val = $this->Session->read("AuthUser");
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
        $this->Cookie->delete('AuthUser');
        $this->Cookie->destroy();
        $this->Session->delete("AuthUser");
        $this->response->disableCache();
        $this->redirect(SITE_LINK."login");
      // $this->redirect($this->Auth->loginAction);
    }
    /* end of function */
    /*
     * @function name	: logout
     * @purpose			: logout for superadmin
     * @arguments		: none
     * @return			: none  
     * @description		: NA
     */
	function logout() {
		$loginReferrer = $this->referer();
		$this->Session->write('login_referrer',$loginReferrer); 
        $this->Cookie->delete('AuthUser');
        $this->Cookie->destroy();
        $this->Session->delete("AuthUser");
        $this->response->disableCache();
       // pr($this->Session->read("AuthUser"));
       // die("logout");
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
	function forgotpassword_bak() {	
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
			$password = $this->encryptpass($this->data['User']['currentpassword']);			
			$user = $this->User->find("first",array("conditions"=>array("User.id"=>$this->Session->read('AuthUser.User.id'),'User.password'=>$password),'recursive'=>-1));				
			$new_pass =$this->encryptpass($this->data['User']['newpassword']);			
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
				$this->User->id = $this->Session->read("AuthUser.User.id");			
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
	
	function signup($identifier = NULL) {
		$this->checklogin();
		$this->layout = "frontend";
		if ( $this->request->is('post') ) {
			$this->User->set($this->data);
			if ( $this->User->validates() ) {
				$this->User->hasMany = $this->User->hasOne = $this->User->belongsTo = array();
				$this->User->hasOne = array(
					"UserDetail" => array (
						"className" => "UserDetail",
						"foreignKey" => "user_id",
						"type" => "Inner"
					)
				);
				
				$userData = $this->data;
				$email = $userData['User']['email'];
				$identifier = $userData['User']['identifier'];
				$userData['User']['confirmationtoken'] = $confirmationtoken = $this->encryptpass(strtotime(date("Y-m-d h:i:s")));
				$userData['User']['loginfrom'] = empty($userData['User']['provider'])?'Site':$userData['User']['provider'];
				$userData['User']['password'] = isset($userData['User']['password'])?$this->encryptpass($userData['User']['password']):$this->encryptpass($userData['User']['identifier']);
				$userData['User']['status'] = $status = empty($userData['User']['identifier'])?0:1;
				$userData['UserDetail']['first_name'] = $name = $userData['User']['name'];
				$confirmlink = SITE_LINK."register-confirmation/".$confirmationtoken;
				//pr($userData);
				$dataSource = $this->User->getDataSource();
				$dataSource->begin();
				if ( $this->User->saveAll($userData,array('validate' => false)) ) {
					if ( !empty($status) ) {
						$this->getMailData("CONFIRMATION");
						$this->mailBody = str_replace("{USER}",$name,$this->mailBody);
						$this->mailBody = str_replace("{SWANKCOOK}",SITE_LINK,$this->mailBody);
					} else {
						$this->getMailData("CUSTOMER_SIGNUP");
						$this->mailBody = str_replace("{USER}",$name,$this->mailBody);
						$this->mailBody = str_replace("{LINK}",$confirmlink,$this->mailBody);
					}
					if ( $this->sendMail($email) ) {
						$dataSource->commit();
						if ( !empty($status) ) {
							$this->__login($identifier);
						}
						$this->Session->setFlash("Registration successful, A confirmation link has been sent to your email address.", 'default', array("class"=>"success_message"));
						$this->redirect(SITE_LINK."login");
					} else {
						$dataSource->rollback();
						$this->Session->setFlash("Registration can not be successful,Please try again.");
						$this->redirect(SITE_LINK."signup");
					}
				} else {
					$this->Session->setFlash("Something went wrong, Please try again.");
					$this->redirect(SITE_LINK."signup");
				}
			} else {
				$this->Session->setFlash("Something went wrong, Please try again.");
				//$this->redirect(SITE_LINK."signup");
			}				
		} elseif ( !empty($identifier) ) {
			$this->loadModel("TmpUser");
			if ( $tmpData = $this->TmpUser->find("first",array("conditions"=>array("identifier"=>$identifier))) ) {
				$identityData = unserialize($tmpData['TmpUser']['data']);
				$data['User']['identifier'] = $tmpData['TmpUser']['identifier'];
				$data['User']['email'] = $identityData['email'];
				$data['User']['provider'] = $identityData['provider'];
				$data['User']['name'] = empty($identityData['firstName'])?($identityData['displayName']):($identityData['firstName'].' '.$identityData['lastName']);
				$this->request->data = $data;
			}
		}
		$this->set("title_for_layout","User Signup");
	}
	
	
	function confirmation( $token = NULL ) {
		if ( !empty($token) ) {
			if ( $user = $this->User->find("first",array("conditions"=>array("confirmationtoken"=>$token),"recursive"=>-1))) {
				$userData['User']['status'] = 1;
				$userData['User']['confirmationtoken'] = '';
				$this->User->create();
				$this->User->id = $user['User']['id'];
				if ( $this->User->save($userData) ) {
					$this->Session->setFlash("Congratulations, you have confirmed your registration successfully.", 'default', array("class"=>"success_message"));
				} else {
					$this->Session->setFlash("Oops,Something went wrong. Please try again.");
				}
			} else {
				$this->Session->setFlash("Invalid request.");
			}
		} else {
			$this->Session->setFlash("Invalid request.");
		}
		$this->redirect(SITE_LINK."login");
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
                /*$user['password'] = $user['email'];
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
				*/
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
                    "keys" => array("id" => "124384158044511", "secret" => "4ae9dd2f209893e63807b02c929fe17e"),
                    "scope" => 'email',
                ),
                "Twitter" => array(
                    "enabled" => true,
                    "keys" => array("key" => "gjWVPpuiOsBpmql5ecCCKqf13", "secret" => "3vhOiytkkCldzmdZXQS7CpJUYOxcZS5LjVpEstVgP1gK4ZDBNH")
                )
	// for another provider refer to hybridauth documentation
            )
        );
        
         try {
            // create an instance for Hybridauth with the configuration file path as parameter
            $hybridauth = new Hybrid_Auth($hybridauth_config);
			// try to authenticate the selected $provider
			//$adapter = $hybridauth->authenticate( $provider);
			//$adapter->logout();
			
			
            $adapter = $hybridauth->logoutAllProviders();
			//unset($_SESSION);
			//die("here");
			$this->logout();
			//$hybridauth->redirect(SITE_LINK."login");
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
			echo $error;
			die;
            $this->set('error', $error);
        }
		//die("here");
	}

	// this is optional function to create user if not already in database. you can do anything with your hybridauth object
	private function _findOrCreateUser($user_profile = array(), $provider=null) {
        if (!empty($user_profile)) {
			$this->User->hasOne = $this->User->hasMany = $this->User->belongsTo = array();
			$this->User->hasOne = array(
			
				"UserDetail" => array (
					"className" => "UserDetail",
					"foreignKey" => false,
					"conditions" => "User.id = UserDetail.user_id",
					"type" => "Inner"
				)
			);
			$user = $this->User->find('first', array('conditions' => array('User.identifier' => $user_profile->identifier)));
			//pr($user);
			//die;
			if (empty($user)) {
				$user = (array) $user_profile;
				$user['provider'] = $provider;
				$this->loadModel("TmpUser");
				$data['TmpUser']['identifier'] = $user_profile->identifier;
				$data['TmpUser']['data'] = serialize($user);
				$this->TmpUser->save($data);
				$this->Session->write("UserProfile",$user);
				$this->redirect(SITE_LINK."signup/".$user_profile->identifier);
            } else {
            			$this->__login($user_profile->identifier);
				//$this->Session->write("AuthUser",$user);
				//$this->redirect(SITE_LINK."dashboard");
			}
        } else {
			$this->Session->setFlash("Invalid login.");
			$this->redirect(SITE_LINK."signup");
		}
    }
	
	function dashboard() {
		die("here");
	}
	
	
	
	
}
