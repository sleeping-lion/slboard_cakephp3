<?php
namespace App\Controller;

/**
 * UserBoardLogs Controller
 *
 * @property \App\Model\Table\UserBoardLogsTable $UserBoardLogs
 */
class BlogsController extends SLController
{

	protected function _getCategoriedCategory() {
		$this -> loadModel('BlogCategories');
		$blogCategories = $this -> BlogCategories -> find('list', array('fields' => array('BlogCategory.id', 'BlogCategory.title', 'BlogCategory2.title'), 'joins' => array( array('table' => 'blog_categories', 'alias' => 'BlogCategory2', 'type' => 'left', 'conditions' => array('BlogCategory.blog_category_id = BlogCategory2.id', 'BlogCategory2.leaf' => false, 'BlogCategory.enable' => true))), 'conditions' => array('BlogCategory.leaf' => true), 'order' => array('BlogCategory.blog_category_id desc,BlogCategory2.id desc'), 'recursive' => -1));

		if (!count($blogCategories))
			throw new Exception(__('Insert Blog Category First'));

		if (isset($this -> request -> query['blog_category_id'])) {
			if (!$this -> BlogCategories -> exists($this -> request -> query['blog_category_id']))
				throw new NotFoundException(__('Invalid post'));

			$blog_category_id = $this -> request -> query['blog_category_id'];
		}

		$this -> set('blogCategories', $blogCategories);
		$this -> set('blogCategoryId', $blog_category_id);
		return $blogCategories;
	}

	protected function _getCategory() {
		$this -> loadModel('BlogCategories');
		$blogCategories = $this -> BlogCategories -> find('list', array('conditions' => array('leaf' => true, 'enable' => true), 'recursive' => -1));
		if (!count($blogCategories))
			throw new Exception(__('Insert Blog Category First'));

		if (isset($this -> request -> query['blog_category_id'])) {
			if (!$this -> BlogCategories -> exists($this -> request -> query['blog_category_id']))
				throw new NotFoundException(__('Invalid post'));

			$blog_category_id = $this -> request -> query['blog_category_id'];
		} else {
			$blog_category_id = key($blogCategories);
		}
		$this -> set('blogCategories', $blogCategories);
		$this -> set('blogCategoryId', $blog_category_id);
		return $blogCategories;
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$blogCategories = $this -> _getCategory();
		if (isset($this ->request-> params['tag'])) {
			$this -> loadModel('Tagging');
			$ids = $this -> Tagging -> find('list', array('fields' => array('Tagging.taggable_id'), 'joins' => array( array('table' => 'tags', 'alias' => 'Tag', 'conditions' => array('Tagging.tag_id=Tag.id'))), 'conditions' => array('Tag.name' => $this -> params['tag']), 'recursive' => -1));

			$this -> setSearch('Blog');
			$conditions = array('Blog.id' => $ids);
			$blog_category_id = null;
			// @meta_keywords=params[:tag]+','+t(:meta_keywords)
		} else {
			if (isset($this -> request -> query['id'])) {
				$blog = $this -> view($this -> request -> query['id']);
				$blog_category_id = $blog['Blog']['blog_category_id'];
			} else {
				if (isset($this -> request -> query['blog_category_id'])) {
					if ($this -> BlogCategories -> exists($this -> request -> query['blog_category_id'])) {
						$blog_category_id = $this -> request -> query['blog_category_id'];
					} else {
						throw new NotFoundException(__('Invalid post'));
					}
				} else {
					$blog_category_id = key($blogCategories->toArray());
				}

				//	$blog = $this -> Blog -> find('first', array('conditions' => array('Blog.blog_category_id' => $blog_category_id)));
			}
			$conditions = array('Blogs.blog_category_id' => $blog_category_id);
		}

		$this -> Blogs -> recursive = 0;
		$this -> setSearch('Blog');
		$this -> Paginator-> settings = array('conditions' => $conditions, 'order' => 'Blogs.id desc');

		$this -> set('blogs', $this -> paginate($this->Blogs));
		$this -> set('blogCategoryId', $blog_category_id);
		if (isset($blog)) {
			$this -> set('blog', $blog);
		}
		//$this->render('index_default');
	}

    /**
     * View method
     *
     * @param string|null $id Blog id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $blog = $this->Blogs->get($id, [
            'contain' => []
        ]);
        $this->set('blog', $blog);
        $this->set('_serialize', ['blog']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $blog = $this->Blogs->newEntity();
        if ($this->request->is('post')) {
            $blog = $this->Blogs->patchEntity($blog, $this->request->data);
            if ($this->Blogs->save($blog)) {
                $this->Flash->success('The blog has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The blog could not be saved. Please, try again.');
            }
        }
        $this->set(compact('blog'));
        $this->set('_serialize', ['blog']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Blog id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $blog = $this->Blogs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $blog = $this->Blogs->patchEntity($blog, $this->request->data);
            if ($this->Blogs->save($blog)) {
                $this->Flash->success('The blog has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The blog could not be saved. Please, try again.');
            }
        }
        $this->set(compact('blog'));
        $this->set('_serialize', ['blog']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Blog id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $blog = $this->Blogs->get($id);
        if ($this->Blogs->delete($blog)) {
            $this->Flash->success('The blog has been deleted.');
        } else {
            $this->Flash->error('The blog could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
