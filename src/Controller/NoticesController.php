<?php
namespace App\Controller;

/**
 * UserBoardLogs Controller
 *
 * @property \App\Model\Table\UserBoardLogsTable $UserBoardLogs
 */
class NoticesController extends SLController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];        
		
		$this -> Notices -> recursive = 0;
		$this -> setSearch('Notice');		
        $this->set('notices', $this->paginate($this->Notices));
        $this->set('_serialize', ['notices']);
    }

    /**
     * View method
     *
     * @param string|null $id Notice id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $notice = $this->Notices->get($id, [
            'contain' => []
        ]);
        $this->set('notice', $notice);
        $this->set('_serialize', ['notice']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $notice = $this->Notices->newEntity();
        if ($this->request->is('post')) {
            $notice = $this->Notices->patchEntity($notice, $this->request->data);
            if ($this->Notices->save($notice)) {
                $this->Flash->success('The notice has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The notice could not be saved. Please, try again.');
            }
        }
        $this->set(compact('notice'));
        $this->set('_serialize', ['notice']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Notice id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $notice = $this->Notices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notice = $this->Notices->patchEntity($notice, $this->request->data);
            if ($this->Notices->save($notice)) {
                $this->Flash->success('The notice has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The notice could not be saved. Please, try again.');
            }
        }
        $this->set(compact('notice'));
        $this->set('_serialize', ['notice']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Notice id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $notice = $this->Notices->get($id);
        if ($this->Notices->delete($notice)) {
            $this->Flash->success('The notice has been deleted.');
        } else {
            $this->Flash->error('The notice could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
