<?php
App::uses('AppController', 'Controller');

/**
 * Simplecategorytreeviews Controller
 *
 * @property Simplecategorytreeview $Simplecategorytreeview
 * @property PaginatorComponent $Paginator
 */
class SimplecategorytreeviewsController extends AppController
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
        $this->Simplecategorytreeview->recursive = 0;
        $this->set('simplecategorytreeviews', $this->Paginator->paginate());
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
        if (!$this->Simplecategorytreeview->exists($id)) {
            throw new NotFoundException(__('Invalid simplecategorytreeview'));
        }
        $options = array('conditions' => array('Simplecategorytreeview.' . $this->Simplecategorytreeview->primaryKey => $id));
        $this->set('simplecategorytreeview', $this->Simplecategorytreeview->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Simplecategorytreeview->create();
            if ($this->Simplecategorytreeview->save($this->request->data)) {
                $this->Session->setFlash(__('The simplecategorytreeview has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The simplecategorytreeview could not be saved. Please, try again.'));
            }
        }
        $parentSimplecategorytreeviews = $this->Simplecategorytreeview->ParentSimplecategorytreeview->find('list');
        $categorytrees = $this->Simplecategorytreeview->Categorytree->find('list');
        $categories = $this->Simplecategorytreeview->Category->find('list');
        $positions = $this->Simplecategorytreeview->Position->find('list');
        $this->set(compact('parentSimplecategorytreeviews', 'categorytrees', 'categories', 'positions'));
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
        if (!$this->Simplecategorytreeview->exists($id)) {
            throw new NotFoundException(__('Invalid simplecategorytreeview'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Simplecategorytreeview->save($this->request->data)) {
                $this->Session->setFlash(__('The simplecategorytreeview has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The simplecategorytreeview could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Simplecategorytreeview.' . $this->Simplecategorytreeview->primaryKey => $id));
            $this->request->data = $this->Simplecategorytreeview->find('first', $options);
        }
        $parentSimplecategorytreeviews = $this->Simplecategorytreeview->ParentSimplecategorytreeview->find('list');
        $categorytrees = $this->Simplecategorytreeview->Categorytree->find('list');
        $categories = $this->Simplecategorytreeview->Category->find('list');
        $positions = $this->Simplecategorytreeview->Position->find('list');
        $this->set(compact('parentSimplecategorytreeviews', 'categorytrees', 'categories', 'positions'));
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
        $this->Simplecategorytreeview->id = $id;
        if (!$this->Simplecategorytreeview->exists()) {
            throw new NotFoundException(__('Invalid simplecategorytreeview'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Simplecategorytreeview->delete()) {
            $this->Session->setFlash(__('The simplecategorytreeview has been deleted.'));
        } else {
            $this->Session->setFlash(__('The simplecategorytreeview could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
