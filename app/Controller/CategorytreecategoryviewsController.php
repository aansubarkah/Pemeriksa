<?php
App::uses('AppController', 'Controller');

/**
 * Categorytreecategoryviews Controller
 *
 * @property Categorytreecategoryview $Categorytreecategoryview
 * @property PaginatorComponent $Paginator
 */
class CategorytreecategoryviewsController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function index()
    {
        $this->Categorytreecategoryview->recursive = 0;
        $this->set('categorytreecategoryviews', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null)
    {
        if (!$this->Categorytreecategoryview->exists($id)) {
            throw new NotFoundException(__('Invalid categorytreecategoryview'));
        }
        $options = array('conditions' => array('Categorytreecategoryview.' . $this->Categorytreecategoryview->primaryKey => $id));
        $this->set('categorytreecategoryview', $this->Categorytreecategoryview->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Categorytreecategoryview->create();
            if ($this->Categorytreecategoryview->save($this->request->data)) {
                $this->Session->setFlash(__('The categorytreecategoryview has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The categorytreecategoryview could not be saved. Please, try again.'));
            }
        }
        $categorytreeparents = $this->Categorytreecategoryview->Categorytreeparent->find('list');
        $categorytrees = $this->Categorytreecategoryview->Categorytree->find('list');
        $positions = $this->Categorytreecategoryview->Position->find('list');
        $this->set(compact('categorytreeparents', 'categorytrees', 'positions'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null)
    {
        if (!$this->Categorytreecategoryview->exists($id)) {
            throw new NotFoundException(__('Invalid categorytreecategoryview'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Categorytreecategoryview->save($this->request->data)) {
                $this->Session->setFlash(__('The categorytreecategoryview has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The categorytreecategoryview could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Categorytreecategoryview.' . $this->Categorytreecategoryview->primaryKey => $id));
            $this->request->data = $this->Categorytreecategoryview->find('first', $options);
        }
        $categorytreeparents = $this->Categorytreecategoryview->Categorytreeparent->find('list');
        $categorytrees = $this->Categorytreecategoryview->Categorytree->find('list');
        $positions = $this->Categorytreecategoryview->Position->find('list');
        $this->set(compact('categorytreeparents', 'categorytrees', 'positions'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null)
    {
        $this->Categorytreecategoryview->id = $id;
        if (!$this->Categorytreecategoryview->exists()) {
            throw new NotFoundException(__('Invalid categorytreecategoryview'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Categorytreecategoryview->delete()) {
            $this->Session->setFlash(__('The categorytreecategoryview has been deleted.'));
        } else {
            $this->Session->setFlash(__('The categorytreecategoryview could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
