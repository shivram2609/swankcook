<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	//Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	//Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	
	
	Router::connect('/login/*', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/signup/*', array('controller' => 'users', 'action' => 'signup'));
	Router::connect('/forgot-password/*', array('controller' => 'users', 'action' => 'forgotpassword'));
	Router::connect('/register-confirmation/*', array('controller' => 'users', 'action' => 'confirmation'));
	Router::connect('/dashboard/*', array('controller' => 'users', 'action' => 'dashboard'));
	
	Router::connect('/admin/dashboard', array('controller' => 'users', 'action' => 'dashboard',"admin"=>true));
	Router::connect('/admin/change-password', array('controller' => 'users', 'action' => 'changepassword',"admin"=>true));
	Router::connect('/admin/logout', array('controller' => 'users', 'action' => 'logout',"admin"=>true));
	Router::connect('/admin/categories/add', array('controller' => 'categories', 'action' => 'add',"admin"=>true));
	Router::connect('/admin/categories/edit/*', array('controller' => 'categories', 'action' => 'edit',"admin"=>true));
	Router::connect('/admin/categories/delete/*', array('controller' => 'categories', 'action' => 'delete',"admin"=>true));
	Router::connect('/admin/categories/*', array('controller' => 'categories', 'action' => 'index',"admin"=>true));
	
	Router::connect('/admin/locations/add', array('controller' => 'locations', 'action' => 'add',"admin"=>true));
	Router::connect('/admin/locations/edit/*', array('controller' => 'locations', 'action' => 'edit',"admin"=>true));
	Router::connect('/admin/locations/delete/*', array('controller' => 'locations', 'action' => 'delete',"admin"=>true));
	Router::connect('/admin/locations/*', array('controller' => 'locations', 'action' => 'index',"admin"=>true));
	
	Router::connect('/admin/cuisines/add', array('controller' => 'cuisines', 'action' => 'add',"admin"=>true));
	Router::connect('/admin/cuisines/edit/*', array('controller' => 'cuisines', 'action' => 'edit',"admin"=>true));
	Router::connect('/admin/cuisines/delete/*', array('controller' => 'cuisines', 'action' => 'delete',"admin"=>true));
	Router::connect('/admin/cuisines/*', array('controller' => 'cuisines', 'action' => 'index',"admin"=>true));
	
	Router::connect('/admin/cmsemails/add', array('controller' => 'cmsemails', 'action' => 'add',"admin"=>true));
	Router::connect('/admin/cmsemails/edit/*', array('controller' => 'cmsemails', 'action' => 'edit',"admin"=>true));
	Router::connect('/admin/cmsemails/delete/*', array('controller' => 'cmsemails', 'action' => 'delete',"admin"=>true));
	Router::connect('/admin/cmsemails/*', array('controller' => 'cmsemails', 'action' => 'index',"admin"=>true));
	
	Router::connect('/login_with_twitter', array('controller' => 'users', 'action' => 'loginwith','Twitter'));
	Router::connect('/login_with_facebook', array('controller' => 'users', 'action' => 'loginwith','Facebook'));
	
	Router::connect('/privacy-policy/*', array('controller' => 'pages', 'action' => 'privacypolicy'));
	Router::connect('/profile/*', array('controller' => 'users', 'action' => 'profile'));
	Router::connect('/', array('controller' => 'pages', 'action' => 'index'));
/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
