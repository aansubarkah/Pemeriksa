<?php
App::uses('AppController', 'Controller');

/**
 * Uploaders Controller
 *
 * @property Uploader $Uploader
 * @property PaginatorComponent $Paginator
 */
class UploadersController extends AppController
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
        $this->Uploader->recursive = 0;
        $this->set('uploaders', $this->Paginator->paginate());
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
        if (!$this->Uploader->exists($id)) {
            throw new NotFoundException(__('Invalid uploader'));
        }
        $options = array('conditions' => array('Uploader.' . $this->Uploader->primaryKey => $id));
        $this->set('uploader', $this->Uploader->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Uploader->create();
            if ($this->Uploader->save($this->request->data)) {
                $this->Session->setFlash(__('The uploader has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The uploader could not be saved. Please, try again.'));
            }
        }
        $users = $this->Uploader->User->find('list');
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
        if (!$this->Uploader->exists($id)) {
            throw new NotFoundException(__('Invalid uploader'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Uploader->save($this->request->data)) {
                $this->Session->setFlash(__('The uploader has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The uploader could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Uploader.' . $this->Uploader->primaryKey => $id));
            $this->request->data = $this->Uploader->find('first', $options);
        }
        $users = $this->Uploader->User->find('list');
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
        $this->Uploader->id = $id;
        if (!$this->Uploader->exists()) {
            throw new NotFoundException(__('Invalid uploader'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Uploader->delete()) {
            $this->Session->setFlash(__('The uploader has been deleted.'));
        } else {
            $this->Session->setFlash(__('The uploader could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
