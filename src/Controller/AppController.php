<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	/*
	 public $helpers = [
	 'Bootstrap.Less',
	 'Bootstrap.Form'
	 ]; */
	/**
	 * Initialization hook method.
	 *
	 * Use this method to add common initialization code like loading components.
	 *
	 * @return void
	 */

	public function initialize() {
		$this -> loadComponent('Flash');
		$this -> loadComponent('Acl.Acl');
		// $this->loadComponent('Bootstrap.Bootstrap');
		$this -> loadComponent('Auth', array('authenticate' => array('Form' => array('fields' => array('username' => 'email', 'password' => 'encrypted_password'))), 'authorize' => 'Controller'));
	}

	public function isAuthorized($user = null) {
		$controller = $this -> name;
		//$action = $this -> request->params;
		$action = $this -> request -> params['action'];
		$allow = false;
		//	if ($action == 'login' OR $action == 'logout')
		//		return true;

		if ($this -> Auth -> user()) {
			$session = $this -> request -> session();
			$group_id = $session -> read('Auth.User.group_id');

			switch($action) {
				case 'index' :
					$allow = $this -> Acl -> check(array('model' => 'Group', 'foreign_key' => $group_id), $controller, 'read');
					break;
				case 'admin_index' :
					$allow = $this -> Acl -> check(array('model' => 'Group', 'foreign_key' => $group_id), $controller, 'read');
					break;
				case 'view' :
					$allow = $this -> Acl -> check(array('model' => 'Group', 'foreign_key' => $group_id), $controller, 'read');
					break;
				case 'admin_view' :
					$allow = $this -> Acl -> check(array('model' => 'Group', 'foreign_key' => $group_id), $controller, 'read');
					break;
				case 'add' :
					$allow = $this -> Acl -> check(array('model' => 'Group', 'foreign_key' => $group_id), $controller, 'create');
					break;
				case 'admin_add' :
					$allow = $this -> Acl -> check(array('model' => 'Group', 'foreign_key' => $group_id), $controller, 'create');
					break;
				case 'edit' :
					$allow = $this -> Acl -> check(array('model' => 'Group', 'foreign_key' => $group_id), $controller, 'update');
					break;
				case 'admin_edit' :
					$allow = $this -> Acl -> check(array('model' => 'Group', 'foreign_key' => $group_id), $controller, 'update');
					break;
				case 'admin_change_status' :
					$allow = $this -> Acl -> check(array('model' => 'Group', 'foreign_key' => $group_id), $controller, 'update');
					break;
				case 'delete' :
					$allow = $this -> Acl -> check(array('model' => 'Group', 'foreign_key' => $group_id), $controller, 'delete');
					break;
				case 'admin_delete' :
					$allow = $this -> Acl -> check(array('model' => 'Group', 'foreign_key' => $group_id), $controller, 'delete');
					break;
				case 'complete' :
					$allow = $this -> Acl -> check(array('model' => 'Group', 'foreign_key' => $group_id), $controller, 'read');
					break;
			}
		} else {
			return false;
		}

		//if (!$allow) {
		//	$this -> Session -> setFlash(__('You Do not Have Auth.'), 'error');
		//}
		return $allow;
	}

}
