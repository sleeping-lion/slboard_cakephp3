<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * FaqCategories Controller
 *
 * @property \App\Model\Table\FaqCategoriesTable $FaqCategories
 */
class FaqCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('faqCategories', $this->paginate($this->FaqCategories));
        $this->set('_serialize', ['faqCategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Faq Category id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $faqCategory = $this->FaqCategories->get($id, [
            'contain' => []
        ]);
        $this->set('faqCategory', $faqCategory);
        $this->set('_serialize', ['faqCategory']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $faqCategory = $this->FaqCategories->newEntity();
        if ($this->request->is('post')) {
            $faqCategory = $this->FaqCategories->patchEntity($faqCategory, $this->request->data);
            if ($this->FaqCategories->save($faqCategory)) {
                $this->Flash->success('The faq category has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The faq category could not be saved. Please, try again.');
            }
        }
        $this->set(compact('faqCategory'));
        $this->set('_serialize', ['faqCategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Faq Category id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $faqCategory = $this->FaqCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $faqCategory = $this->FaqCategories->patchEntity($faqCategory, $this->request->data);
            if ($this->FaqCategories->save($faqCategory)) {
                $this->Flash->success('The faq category has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The faq category could not be saved. Please, try again.');
            }
        }
        $this->set(compact('faqCategory'));
        $this->set('_serialize', ['faqCategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Faq Category id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $faqCategory = $this->FaqCategories->get($id);
        if ($this->FaqCategories->delete($faqCategory)) {
            $this->Flash->success('The faq category has been deleted.');
        } else {
            $this->Flash->error('The faq category could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
