<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LanguageSelect Controller
 *
 * @property \App\Model\Table\LanguageSelectTable $LanguageSelect
 */
class LanguageSelectController extends AppController {
	/**
	 * Index method
	 *
	 * @return void
	 */
	public function index() {
		$session = $this -> request -> session();
		if (empty($this -> request -> query['language']) OR $this -> request -> query['language'] == ini_get('intl.default_locale')) {
			$session -> write('Config.language', ini_get('intl.default_locale'));
		} else {
			$session -> write('Config.language', $this -> request -> query['language']);
		}
		$this -> redirect('/');
	}

	/**
	 * View method
	 *
	 * @param string|null $id Theme Select id.
	 * @return void
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function view($language = null) {
		$session = $this -> request -> session();
		if (empty($language)) {
			$session -> delete('Config.language');
		} else {
			$session -> write('Config.language', $language);
		}
		$this -> redirect('/');
	}

}
