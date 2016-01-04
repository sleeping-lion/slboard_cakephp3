<?php
namespace App\Controller;

/**
 * UserBoardLogs Controller
 *
 * @property \App\Model\Table\UserBoardLogsTable $UserBoardLogs
 */
class GuestBooksController extends SLAnonController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
		$this -> GuestBooks -> recursive = 0;
		$this -> setSearch('GuestBook');
		$this->set('guestBooks', $this->paginate($this->GuestBooks));
		$this->set('_serialize', ['guestBooks']);
    }

    /**
     * View method
     *
     * @param string|null $id Guest Book id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $guestBook = $this->GuestBooks->get($id, [
            'contain' => []
        ]);
        $this->set('guestBook', $guestBook);
        $this->set('_serialize', ['guestBook']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $guestBook = $this->GuestBooks->newEntity();
        if ($this->request->is('post')) {
            $guestBook = $this->GuestBooks->patchEntity($guestBook, $this->request->data);
            if ($this->GuestBooks->save($guestBook)) {
                $this->Flash->success('The guest book has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The guest book could not be saved. Please, try again.');
            }
        }
        $this->set(compact('guestBook'));
        $this->set('_serialize', ['guestBook']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Guest Book id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $guestBook = $this->GuestBooks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $guestBook = $this->GuestBooks->patchEntity($guestBook, $this->request->data);
            if ($this->GuestBooks->save($guestBook)) {
                $this->Flash->success('The guest book has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The guest book could not be saved. Please, try again.');
            }
        }
        $this->set(compact('guestBook'));
        $this->set('_serialize', ['guestBook']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Guest Book id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $guestBook = $this->GuestBooks->get($id);
        if ($this->GuestBooks->delete($guestBook)) {
            $this->Flash->success('The guest book has been deleted.');
        } else {
            $this->Flash->error('The guest book could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
