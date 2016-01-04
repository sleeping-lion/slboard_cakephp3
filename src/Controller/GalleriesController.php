<?php
namespace App\Controller;

/**
 * UserBoardLogs Controller
 *
 * @property \App\Model\Table\UserBoardLogsTable $UserBoardLogs
 */
class GalleriesController extends SLController
{
	protected function getModelContentAlias($modelAilas) {
		return $modelAilas;
	}	

	protected function _getCategory() {
		$this -> loadModel('GalleryCategories');
		$galleryCategories = $this -> GalleryCategories -> find('list',array('recursive'=>-1,'conditions'=>array('enable'=>true)));
		if (!count($galleryCategories))
			throw new Exception(__('Insert Gallery Category First'));

		if (isset($this -> request -> query['gallery_category_id'])) {
			if (!$this -> GalleryCategories -> exists($this -> request -> query['gallery_category_id']))
				throw new NotFoundException(__('Invalid post'));

			$gallery_category_id = $this -> request -> query['gallery_category_id'];
		} else {
			$gallery_category_id = key($galleryCategories->toArray());
		}

		$this -> set('galleryCategories', $galleryCategories);
		$this -> set('galleryCategoryId', $gallery_category_id);
		return $galleryCategories;
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$galleryCategories = $this -> _getCategory();

		if (isset($this -> request -> query['id'])) {
			$gallery = $this -> view($this -> request -> query['id']);
			$gallery_category_id = $gallery['Gallery']['gallery_category_id'];
		} else {
			if (isset($this -> request -> query['gallery_category_id'])) {
				if ($this -> GalleryCategories -> exists($this -> request -> query['gallery_category_id'])) {
					$gallery_category_id = $this -> request -> query['gallery_category_id'];
				} else {
					throw new NotFoundException(__('Invalid post'));
				}
			} else {
				$gallery_category_id = key($galleryCategories->toArray());
			}

			$gallery = $this -> Galleries -> find('All', array('conditions' => array('gallery_category_id' => $gallery_category_id)))->First();
		}

		$this -> Galleries -> recursive = 0;
		$this -> paginate = array('conditions' => array('gallery_category_id' => $gallery_category_id));

		if (count($gallery))
			$this -> set('gallery', $gallery);
		$galleries = $this -> paginate($this->Galleries)->toArray();

		$this -> set('galleries', array_chunk($galleries, 6));
		$this -> set('galleryCategoryId', $gallery_category_id);
	}

    /**
     * View method
     *
     * @param string|null $id Gallery id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gallery = $this->Galleries->get($id, [
            'contain' => []
        ]);
        $this->set('gallery', $gallery);
        $this->set('_serialize', ['gallery']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        	
        $gallery = $this->Galleries->newEntity();
        if ($this->request->is('post')) {
            $gallery = $this->Galleries->patchEntity($gallery, $this->request->data);
			
            if ($this->Galleries->save($gallery)) {
                $this->Flash->success('The gallery has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The gallery could not be saved. Please, try again.');
            }
		}
			$this -> _getCategory();
        $this->set(compact('gallery'));
        $this->set('_serialize', ['gallery']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Gallery id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gallery = $this->Galleries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gallery = $this->Galleries->patchEntity($gallery, $this->request->data);
            if ($this->Galleries->save($gallery)) {
                $this->Flash->success('The gallery has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The gallery could not be saved. Please, try again.');
            }
        }
        $this->set(compact('gallery'));
        $this->set('_serialize', ['gallery']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Gallery id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gallery = $this->Galleries->get($id);
        if ($this->Galleries->delete($gallery)) {
            $this->Flash->success('The gallery has been deleted.');
        } else {
            $this->Flash->error('The gallery could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
