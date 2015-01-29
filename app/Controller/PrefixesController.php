<?php
App::uses('AppController', 'Controller');

/**
 * Prefixes Controller
 *
 * @property Prefix $Prefix
 * @property PaginatorComponent $Paginator
 */
class PrefixesController extends AppController
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
        $this->Prefix->recursive = 0;
        $this->set('prefixes', $this->Paginator->paginate());
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
        if (!$this->Prefix->exists($id)) {
            throw new NotFoundException(__('Invalid prefix'));
        }
        $options = array('conditions' => array('Prefix.' . $this->Prefix->primaryKey => $id));
        $this->set('prefix', $this->Prefix->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Prefix->create();
            if ($this->Prefix->save($this->request->data)) {
                $this->Session->setFlash(__('The prefix has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The prefix could not be saved. Please, try again.'));
            }
        }
        $categorytrees = $this->Prefix->Categorytree->find('list');
        $this->set(compact('categorytrees'));
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
        if (!$this->Prefix->exists($id)) {
            throw new NotFoundException(__('Invalid prefix'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Prefix->save($this->request->data)) {
                $this->Session->setFlash(__('The prefix has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The prefix could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Prefix.' . $this->Prefix->primaryKey => $id));
            $this->request->data = $this->Prefix->find('first', $options);
        }
        $categorytrees = $this->Prefix->Categorytree->find('list');
        $this->set(compact('categorytrees'));
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
        $this->Prefix->id = $id;
        if (!$this->Prefix->exists()) {
            throw new NotFoundException(__('Invalid prefix'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Prefix->delete()) {
            $this->Session->setFlash(__('The prefix has been deleted.'));
        } else {
            $this->Session->setFlash(__('The prefix could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
