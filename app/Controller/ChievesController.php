<?php
App::uses('AppController', 'Controller');

/**
 * Chieves Controller
 *
 * @property Chief $Chief
 * @property PaginatorComponent $Paginator
 */
class ChievesController extends AppController
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
        $this->Chief->recursive = 0;
        $this->set('chieves', $this->Paginator->paginate());
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
        if (!$this->Chief->exists($id)) {
            throw new NotFoundException(__('Invalid chief'));
        }
        $options = array('conditions' => array('Chief.' . $this->Chief->primaryKey => $id));
        $this->set('chief', $this->Chief->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Chief->create();
            if ($this->Chief->save($this->request->data)) {
                $this->Session->setFlash(__('The chief has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The chief could not be saved. Please, try again.'));
            }
        }
        $users = $this->Chief->User->find('list');
        $departements = $this->Chief->Departement->find('list');
        $this->set(compact('users', 'departements'));
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
        if (!$this->Chief->exists($id)) {
            throw new NotFoundException(__('Invalid chief'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Chief->save($this->request->data)) {
                $this->Session->setFlash(__('The chief has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The chief could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Chief.' . $this->Chief->primaryKey => $id));
            $this->request->data = $this->Chief->find('first', $options);
        }
        $users = $this->Chief->User->find('list');
        $departements = $this->Chief->Departement->find('list');
        $this->set(compact('users', 'departements'));
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
        $this->Chief->id = $id;
        if (!$this->Chief->exists()) {
            throw new NotFoundException(__('Invalid chief'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Chief->delete()) {
            $this->Session->setFlash(__('The chief has been deleted.'));
        } else {
            $this->Session->setFlash(__('The chief could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
