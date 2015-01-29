<?php
App::uses('AppController', 'Controller');

/**
 * EducationsUsers Controller
 *
 * @property EducationsUser $EducationsUser
 * @property PaginatorComponent $Paginator
 */
class EducationsUsersController extends AppController
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
        $this->EducationsUser->recursive = 0;
        $this->set('educationsUsers', $this->Paginator->paginate());
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
        if (!$this->EducationsUser->exists($id)) {
            throw new NotFoundException(__('Invalid educations user'));
        }
        $options = array('conditions' => array('EducationsUser.' . $this->EducationsUser->primaryKey => $id));
        $this->set('educationsUser', $this->EducationsUser->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->EducationsUser->create();
            if ($this->EducationsUser->save($this->request->data)) {
                $this->Session->setFlash(__('The educations user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The educations user could not be saved. Please, try again.'));
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
        if (!$this->EducationsUser->exists($id)) {
            throw new NotFoundException(__('Invalid educations user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->EducationsUser->save($this->request->data)) {
                $this->Session->setFlash(__('The educations user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The educations user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('EducationsUser.' . $this->EducationsUser->primaryKey => $id));
            $this->request->data = $this->EducationsUser->find('first', $options);
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
        $this->EducationsUser->id = $id;
        if (!$this->EducationsUser->exists()) {
            throw new NotFoundException(__('Invalid educations user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->EducationsUser->delete()) {
            $this->Session->setFlash(__('The educations user has been deleted.'));
        } else {
            $this->Session->setFlash(__('The educations user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
