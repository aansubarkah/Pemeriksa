<?php
App::uses('AppController', 'Controller');

/**
 * Categorytreeprefixviews Controller
 *
 * @property Categorytreeprefixview $Categorytreeprefixview
 * @property PaginatorComponent $Paginator
 */
class CategorytreeprefixviewsController extends AppController
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
        $this->Categorytreeprefixview->recursive = 0;
        $this->set('categorytreeprefixviews', $this->Paginator->paginate());
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
        if (!$this->Categorytreeprefixview->exists($id)) {
            throw new NotFoundException(__('Invalid categorytreeprefixview'));
        }
        $options = array('conditions' => array('Categorytreeprefixview.' . $this->Categorytreeprefixview->primaryKey => $id));
        $this->set('categorytreeprefixview', $this->Categorytreeprefixview->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Categorytreeprefixview->create();
            if ($this->Categorytreeprefixview->save($this->request->data)) {
                $this->Session->setFlash(__('The categorytreeprefixview has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The categorytreeprefixview could not be saved. Please, try again.'));
            }
        }
        $categorytreeparents = $this->Categorytreeprefixview->Categorytreeparent->find('list');
        $categories = $this->Categorytreeprefixview->Category->find('list');
        $categorytreepositions = $this->Categorytreeprefixview->Categorytreeposition->find('list');
        $prefixpositions = $this->Categorytreeprefixview->Prefixposition->find('list');
        $this->set(compact('categorytreeparents', 'categories', 'categorytreepositions', 'prefixpositions'));
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
        if (!$this->Categorytreeprefixview->exists($id)) {
            throw new NotFoundException(__('Invalid categorytreeprefixview'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Categorytreeprefixview->save($this->request->data)) {
                $this->Session->setFlash(__('The categorytreeprefixview has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The categorytreeprefixview could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Categorytreeprefixview.' . $this->Categorytreeprefixview->primaryKey => $id));
            $this->request->data = $this->Categorytreeprefixview->find('first', $options);
        }
        $categorytreeparents = $this->Categorytreeprefixview->Categorytreeparent->find('list');
        $categories = $this->Categorytreeprefixview->Category->find('list');
        $categorytreepositions = $this->Categorytreeprefixview->Categorytreeposition->find('list');
        $prefixpositions = $this->Categorytreeprefixview->Prefixposition->find('list');
        $this->set(compact('categorytreeparents', 'categories', 'categorytreepositions', 'prefixpositions'));
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
        $this->Categorytreeprefixview->id = $id;
        if (!$this->Categorytreeprefixview->exists()) {
            throw new NotFoundException(__('Invalid categorytreeprefixview'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Categorytreeprefixview->delete()) {
            $this->Session->setFlash(__('The categorytreeprefixview has been deleted.'));
        } else {
            $this->Session->setFlash(__('The categorytreeprefixview could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
