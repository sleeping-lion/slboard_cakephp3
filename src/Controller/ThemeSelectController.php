<?php
namespace App\Controller;

/**
 * UserBoardLogs Controller
 *
 * @property \App\Model\Table\UserBoardLogsTable $UserBoardLogs
 */
class ThemeSelectController extends SLController {

	/**
	 * Index method
	 *
	 * @return void
	 */
	public function index() {
		$session = $this -> request -> session();
		if (empty($this -> request -> query['theme']) OR $this -> request -> query['theme'] == 'Default') {
			$session -> delete('theme');
		} else {
			$session -> write('theme', $this -> request -> query['theme']);
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
	public function view($theme = null) {
		$session = $this -> request -> session();
		if (empty($theme)) {
			$session -> delete('theme');
		} else {
			$session -> write('theme', $theme);
		}
		$this -> redirect('/');
	}
}
