<?php
App::uses('AppController', 'Controller');

/**
 * ChiefsDepartements Controller
 *
 * @property ChiefsDepartement $ChiefsDepartement
 * @property PaginatorComponent $Paginator
 */
class ChiefsDepartementsController extends AppController
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
        $this->ChiefsDepartement->recursive = 0;
        $this->set('chiefsDepartements', $this->Paginator->paginate());
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
        if (!$this->ChiefsDepartement->exists($id)) {
            throw new NotFoundException(__('Invalid chiefs departement'));
        }
        $options = array('conditions' => array('ChiefsDepartement.' . $this->ChiefsDepartement->primaryKey => $id));
        $this->set('chiefsDepartement', $this->ChiefsDepartement->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->ChiefsDepartement->create();
            if ($this->ChiefsDepartement->save($this->request->data)) {
                $this->Session->setFlash(__('The chiefs departement has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The chiefs departement could not be saved. Please, try again.'));
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
        if (!$this->ChiefsDepartement->exists($id)) {
            throw new NotFoundException(__('Invalid chiefs departement'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->ChiefsDepartement->save($this->request->data)) {
                $this->Session->setFlash(__('The chiefs departement has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The chiefs departement could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('ChiefsDepartement.' . $this->ChiefsDepartement->primaryKey => $id));
            $this->request->data = $this->ChiefsDepartement->find('first', $options);
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
        $this->ChiefsDepartement->id = $id;
        if (!$this->ChiefsDepartement->exists()) {
            throw new NotFoundException(__('Invalid chiefs departement'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->ChiefsDepartement->delete()) {
            $this->Session->setFlash(__('The chiefs departement has been deleted.'));
        } else {
            $this->Session->setFlash(__('The chiefs departement could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
