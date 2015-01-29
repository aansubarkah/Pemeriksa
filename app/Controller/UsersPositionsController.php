<?php
App::uses('AppController', 'Controller');

/**
 * UsersPositions Controller
 *
 * @property UsersPosition $UsersPosition
 * @property PaginatorComponent $Paginator
 */
class UsersPositionsController extends AppController
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
        $this->UsersPosition->recursive = 0;
        $this->set('usersPositions', $this->Paginator->paginate());
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
        if (!$this->UsersPosition->exists($id)) {
            throw new NotFoundException(__('Invalid users position'));
        }
        $options = array('conditions' => array('UsersPosition.' . $this->UsersPosition->primaryKey => $id));
        $this->set('usersPosition', $this->UsersPosition->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->UsersPosition->create();
            if ($this->UsersPosition->save($this->request->data)) {
                $this->Session->setFlash(__('The users position has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The users position could not be saved. Please, try again.'));
            }
        }
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
        if (!$this->UsersPosition->exists($id)) {
            throw new NotFoundException(__('Invalid users position'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->UsersPosition->save($this->request->data)) {
                $this->Session->setFlash(__('The users position has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The users position could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('UsersPosition.' . $this->UsersPosition->primaryKey => $id));
            $this->request->data = $this->UsersPosition->find('first', $options);
        }
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
        $this->UsersPosition->id = $id;
        if (!$this->UsersPosition->exists()) {
            throw new NotFoundException(__('Invalid users position'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->UsersPosition->delete()) {
            $this->Session->setFlash(__('The users position has been deleted.'));
        } else {
            $this->Session->setFlash(__('The users position could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
