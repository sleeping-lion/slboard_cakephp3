<?php
namespace App\Controller;

/**
 * UserBoardLogs Controller
 *
 * @property \App\Model\Table\UserBoardLogsTable $UserBoardLogs
 */
class IntroController extends SLController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this -> loadModel('Users');
        $user=$this->Users->find('all',array('conditions'=>array('group_id'=>1,'intro'=>true),'recursive'=>-1))->first();
        $this -> set('user',$user);

        $this -> loadModel('UserPhotos');
        $conditions=array('user_id'=>$user['User']['id']);
        $userPhotos=$this -> paginate('UserPhotos',$conditions);
        $this -> set('userPhotos',array_chunk($userPhotos,6));
        
        if(isset($this->request->query['id'])) {
      $userPhoto = $this->userPhotos->findById($this->request->query['id']);
   } else {
        if(count($userPhotos)) {
        $userPhotoA= $userPhotos->toArray();
        $userPhoto = $userPhotoA[0];      
            } else {
                $userPhoto=null;
            }
        }
   
        $this -> set('userPhoto', $userPhoto);
        
       // $this->set('intro', $this->paginate($this->Intro));
      //  $this->set('_serialize', ['intro']);
    }

    /**
     * View method
     *
     * @param string|null $id Intro id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $intro = $this->Intro->get($id, [
            'contain' => []
        ]);
        $this->set('intro', $intro);
        $this->set('_serialize', ['intro']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $intro = $this->Intro->newEntity();
        if ($this->request->is('post')) {
            $intro = $this->Intro->patchEntity($intro, $this->request->data);
            if ($this->Intro->save($intro)) {
                $this->Flash->success('The intro has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The intro could not be saved. Please, try again.');
            }
        }
        $this->set(compact('intro'));
        $this->set('_serialize', ['intro']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Intro id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $intro = $this->Intro->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $intro = $this->Intro->patchEntity($intro, $this->request->data);
            if ($this->Intro->save($intro)) {
                $this->Flash->success('The intro has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The intro could not be saved. Please, try again.');
            }
        }
        $this->set(compact('intro'));
        $this->set('_serialize', ['intro']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Intro id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $intro = $this->Intro->get($id);
        if ($this->Intro->delete($intro)) {
            $this->Flash->success('The intro has been deleted.');
        } else {
            $this->Flash->error('The intro could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
