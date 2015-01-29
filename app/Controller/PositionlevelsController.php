<?php
App::uses('AppController', 'Controller');

/**
 * Positionlevels Controller
 *
 * @property Positionlevel $Positionlevel
 * @property PaginatorComponent $Paginator
 */
class PositionlevelsController extends AppController
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
        $this->Positionlevel->recursive = 0;
        $this->set('positionlevels', $this->Paginator->paginate());
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
        if (!$this->Positionlevel->exists($id)) {
            throw new NotFoundException(__('Invalid positionlevel'));
        }
        $options = array('conditions' => array('Positionlevel.' . $this->Positionlevel->primaryKey => $id));
        $this->set('positionlevel', $this->Positionlevel->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Positionlevel->create();
            if ($this->Positionlevel->save($this->request->data)) {
                $this->Session->setFlash(__('The positionlevel has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The positionlevel could not be saved. Please, try again.'));
            }
        }
        $positions = $this->Positionlevel->Position->find('list');
        $users = $this->Positionlevel->User->find('list');
        $this->set(compact('positions', 'users'));
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
        if (!$this->Positionlevel->exists($id)) {
            throw new NotFoundException(__('Invalid positionlevel'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Positionlevel->save($this->request->data)) {
                $this->Session->setFlash(__('The positionlevel has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The positionlevel could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Positionlevel.' . $this->Positionlevel->primaryKey => $id));
            $this->request->data = $this->Positionlevel->find('first', $options);
        }
        $positions = $this->Positionlevel->Position->find('list');
        $users = $this->Positionlevel->User->find('list');
        $this->set(compact('positions', 'users'));
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
        $this->Positionlevel->id = $id;
        if (!$this->Positionlevel->exists()) {
            throw new NotFoundException(__('Invalid positionlevel'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Positionlevel->delete()) {
            $this->Session->setFlash(__('The positionlevel has been deleted.'));
        } else {
            $this->Session->setFlash(__('The positionlevel could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
