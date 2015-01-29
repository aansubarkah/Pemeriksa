<?php
App::uses('AppController', 'Controller');

/**
 * Simplecategorytreeprefixviews Controller
 *
 * @property Simplecategorytreeprefixview $Simplecategorytreeprefixview
 * @property PaginatorComponent $Paginator
 */
class SimplecategorytreeprefixviewsController extends AppController
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
        $this->Simplecategorytreeprefixview->recursive = 0;
        $this->set('simplecategorytreeprefixviews', $this->Paginator->paginate());
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
        if (!$this->Simplecategorytreeprefixview->exists($id)) {
            throw new NotFoundException(__('Invalid simplecategorytreeprefixview'));
        }
        $options = array('conditions' => array('Simplecategorytreeprefixview.' . $this->Simplecategorytreeprefixview->primaryKey => $id));
        $this->set('simplecategorytreeprefixview', $this->Simplecategorytreeprefixview->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Simplecategorytreeprefixview->create();
            if ($this->Simplecategorytreeprefixview->save($this->request->data)) {
                $this->Session->setFlash(__('The simplecategorytreeprefixview has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The simplecategorytreeprefixview could not be saved. Please, try again.'));
            }
        }
        $categorytrees = $this->Simplecategorytreeprefixview->Categorytree->find('list');
        $prefixes = $this->Simplecategorytreeprefixview->Prefix->find('list');
        $positions = $this->Simplecategorytreeprefixview->Position->find('list');
        $this->set(compact('categorytrees', 'prefixes', 'positions'));
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
        if (!$this->Simplecategorytreeprefixview->exists($id)) {
            throw new NotFoundException(__('Invalid simplecategorytreeprefixview'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Simplecategorytreeprefixview->save($this->request->data)) {
                $this->Session->setFlash(__('The simplecategorytreeprefixview has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The simplecategorytreeprefixview could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Simplecategorytreeprefixview.' . $this->Simplecategorytreeprefixview->primaryKey => $id));
            $this->request->data = $this->Simplecategorytreeprefixview->find('first', $options);
        }
        $categorytrees = $this->Simplecategorytreeprefixview->Categorytree->find('list');
        $prefixes = $this->Simplecategorytreeprefixview->Prefix->find('list');
        $positions = $this->Simplecategorytreeprefixview->Position->find('list');
        $this->set(compact('categorytrees', 'prefixes', 'positions'));
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
        $this->Simplecategorytreeprefixview->id = $id;
        if (!$this->Simplecategorytreeprefixview->exists()) {
            throw new NotFoundException(__('Invalid simplecategorytreeprefixview'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Simplecategorytreeprefixview->delete()) {
            $this->Session->setFlash(__('The simplecategorytreeprefixview has been deleted.'));
        } else {
            $this->Session->setFlash(__('The simplecategorytreeprefixview could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
