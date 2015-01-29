<?php
App::uses('AppController', 'Controller');

/**
 * UsersPeriods Controller
 *
 * @property UsersPeriod $UsersPeriod
 * @property PaginatorComponent $Paginator
 */
class UsersPeriodsController extends AppController
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
        $this->UsersPeriod->recursive = 0;
        $this->set('usersPeriods', $this->Paginator->paginate());
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
        if (!$this->UsersPeriod->exists($id)) {
            throw new NotFoundException(__('Invalid users period'));
        }
        $options = array('conditions' => array('UsersPeriod.' . $this->UsersPeriod->primaryKey => $id));
        $this->set('usersPeriod', $this->UsersPeriod->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->UsersPeriod->create();
            if ($this->UsersPeriod->save($this->request->data)) {
                $this->Session->setFlash(__('The users period has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The users period could not be saved. Please, try again.'));
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
        if (!$this->UsersPeriod->exists($id)) {
            throw new NotFoundException(__('Invalid users period'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->UsersPeriod->save($this->request->data)) {
                $this->Session->setFlash(__('The users period has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The users period could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('UsersPeriod.' . $this->UsersPeriod->primaryKey => $id));
            $this->request->data = $this->UsersPeriod->find('first', $options);
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
        $this->UsersPeriod->id = $id;
        if (!$this->UsersPeriod->exists()) {
            throw new NotFoundException(__('Invalid users period'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->UsersPeriod->delete()) {
            $this->Session->setFlash(__('The users period has been deleted.'));
        } else {
            $this->Session->setFlash(__('The users period could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
