<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * GalleryCategories Controller
 *
 * @property \App\Model\Table\GalleryCategoriesTable $GalleryCategories
 */
class GalleryCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('galleryCategories', $this->paginate($this->GalleryCategories));
        $this->set('_serialize', ['galleryCategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Gallery Category id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $galleryCategory = $this->GalleryCategories->get($id, [
            'contain' => []
        ]);
        $this->set('galleryCategory', $galleryCategory);
        $this->set('_serialize', ['galleryCategory']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $galleryCategory = $this->GalleryCategories->newEntity();
        if ($this->request->is('post')) {
            $galleryCategory = $this->GalleryCategories->patchEntity($galleryCategory, $this->request->data);
            if ($this->GalleryCategories->save($galleryCategory)) {
                $this->Flash->success('The gallery category has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The gallery category could not be saved. Please, try again.');
            }
        }
        $this->set(compact('galleryCategory'));
        $this->set('_serialize', ['galleryCategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Gallery Category id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $galleryCategory = $this->GalleryCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $galleryCategory = $this->GalleryCategories->patchEntity($galleryCategory, $this->request->data);
            if ($this->GalleryCategories->save($galleryCategory)) {
                $this->Flash->success('The gallery category has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The gallery category could not be saved. Please, try again.');
            }
        }
        $this->set(compact('galleryCategory'));
        $this->set('_serialize', ['galleryCategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Gallery Category id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $galleryCategory = $this->GalleryCategories->get($id);
        if ($this->GalleryCategories->delete($galleryCategory)) {
            $this->Flash->success('The gallery category has been deleted.');
        } else {
            $this->Flash->error('The gallery category could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
