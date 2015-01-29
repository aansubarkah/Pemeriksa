<?php
App::uses('AppController', 'Controller');

/**
 * UsersPositionlevels Controller
 *
 * @property UsersPositionlevel $UsersPositionlevel
 * @property PaginatorComponent $Paginator
 */
class UsersPositionlevelsController extends AppController
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
        $this->UsersPositionlevel->recursive = 0;
        $this->set('usersPositionlevels', $this->Paginator->paginate());
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
        if (!$this->UsersPositionlevel->exists($id)) {
            throw new NotFoundException(__('Invalid users positionlevel'));
        }
        $options = array('conditions' => array('UsersPositionlevel.' . $this->UsersPositionlevel->primaryKey => $id));
        $this->set('usersPositionlevel', $this->UsersPositionlevel->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->UsersPositionlevel->create();
            if ($this->UsersPositionlevel->save($this->request->data)) {
                $this->Session->setFlash(__('The users positionlevel has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The users positionlevel could not be saved. Please, try again.'));
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
        if (!$this->UsersPositionlevel->exists($id)) {
            throw new NotFoundException(__('Invalid users positionlevel'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->UsersPositionlevel->save($this->request->data)) {
                $this->Session->setFlash(__('The users positionlevel has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The users positionlevel could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('UsersPositionlevel.' . $this->UsersPositionlevel->primaryKey => $id));
            $this->request->data = $this->UsersPositionlevel->find('first', $options);
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
        $this->UsersPositionlevel->id = $id;
        if (!$this->UsersPositionlevel->exists()) {
            throw new NotFoundException(__('Invalid users positionlevel'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->UsersPositionlevel->delete()) {
            $this->Session->setFlash(__('The users positionlevel has been deleted.'));
        } else {
            $this->Session->setFlash(__('The users positionlevel could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
