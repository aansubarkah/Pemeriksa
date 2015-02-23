<?php
App::uses('AppController', 'Controller');

/**
 * Roles Controller
 *
 * @property Role $Role
 * @property PaginatorComponent $Paginator
 */
class RolesController extends AppController
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
        $this->Role->recursive = 0;
        $this->set('roles', $this->Paginator->paginate());
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
        if (!$this->Role->exists($id)) {
            throw new NotFoundException(__('Invalid role'));
        }
        $options = array('conditions' => array('Role.' . $this->Role->primaryKey => $id));
        $this->set('role', $this->Role->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Role->create();
            if ($this->Role->save($this->request->data)) {
                $this->Session->setFlash(__('The role has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The role could not be saved. Please, try again.'));
            }
        }
        $users = $this->Role->User->find('list');
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
        if (!$this->Role->exists($id)) {
            throw new NotFoundException(__('Invalid role'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Role->save($this->request->data)) {
                $this->Session->setFlash(__('The role has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The role could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Role.' . $this->Role->primaryKey => $id));
            $this->request->data = $this->Role->find('first', $options);
        }
        $users = $this->Role->User->find('list');
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
        $this->Role->id = $id;
        if (!$this->Role->exists()) {
            throw new NotFoundException(__('Invalid role'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Role->delete()) {
            $this->Session->setFlash(__('The role has been deleted.'));
        } else {
            $this->Session->setFlash(__('The role could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function indexUser()
    {
        $this->layout = 'profile';
        $breadCrumb = array(
            0 => array(
                'title' => 'Profil',
                'controller' => 'users',
                'action' => '/'
            ),
            1 => array(
                'title' => 'Peran',
                'controller' => 'roles',
                'action' => 'indexUser'
            )
        );
        $title_for_layout = 'Peran';

        /**
         * This controller's action use Userroleview model
         *
         * @var array
         * @var Userroleview $Userroleview
         */
        $this->uses = array('Userroleview');

        $conditions = array(
            'Userroleview.active' => true,
            'Userroleview.user_id' => $this->Auth->user('id')
        );

        $this->Paginator->settings = array(
            'recursive' => -1,
            'conditions' => $conditions,
            'limit' => 10,
            'order' => array('Userroleview.start' => 'DESC')
        );

        $roles = $this->Paginator->paginate('Userroleview');

        $this->set(compact('title_for_layout', 'breadCrumb', 'roles'));
    }

    public function addUser()
    {
        if ($this->request->is(array('post'))) {
            $this->Role->RolesUser->create();
            $this->request->data['RolesUser']['user_id'] = $this->Auth->user('id');
            if (!isset($this->request->data['RolesUser']['start']) || empty($this->request->data['RolesUser']['start'])) {
                $this->request->data['RolesUser']['start'] = date('Y-m-d');
            }

            if ($this->Role->RolesUser->save($this->request->data)) {
                return $this->redirect(array('action' => 'indexUser'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }

        $this->layout = 'profile';
        $breadCrumb = array(
            0 => array(
                'title' => 'Profil',
                'controller' => 'users',
                'action' => '/'
            ),
            1 => array(
                'title' => 'Peran',
                'controller' => 'roles',
                'action' => 'indexUser'
            ),
            2 => array(
                'title' => 'Tambah',
                'controller' => 'roles',
                'action' => 'addUser'
            )
        );

        $title_for_layout = 'Peran';

        $role = $this->Role->find('list', array(
            'recursive' => -1,
            'conditions' => array(
                'Role.active' => true
            )
        ));

        $this->set(compact('title_for_layout', 'breadCrumb', 'role'));
    }

    public function editUser($id = null)
    {
        if ($this->request->is(array('post', 'put'))) {
            if (!isset($this->request->data['RolesUser']['start']) || empty($this->request->data['RolesUser']['start'])) {
                $this->request->data['RolesUser']['start'] = date('Y-m-d');
            }

            if ($this->Role->RolesUser->save($this->request->data)) {
                return $this->redirect(array('action' => 'indexUser'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                $id = $this->request->data['RolesUser']['id'];
            }
        }
        $user = $this->Role->RolesUser->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'RolesUser.user_id' => $this->Auth->user('id'),
                'RolesUser.id' => $id,
                'RolesUser.active' => 1
            )
        ));
        if (!empty($user)) {
            $this->layout = 'profile';
            $breadCrumb = array(
                0 => array(
                    'title' => 'Profil',
                    'controller' => 'users',
                    'action' => '/'
                ),
                1 => array(
                    'title' => 'Peran',
                    'controller' => 'roles',
                    'action' => 'indexUser'
                ),
                2 => array(
                    'title' => 'Ubah',
                    'controller' => 'roles',
                    'action' => 'editUser'
                )
            );

            $title_for_layout = 'Peran';

            $role = $this->Role->find('list', array(
                'recursive' => -1,
                'conditions' => array(
                    'Role.active' => true
                )
            ));

            $this->set(compact('title_for_layout', 'breadCrumb', 'user', 'role'));
        } else {
            return $this->redirect(array(
                'controller' => 'roles',
                'action' => 'indexUser'
            ));
        }

    }
}
