<?php
namespace App\Controller;

/**
 * UserBoardLogs Controller
 *
 * @property \App\Model\Table\UserBoardLogsTable $UserBoardLogs
 */
class PortfoliosController extends SLController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
		$this -> Portfolios -> recursive = 0;
		$this -> setSearch('Portfolio');       	
        $this->set('portfolios', $this->paginate($this->Portfolios));
        $this->set('_serialize', ['portfolios']);
    }

    /**
     * View method
     *
     * @param string|null $id Portfolio id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $portfolio = $this->Portfolios->get($id, [
            'contain' => []
        ]);
        $this->set('portfolio', $portfolio);
        $this->set('_serialize', ['portfolio']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $portfolio = $this->Portfolios->newEntity();
        if ($this->request->is('post')) {
            $portfolio = $this->Portfolios->patchEntity($portfolio, $this->request->data);
            if ($this->Portfolios->save($portfolio)) {
                $this->Flash->success('The portfolio has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The portfolio could not be saved. Please, try again.');
            }
        }
        $this->set(compact('portfolio'));
        $this->set('_serialize', ['portfolio']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Portfolio id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $portfolio = $this->Portfolios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $portfolio = $this->Portfolios->patchEntity($portfolio, $this->request->data);
            if ($this->Portfolios->save($portfolio)) {
                $this->Flash->success('The portfolio has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The portfolio could not be saved. Please, try again.');
            }
        }
        $this->set(compact('portfolio'));
        $this->set('_serialize', ['portfolio']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Portfolio id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $portfolio = $this->Portfolios->get($id);
        if ($this->Portfolios->delete($portfolio)) {
            $this->Flash->success('The portfolio has been deleted.');
        } else {
            $this->Flash->error('The portfolio could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
