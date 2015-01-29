<?php
App::uses('AppController', 'Controller');

/**
 * Periods Controller
 *
 * @property Period $Period
 * @property PaginatorComponent $Paginator
 */
class PeriodsController extends AppController
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
        $this->Period->recursive = 0;
        $this->set('periods', $this->Paginator->paginate());
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
        if (!$this->Period->exists($id)) {
            throw new NotFoundException(__('Invalid period'));
        }
        $options = array('conditions' => array('Period.' . $this->Period->primaryKey => $id));
        $this->set('period', $this->Period->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Period->create();
            if ($this->Period->save($this->request->data)) {
                $this->Session->setFlash(__('The period has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The period could not be saved. Please, try again.'));
            }
        }
        $users = $this->Period->User->find('list');
        $this->set(compact('users'));
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
        if (!$this->Period->exists($id)) {
            throw new NotFoundException(__('Invalid period'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Period->save($this->request->data)) {
                $this->Session->setFlash(__('The period has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The period could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Period.' . $this->Period->primaryKey => $id));
            $this->request->data = $this->Period->find('first', $options);
        }
        $users = $this->Period->User->find('list');
        $this->set(compact('users'));
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
        $this->Period->id = $id;
        if (!$this->Period->exists()) {
            throw new NotFoundException(__('Invalid period'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Period->delete()) {
            $this->Session->setFlash(__('The period has been deleted.'));
        } else {
            $this->Session->setFlash(__('The period could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
