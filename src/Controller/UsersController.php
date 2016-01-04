<?php
namespace App\Controller;

use App\Form\AgreeForm;
/**
 * UserBoardLogs Controller
 *
 * @property \App\Model\Table\UserBoardLogsTable $UserBoardLogs
 */
class UsersController extends SLController
{

    public function initialize() {
        parent::initialize();
        $this->layout='sl';
        $this->Auth->allow(array('add','login','logout','agree'));
		
		/*
		 * 새로 권한 입력하려면 여기를 이용
		 * 수정후에  aco,aro,aros_acos 테이블의 모든 데이터를 지운후 각 테이블 auto_increment도 1로 맞춘다.
		 * 그 후에  위의 두둘을 주석처리 하고 $this -> initAcl() 메소드를 호출 시키면 입력된다.
		 * 한번 호출후엔 다시 위의 두줄을 나오게 하고 밑에의 $this -> initAcl()를 주석 처리한다.
		 * 두번 호출하면 두번 입력됨!!!  =  그럼 다시 처음부터 테이블 지우고 위 과정 시행
		 */
		//$this -> initAcl();
	}
	
	private function createAro() {
		
		$aro = $this->Acl->Aro->newEntity();
		$aro = $this->Acl->Aro->patchEntity($aro, array('model' => 'Group', 'foreign_key' => 1, 'parent_id' => null, 'alias' => 'admins'));
		$this->Acl->Aro->save($aro);

		$aro = $this->Acl->Aro->newEntity();
		$aro = $this->Acl->Aro->patchEntity($aro, array('model' => 'Group', 'foreign_key' => 2, 'parent_id' => null, 'alias' => 'managers'));
		$this->Acl->Aro->save($aro);
		
		$aro = $this->Acl->Aro->newEntity();
		$aro = $this->Acl->Aro->patchEntity($aro, array('model' => 'Group', 'foreign_key' => 3, 'parent_id' => null, 'alias' => 'users'));
		$this->Acl->Aro->save($aro);
		
		$aro = $this->Acl->Aro->newEntity();
		$aro = $this->Acl->Aro->patchEntity($aro, array('model' => 'Group', 'foreign_key' => 4, 'parent_id' => null, 'alias' => 'viewers'));
		$this->Acl->Aro->save($aro);
	}

	private function createAco() {
		
		$aco = $this->Acl->Aco->newEntity();
		$aco = $this->Acl->Aco->patchEntity($aco, array('parent_id' => null, 'alias' => 'Controllers'));
		$this->Acl->Aco->save($aco);
		
		//1
		$aco = $this->Acl->Aco->newEntity();
		$aco = $this->Acl->Aco->patchEntity($aco, array('parent_id' => 1, 'alias' => 'Users'));
		$this->Acl->Aco->save($aco);
		//2
		$aco = $this->Acl->Aco->newEntity();
		$aco = $this->Acl->Aco->patchEntity($aco,array('parent_id' => 2, 'alias' => 'Groups'));
		$this->Acl->Aco->save($aco);
		//3
		$aco = $this->Acl->Aco->newEntity();
		$aco = $this->Acl->Aco->patchEntity($aco, array('parent_id' => 1, 'alias' => 'Notices'));
		$this->Acl->Aco->save($aco);
		//4
		$aco = $this->Acl->Aco->newEntity();
		$aco = $this->Acl->Aco->patchEntity($aco, array('parent_id' => 1, 'alias' => 'GuestBooks'));
		$this->Acl->Aco->save($aco);
		//5
		$aco = $this->Acl->Aco->newEntity();
		$aco = $this->Acl->Aco->patchEntity($aco, array('parent_id' => 5, 'alias' => 'GuestBookComments'));
		$this->Acl->Aco->save($aco);
		//6
		$aco = $this->Acl->Aco->newEntity();
		$aco = $this->Acl->Aco->patchEntity($aco, array('parent_id' => 1, 'alias' => 'Questions'));
		$this->Acl->Aco->save($aco);
		//7
		$aco = $this->Acl->Aco->newEntity();
		$aco = $this->Acl->Aco->patchEntity($aco, array('parent_id' => 7, 'alias' => 'QuestionComments'));
		$this->Acl->Aco->save($aco);
		//8
		$aco = $this->Acl->Aco->newEntity();
		$aco = $this->Acl->Aco->patchEntity($aco, array('parent_id' => 1, 'alias' => 'Faqs'));
		$this->Acl->Aco->save($aco);
		//9
		$aco = $this->Acl->Aco->newEntity();
		$aco = $this->Acl->Aco->patchEntity($aco, array('parent_id' => 9, 'alias' => 'FaqCategories'));
		$this->Acl->Aco->save($aco);
		// 10
		$aco = $this->Acl->Aco->newEntity();
		$aco = $this->Acl->Aco->patchEntity($aco, array('parent_id' => 1, 'alias' => 'Blogs'));
		$this->Acl->Aco->save($aco);
		//11
		$aco = $this->Acl->Aco->newEntity();
		$aco = $this->Acl->Aco->patchEntity($aco, array('parent_id' => 11, 'alias' => 'BlogCategories'));
		$this->Acl->Aco->save($aco);
		//12
		$aco = $this->Acl->Aco->newEntity();
		$aco = $this->Acl->Aco->patchEntity($aco, array('parent_id' => 11, 'alias' => 'BlogComments'));
		$this->Acl->Aco->save($aco);
		//13
		$aco = $this->Acl->Aco->newEntity();
		$aco = $this->Acl->Aco->patchEntity($aco, array('parent_id' => 1, 'alias' => 'CkeditorAssets'));
		$this->Acl->Aco->save($aco);
		//14
		$aco = $this->Acl->Aco->newEntity();
		$aco = $this->Acl->Aco->patchEntity($aco, array('parent_id' => 1, 'alias' => 'Galleries'));
		$this->Acl->Aco->save($aco);
		// 15
		$aco = $this->Acl->Aco->newEntity();
		$aco = $this->Acl->Aco->patchEntity($aco, array('parent_id' => 15, 'alias' => 'GalleryCategories'));
		$this->Acl->Aco->save($aco);
		// 16
		$aco = $this->Acl->Aco->newEntity();
		$aco = $this->Acl->Aco->patchEntity($aco, array('parent_id' => 1, 'alias' => 'Contacts'));
		$this->Acl->Aco->save($aco);
		// 17
		$aco = $this->Acl->Aco->newEntity();
		$aco = $this->Acl->Aco->patchEntity($aco, array('parent_id' => 1, 'alias' => 'Portfolios'));
		$this->Acl->Aco->save($aco);
		// 18
		$aco = $this->Acl->Aco->newEntity();
		$aco = $this->Acl->Aco->patchEntity($aco, array('parent_id' => 1, 'alias' => 'Histories'));
		$this->Acl->Aco->save($aco);
		// 19
		$aco = $this->Acl->Aco->newEntity();
		$aco = $this->Acl->Aco->patchEntity($aco, array('parent_id' => 1, 'alias' => 'Home'));
		$this->Acl->Aco->save($aco);
		//20
		$aco = $this->Acl->Aco->newEntity();
		$aco = $this->Acl->Aco->patchEntity($aco, array('parent_id' => 1, 'alias' => 'Intro'));
		$this->Acl->Aco->save($aco);
		//21
		$aco = $this->Acl->Aco->newEntity();
		$aco = $this->Acl->Aco->patchEntity($aco, array('parent_id' => 1, 'alias' => 'Resources'));
		$this->Acl->Aco->save($aco);
		//22
	}

	private function initAcl() {
		$this -> createAro();
		$this -> createAco();

		// admins
		$aro =$this -> Acl -> Aro ->get(1);
		$this -> Acl -> allow($aro->alias, 'Controllers');
		//		$this -> Acl -> deny($group, 'Services', 'delete');
		//		$this -> Acl -> deny($group, 'Groups', 'create');
		//		$this -> Acl -> deny($group, 'Groups', 'delete');

		// managers
		$aro =$this -> Acl -> Aro ->get(2);
		$this -> Acl -> allow($aro->alias, 'Controllers');
		$this -> Acl -> deny($aro->alias, 'Users');

		// users
		$aro =$this -> Acl -> Aro ->get(3);
		$this -> Acl -> allow($aro->alias, 'Galleries', 'read');
		$this -> Acl -> allow($aro->alias, 'Notices', 'read');
		$this -> Acl -> allow($aro->alias, 'Contacts', 'create');
		$this -> Acl -> allow($aro->alias, 'Contacts', 'read');

		// viewers
		$aro =$this -> Acl -> Aro ->get(4);
		$this -> Acl -> allow($aro->alias, 'Galleries', 'read');
		$this -> Acl -> allow($aro->alias, 'Notices', 'read');
		$this -> Acl -> allow($aro->alias, 'Contacts', 'create');
		$this -> Acl -> allow($aro->alias, 'Contacts', 'read');

		// we add an exit to avoid an ugly "missing views" error message
		echo "all done";
		exit ;
	}		

    public function login() {
        $session = $this->request->session();
        if ($session -> read('Auth.User')) {
            //  $this -> Session -> setFlash('You are logged in! no Auth');
            return $this -> redirect(array('controller' => 'home', 'action' => 'index'));
        }

        if ($this -> request -> is('post')) {
        		$user=$this -> Auth -> identify();
            if ($user) {
            	 	$this->Auth->setUser($user);
                return $this -> redirect($this -> Auth -> redirectUrl());
            }   else {
            $this->Flash->error(_('Invalid email or password, try again'), 'error');
			}
        }
    }

public function logout()
{
    return $this->redirect($this->Auth->logout());
}
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }
	
	public function agree() {		
		$agree=new AgreeForm();
		if ($this->request->is('post')) {

			if($agree->execute($this->request->data)) {
				$this->redirect(['action' => 'add']);
			} else {
				$this->Flash->error('error1');
			}
		}
		$this->set('agree',$agree);		
	}

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success('The user has been deleted.');
        } else {
            $this->Flash->error('The user could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
