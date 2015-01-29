<?php
App::uses('AppController', 'Controller');

/**
 * Categorytrees Controller
 *
 * @property Categorytree $Categorytree
 * @property PaginatorComponent $Paginator
 */
class CategorytreesController extends AppController
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
        $this->Categorytree->recursive = 0;
        $this->set('categorytrees', $this->Paginator->paginate());
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
        if (!$this->Categorytree->exists($id)) {
            throw new NotFoundException(__('Invalid categorytree'));
        }
        $options = array('conditions' => array('Categorytree.' . $this->Categorytree->primaryKey => $id));
        $this->set('categorytree', $this->Categorytree->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Categorytree->create();
            if ($this->Categorytree->save($this->request->data)) {
                $this->Session->setFlash(__('The categorytree has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The categorytree could not be saved. Please, try again.'));
            }
        }
        $parentCategorytrees = $this->Categorytree->ParentCategorytree->find('list');
        $categories = $this->Categorytree->Category->find('list');
        $positions = $this->Categorytree->Position->find('list');
        $prefixes = $this->Categorytree->Prefix->find('list');
        $this->set(compact('parentCategorytrees', 'categories', 'positions', 'prefixes'));
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
        if (!$this->Categorytree->exists($id)) {
            throw new NotFoundException(__('Invalid categorytree'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Categorytree->save($this->request->data)) {
                $this->Session->setFlash(__('The categorytree has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The categorytree could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Categorytree.' . $this->Categorytree->primaryKey => $id));
            $this->request->data = $this->Categorytree->find('first', $options);
        }
        $parentCategorytrees = $this->Categorytree->ParentCategorytree->find('list');
        $categories = $this->Categorytree->Category->find('list');
        $positions = $this->Categorytree->Position->find('list');
        $prefixes = $this->Categorytree->Prefix->find('list');
        $this->set(compact('parentCategorytrees', 'categories', 'positions', 'prefixes'));
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
        $this->Categorytree->id = $id;
        if (!$this->Categorytree->exists()) {
            throw new NotFoundException(__('Invalid categorytree'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Categorytree->delete()) {
            $this->Session->setFlash(__('The categorytree has been deleted.'));
        } else {
            $this->Session->setFlash(__('The categorytree could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
