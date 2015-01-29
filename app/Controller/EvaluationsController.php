<?php
App::uses('AppController', 'Controller');

/**
 * Evaluations Controller
 *
 * @property Evaluation $Evaluation
 * @property PaginatorComponent $Paginator
 */
class EvaluationsController extends AppController
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
        $this->Evaluation->recursive = 0;
        $this->set('evaluations', $this->Paginator->paginate());
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
        if (!$this->Evaluation->exists($id)) {
            throw new NotFoundException(__('Invalid evaluation'));
        }
        $options = array('conditions' => array('Evaluation.' . $this->Evaluation->primaryKey => $id));
        $this->set('evaluation', $this->Evaluation->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Evaluation->create();
            if ($this->Evaluation->save($this->request->data)) {
                $this->Session->setFlash(__('The evaluation has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The evaluation could not be saved. Please, try again.'));
            }
        }
        $users = $this->Evaluation->User->find('list');
        $periods = $this->Evaluation->Period->find('list');
        $categorytrees = $this->Evaluation->Categorytree->find('list');
        $this->set(compact('users', 'periods', 'categorytrees'));
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
        if (!$this->Evaluation->exists($id)) {
            throw new NotFoundException(__('Invalid evaluation'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Evaluation->save($this->request->data)) {
                $this->Session->setFlash(__('The evaluation has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The evaluation could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Evaluation.' . $this->Evaluation->primaryKey => $id));
            $this->request->data = $this->Evaluation->find('first', $options);
        }
        $users = $this->Evaluation->User->find('list');
        $periods = $this->Evaluation->Period->find('list');
        $categorytrees = $this->Evaluation->Categorytree->find('list');
        $this->set(compact('users', 'periods', 'categorytrees'));
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
        $this->Evaluation->id = $id;
        if (!$this->Evaluation->exists()) {
            throw new NotFoundException(__('Invalid evaluation'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Evaluation->delete()) {
            $this->Session->setFlash(__('The evaluation has been deleted.'));
        } else {
            $this->Session->setFlash(__('The evaluation could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
