<?php
App::uses('AppController', 'Controller');

/**
 * CategorytreesPrefixes Controller
 *
 * @property CategorytreesPrefix $CategorytreesPrefix
 * @property PaginatorComponent $Paginator
 */
class CategorytreesPrefixesController extends AppController
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
        $this->CategorytreesPrefix->recursive = 0;
        $this->set('categorytreesPrefixes', $this->Paginator->paginate());
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
        if (!$this->CategorytreesPrefix->exists($id)) {
            throw new NotFoundException(__('Invalid categorytrees prefix'));
        }
        $options = array('conditions' => array('CategorytreesPrefix.' . $this->CategorytreesPrefix->primaryKey => $id));
        $this->set('categorytreesPrefix', $this->CategorytreesPrefix->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->CategorytreesPrefix->create();
            if ($this->CategorytreesPrefix->save($this->request->data)) {
                $this->Session->setFlash(__('The categorytrees prefix has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The categorytrees prefix could not be saved. Please, try again.'));
            }
        }
        $categorytrees = $this->CategorytreesPrefix->Categorytree->find('list');
        $prefixes = $this->CategorytreesPrefix->Prefix->find('list');
        $positions = $this->CategorytreesPrefix->Position->find('list');
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
        if (!$this->CategorytreesPrefix->exists($id)) {
            throw new NotFoundException(__('Invalid categorytrees prefix'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->CategorytreesPrefix->save($this->request->data)) {
                $this->Session->setFlash(__('The categorytrees prefix has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The categorytrees prefix could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('CategorytreesPrefix.' . $this->CategorytreesPrefix->primaryKey => $id));
            $this->request->data = $this->CategorytreesPrefix->find('first', $options);
        }
        $categorytrees = $this->CategorytreesPrefix->Categorytree->find('list');
        $prefixes = $this->CategorytreesPrefix->Prefix->find('list');
        $positions = $this->CategorytreesPrefix->Position->find('list');
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
        $this->CategorytreesPrefix->id = $id;
        if (!$this->CategorytreesPrefix->exists()) {
            throw new NotFoundException(__('Invalid categorytrees prefix'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->CategorytreesPrefix->delete()) {
            $this->Session->setFlash(__('The categorytrees prefix has been deleted.'));
        } else {
            $this->Session->setFlash(__('The categorytrees prefix could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
