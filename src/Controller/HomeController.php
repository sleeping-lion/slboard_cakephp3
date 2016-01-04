<?php
namespace App\Controller;

/**
 * UserBoardLogs Controller
 *
 * @property \App\Model\Table\UserBoardLogsTable $UserBoardLogs
 */
class HomeController extends SLController
{

    /**
     * Index method
     *
     * @return void
     */
	public function index() {
		$this -> loadModel('Notices');
		$this -> set('notices', $this -> Notices -> find('all', array('order'=>'id desc','limit' => 5, 'recursive' => -1)));

		$this -> loadModel('Questions');
		$this -> set('questions', $this -> Questions -> find('all', array('order'=>'id desc','limit' => 5, 'recursive' => -1)));

		$this -> loadModel('GuestBooks');
		$this -> set('guest_books', $this -> GuestBooks -> find('all', array('order'=>'id desc','limit' => 5, 'recursive' => -1)));

		$this -> loadModel('Galleries');
		$galleries=$this -> Galleries -> find('all', array('order'=>'id desc','limit' => 5, 'recursive' => -1))->toArray();
		
		if(count($galleries))
			$galleries=array_chunk($galleries,5);
		
		$this -> set('galleries',$galleries);

		$this -> loadModel('Blogs');
		$this -> set('blogs', $this -> Blogs -> find('all', array('conditions'=>array('photo is not null'),'order'=>'id desc','limit' => 5, 'recursive' => -1)));
	}
}
