<?php
namespace App\Controller;

/**
 * UserBoardLogs Controller
 *
 * @property \App\Model\Table\UserBoardLogsTable $UserBoardLogs
 */
class HistoriesController extends SLController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {

		
		$this -> Histories -> recursive = 0;
		$this -> setSearch('History');		
        $this->set('histories', $this->paginate($this->Histories));
        $this->set('_serialize', ['histories']);
    }

    /**
     * View method
     *
     * @param string|null $id History id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $history = $this->Histories->get($id, [
            'contain' => []
        ]);
        $this->set('history', $history);
        $this->set('_serialize', ['history']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $history = $this->Histories->newEntity();
        if ($this->request->is('post')) {
            $history = $this->Histories->patchEntity($history, $this->request->data);
            if ($this->Histories->save($history)) {
                $this->Flash->success('The history has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The history could not be saved. Please, try again.');
            }
        }
        $this->set(compact('history'));
        $this->set('_serialize', ['history']);
    }

    /**
     * Edit method
     *
     * @param string|null $id History id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $history = $this->Histories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $history = $this->Histories->patchEntity($history, $this->request->data);
            if ($this->Histories->save($history)) {
                $this->Flash->success('The history has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The history could not be saved. Please, try again.');
            }
        }
        $this->set(compact('history'));
        $this->set('_serialize', ['history']);
    }

    /**
     * Delete method
     *
     * @param string|null $id History id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $history = $this->Histories->get($id);
        if ($this->Histories->delete($history)) {
            $this->Flash->success('The history has been deleted.');
        } else {
            $this->Flash->error('The history could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
