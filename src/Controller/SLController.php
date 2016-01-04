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
use Cake\I18n\I18n;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class SLController extends AppController {

	/**
	 * Initialization hook method.
	 *
	 * Use this method to add common initialization code like loading components.
	 *
	 * @return void
	 */
	public function initialize() {
		parent::initialize();

		$this -> layout = 'sl';
		$this -> loadComponent('Paginator');
		$this -> Auth -> allow(array('view', 'index'));

		$this -> set('homepage_title', __('Homepage Title'));

		$this -> loadModel('BlogCategories');
		$this -> set('asideBlogCategories', $this -> BlogCategories -> find('all', array('conditions' => array('enable' => true), 'recursive' => -1)) -> toArray());

		$this -> loadModel('Tags');
		$this -> set('asideTags', $this -> Tags -> find('all', array('conditions' => array('not' => array('taggings_count' => 0)), 'order' => array('taggings_count desc'), 'recursive' => -1)) -> toArray());

		$session = $this -> request -> session();
		$this -> set('session', $session);
		/*
		 if($session->check('theme')) {
		 $this->theme=$session->read('theme');
		 } else {
		 $this->theme=null;
		 }
		 */

		if ($session -> check('Config.language')) {
			I18n::locale($session -> read('Config.language'));
		} else {
			I18n::locale($session -> read('ko_KR'));
		}
	}

	protected function getModelContentAlias($modelAilas) {
		return $modelAilas . 'Content';
	}

	protected function searchTitleCondition($modelAilas, $search_text) {
		return array($modelAilas . '.title LIKE' => '%' . $search_text . '%');
	}

	protected function searchContentCondition($modelAilas, $search_text) {
		return array($modelAilas . '.content LIKE' => '%' . $search_text . '%');
	}

	protected function searchTitleOrContentCondition($modelAilas, $search_text, $modelContentAlias) {
		return array('OR' => array($this -> searchTitleCondition($modelAilas, $search_text), $this -> searchContentCondition($modelContentAlias, $search_text)));
	}

	protected function searchUserCondition($modelAilas, $search_text, $modelUserAlias = 'User') {
		return array($modelUserAlias . '.name Like' => '%' . $search_text . '%');
	}

	protected function setSearch($modelAilas, $modleContentAlias = null, $hasCategory = false, $modleCategoryAlias = null) {
		$conditions = array();
		$search_type = null;
		$search_text = null;

		if (empty($modleContentAlias)) {
			$modleContentAlias = $this -> getModelContentAlias($modelAilas);
		}

		if ($hasCategory) {
			$search_model_condition = array($modleCategoryAlias . '.enable' => true, $modelAilas . '.enable' => true);
		} else {
			if ($this -> params['admin']) {
				$search_model_condition = array();
			} else {
				$search_model_condition = array($modelAilas . '.enable' => true);
			}
		}

		if (isset($this -> request -> query['search_type']))
			$search_type = $this -> request -> query['search_type'];

		if (isset($this -> request -> query['search_text']))
			$search_text = $this -> request -> query['search_text'];

		if (isset($this -> request -> query['search_type']) AND isset($this -> request -> query['search_text'])) {
			switch($search_type) {
				case 'title' :
					$this -> Paginator -> settings = array('conditions' => array_merge($search_model_condition, $this -> searchTitleCondition($modelAilas, $search_text)), 'paramType' => 'querystring', 'limit' => 10, 'order' => array('id' => 'desc'));
					break;
				case 'content' :
					$this -> Paginator -> settings = array('conditions' => array_merge($search_model_condition, $this -> searchContentCondition($modleContentAlias, $search_text)), 'paramType' => 'querystring', 'limit' => 10, 'order' => array('id' => 'desc'));
					break;
				case 'title+content' :
					$this -> Paginator -> settings = array('conditions' => array_merge($search_model_condition, $this -> searchTitleOrContentCondition($modelAilas, $search_text, $modleContentAlias)), 'paramType' => 'querystring', 'limit' => 10, 'order' => array('id' => 'desc'));
					break;
				case 'username' :
					$this -> Paginator -> settings = array('conditions' => array_merge($search_model_condition, $this -> searchUserCondition($modelAilas, $search_text)), 'paramType' => 'querystring', 'limit' => 10, 'order' => array('id' => 'desc'));
					break;
			}
		} else {
			$this -> Paginator -> settings = array('conditions' => $search_model_condition, 'paramType' => 'querystring', 'limit' => 10, 'order' => array('id' => 'desc'));
		}

		$this -> set('searchTypeOption', array('title' => __('Title'), 'content' => __('Content'), 'title+content' => __('Title+Content'), 'username' => __('Writer')));
		$this -> set('searchType', $search_type);
		$this -> set('searchText', $search_text);
	}

}
