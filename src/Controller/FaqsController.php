<?php
namespace App\Controller;

/**
 * UserBoardLogs Controller
 *
 * @property \App\Model\Table\UserBoardLogsTable $UserBoardLogs
 */
class FaqsController extends SLController
{

	protected function _getCategory() {
		$this -> loadModel('FaqCategories');
		$faqCategories = $this -> FaqCategories -> find('list',array('recursive'=>-1,'conditions'=>array('enable'=>true)));
		if (count($faqCategories)) {
			$this -> set('faqCategories', $faqCategories);
			if (isset($this -> request -> query['faq_category_id'])) {
				if (!$this -> FaqCategories -> exists($this -> request -> query['faq_category_id']))
					throw new NotFoundException(__('Invalid post'));

				$faq_category_id = $this -> request -> query['faq_category_id'];
			} else {
				$faq_category_id = key($faqCategories->toArray());
			}
			$this -> set('faqCategoryId', $faq_category_id);
		} else {
			throw new Exception(__('Insert Faq Category First'));
		}
		return $faqCategories;
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$faqCategories = $this -> _getCategory();

		if (isset($this -> request -> query['id'])) {
			$faq = $this -> view($this -> request -> query['id']);
			$faq_category_id = $faq['Faq']['faq_category_id'];
		} else {
			if (isset($this -> request -> query['faq_category_id'])) {
				if ($this -> FaqCategories -> exists($this -> request -> query['faq_category_id'])) {
					$faq_category_id = $this -> request -> query['faq_category_id'];
				} else {
					throw new NotFoundException(__('Invalid post'));
				}
			} else {
				$faq_category_id = key($faqCategories->toArray());
			}

			$faq = $this -> Faqs -> find('All', array('conditions' => array('faq_category_id' => $faq_category_id)))->First();
		}

		$this -> Faqs -> recursive = 0;
		$this -> setSearch('Faq');
		$this -> paginate = array('conditions' => array('faq_category_id' => $faq_category_id));

		if (count($faq))
			$this -> set('faq', $faq);
		
		$this -> set('faqs',$this->paginate($this->Faqs));
		$this -> set('faqCategoryId', $faq_category_id);
		
		//$this->render('index_default');		
	}

    /**
     * View method
     *
     * @param string|null $id Faq id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $faq = $this->Faqs->get($id, [
            'contain' => []
        ]);
        $this->set('faq', $faq);
        $this->set('_serialize', ['faq']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $faq = $this->Faqs->newEntity();
        if ($this->request->is('post')) {
            $faq = $this->Faqs->patchEntity($faq, $this->request->data);
            if ($this->Faqs->save($faq)) {
                $this->Flash->success('The faq has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The faq could not be saved. Please, try again.');
            }
        } else {
			$this -> _getCategory();        	
        }
        $this->set(compact('faq'));
        $this->set('_serialize', ['faq']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Faq id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $faq = $this->Faqs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $faq = $this->Faqs->patchEntity($faq, $this->request->data);
            if ($this->Faqs->save($faq)) {
                $this->Flash->success('The faq has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The faq could not be saved. Please, try again.');
            }
        }
        $this->set(compact('faq'));
        $this->set('_serialize', ['faq']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Faq id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $faq = $this->Faqs->get($id);
        if ($this->Faqs->delete($faq)) {
            $this->Flash->success('The faq has been deleted.');
        } else {
            $this->Flash->error('The faq could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
