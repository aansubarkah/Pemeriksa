<?php
App::uses('AppController', 'Controller');

/**
 * CategorytreesValues Controller
 *
 * @property CategorytreesValue $CategorytreesValue
 * @property PaginatorComponent $Paginator
 */
class CategorytreesValuesController extends AppController
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
        $this->CategorytreesValue->recursive = 0;
        $this->set('categorytreesValues', $this->Paginator->paginate());
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
        if (!$this->CategorytreesValue->exists($id)) {
            throw new NotFoundException(__('Invalid categorytrees value'));
        }
        $options = array('conditions' => array('CategorytreesValue.' . $this->CategorytreesValue->primaryKey => $id));
        $this->set('categorytreesValue', $this->CategorytreesValue->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->CategorytreesValue->create();
            if ($this->CategorytreesValue->save($this->request->data)) {
                $this->Session->setFlash(__('The categorytrees value has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The categorytrees value could not be saved. Please, try again.'));
            }
        }
        $categorytrees = $this->CategorytreesValue->Categorytree->find('list');
        $positionlevels = $this->CategorytreesValue->Positionlevel->find('list');
        $sizes = $this->CategorytreesValue->Size->find('list');
        $this->set(compact('categorytrees', 'positionlevels', 'sizes'));
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
        if (!$this->CategorytreesValue->exists($id)) {
            throw new NotFoundException(__('Invalid categorytrees value'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->CategorytreesValue->save($this->request->data)) {
                $this->Session->setFlash(__('The categorytrees value has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The categorytrees value could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('CategorytreesValue.' . $this->CategorytreesValue->primaryKey => $id));
            $this->request->data = $this->CategorytreesValue->find('first', $options);
        }
        $categorytrees = $this->CategorytreesValue->Categorytree->find('list');
        $positionlevels = $this->CategorytreesValue->Positionlevel->find('list');
        $sizes = $this->CategorytreesValue->Size->find('list');
        $this->set(compact('categorytrees', 'positionlevels', 'sizes'));
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
        $this->CategorytreesValue->id = $id;
        if (!$this->CategorytreesValue->exists()) {
            throw new NotFoundException(__('Invalid categorytrees value'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->CategorytreesValue->delete()) {
            $this->Session->setFlash(__('The categorytrees value has been deleted.'));
        } else {
            $this->Session->setFlash(__('The categorytrees value could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
