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
		$this -> set('notices',  $this -> Notices ->  find('all')->where(array('enable' => true))->order(array('id'=>'DESC'))->limit(5));

		$this -> loadModel('Questions');
		$this -> set('questions', $this -> Questions ->  find('all')->where(array('enable' => true))->order(array('id'=>'DESC'))->limit(5));

		$this -> loadModel('GuestBooks');
		$this -> set('guestBooks', $this -> GuestBooks ->  find('all')->where(array('enable' => true))->order(array('id'=>'DESC'))->limit(5));

		$this -> loadModel('Galleries');
		$this -> set('galleries', $this -> Galleries ->  find('all')->where(array('enable' => true))->order(array('id'=>'DESC'))->limit(30));

		$this -> loadModel('Blogs');
		$this -> set('blogs', $this -> Blogs ->  find('all')->where(array('enable' => true))->order(array('id'=>'DESC'))->limit(5));
		
		$this->set('_serialize', array('Notices','Questions','GuestBooks','Galleries','Blogs'));
	}
}
