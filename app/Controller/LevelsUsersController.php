<?php
App::uses('AppController', 'Controller');

/**
 * LevelsUsers Controller
 *
 * @property LevelsUser $LevelsUser
 * @property PaginatorComponent $Paginator
 */
class LevelsUsersController extends AppController
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
        $this->LevelsUser->recursive = 0;
        $this->set('levelsUsers', $this->Paginator->paginate());
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
        if (!$this->LevelsUser->exists($id)) {
            throw new NotFoundException(__('Invalid levels user'));
        }
        $options = array('conditions' => array('LevelsUser.' . $this->LevelsUser->primaryKey => $id));
        $this->set('levelsUser', $this->LevelsUser->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->LevelsUser->create();
            if ($this->LevelsUser->save($this->request->data)) {
                $this->Session->setFlash(__('The levels user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The levels user could not be saved. Please, try again.'));
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
        if (!$this->LevelsUser->exists($id)) {
            throw new NotFoundException(__('Invalid levels user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->LevelsUser->save($this->request->data)) {
                $this->Session->setFlash(__('The levels user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The levels user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('LevelsUser.' . $this->LevelsUser->primaryKey => $id));
            $this->request->data = $this->LevelsUser->find('first', $options);
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
        $this->LevelsUser->id = $id;
        if (!$this->LevelsUser->exists()) {
            throw new NotFoundException(__('Invalid levels user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->LevelsUser->delete()) {
            $this->Session->setFlash(__('The levels user has been deleted.'));
        } else {
            $this->Session->setFlash(__('The levels user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
