<?php
App::uses('AppController', 'Controller');

/**
 * Departements Controller
 *
 * @property Departement $Departement
 * @property PaginatorComponent $Paginator
 */
class DepartementsController extends AppController
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
        $this->Departement->recursive = 0;
        $this->set('departements', $this->Paginator->paginate());
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
        if (!$this->Departement->exists($id)) {
            throw new NotFoundException(__('Invalid departement'));
        }
        $options = array('conditions' => array('Departement.' . $this->Departement->primaryKey => $id));
        $this->set('departement', $this->Departement->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Departement->create();
            if ($this->Departement->save($this->request->data)) {
                $this->Session->setFlash(__('The departement has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The departement could not be saved. Please, try again.'));
            }
        }
        $parentDepartements = $this->Departement->ParentDepartement->find('list');
        $chieves = $this->Departement->Chief->find('list');
        $users = $this->Departement->User->find('list');
        $this->set(compact('parentDepartements', 'chieves', 'users'));
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
        if (!$this->Departement->exists($id)) {
            throw new NotFoundException(__('Invalid departement'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Departement->save($this->request->data)) {
                $this->Session->setFlash(__('The departement has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The departement could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Departement.' . $this->Departement->primaryKey => $id));
            $this->request->data = $this->Departement->find('first', $options);
        }
        $parentDepartements = $this->Departement->ParentDepartement->find('list');
        $chieves = $this->Departement->Chief->find('list');
        $users = $this->Departement->User->find('list');
        $this->set(compact('parentDepartements', 'chieves', 'users'));
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
        $this->Departement->id = $id;
        if (!$this->Departement->exists()) {
            throw new NotFoundException(__('Invalid departement'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Departement->delete()) {
            $this->Session->setFlash(__('The departement has been deleted.'));
        } else {
            $this->Session->setFlash(__('The departement could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function lists()
    {
        if (!empty($this->request->query['q'])) {
            $q = trim(strtolower($this->request->query['q']));
            $q = '%' . $q . '%';
            $tags = $this->Departement->find('all', array(
                'recursive' => -1,
                'conditions' => array(
                    'Departement.active' => 1,
                    'Departement.name LIKE' => $q,
                    'NOT' => array(
                        'Departement.parent_id' => null,
                    )
                ),
                'fields' => array('Departement.id', 'Departement.name'),
                'limit' => 3,
                'order' => array('Departement.name' => 'ASC')
            ));

            $data = array();
            $i = 0;
            foreach ($tags as $tag) {
                $data[$i]['value'] = $tag['Departement']['id'];
                $data[$i]['text'] = $tag['Departement']['name'];
                $i++;
            }
        }

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
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
                'title' => 'Unit Kerja',
                'controller' => 'departements',
                'action' => 'indexUser'
            )
        );
        $title_for_layout = 'Unit Kerja';

        /**
         * This controller's action use Userdepartementview model
         *
         * @var array
         * @var Userdepartementview $Userdepartementview
         */
        $this->uses = array('Userdepartementview');

        $conditions = array(
            'Userdepartementview.active' => true,
            'Userdepartementview.user_id' => $this->Auth->user('id')
        );

        $this->Paginator->settings = array(
            'recursive' => -1,
            'conditions' => $conditions,
            'limit' => 10,
            'order' => array('Userdepartementview.start' => 'DESC')
        );

        $departements = $this->Paginator->paginate('Userdepartementview');

        $this->set(compact('title_for_layout', 'breadCrumb', 'departements'));
    }

    public function addUser()
    {
        if ($this->request->is(array('post'))) {
            $this->Departement->DepartementsUser->create();
            $this->request->data['DepartementsUser']['user_id'] = $this->Auth->user('id');
            if (!isset($this->request->data['DepartementsUser']['start']) || empty($this->request->data['DepartementsUser']['start'])) {
                $this->request->data['DepartementsUser']['start'] = date('Y-m-d');
            }

            if ($this->Departement->DepartementsUser->save($this->request->data)) {
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
                'title' => 'Unit Kerja',
                'controller' => 'departements',
                'action' => 'indexUser'
            ),
            2 => array(
                'title' => 'Tambah',
                'controller' => 'departements',
                'action' => 'addUser'
            )
        );

        $title_for_layout = 'Unit Kerja';

        $departement = $this->Departement->find('list', array(
            'recursive' => -1,
            'conditions' => array(
                'Departement.active' => true,
                'NOT' => array(
                    'Departement.parent_id' => null
                )
            ),
            'order' => array(
                'Departement.description' => 'ASC'
            )
        ));

        $this->set(compact('title_for_layout', 'breadCrumb', 'departement'));
    }

    public function editUser($id = null)
    {
        if ($this->request->is(array('post', 'put'))) {
            if (!isset($this->request->data['DepartementsUser']['start']) || empty($this->request->data['DepartementsUser']['start'])) {
                $this->request->data['DepartementsUser']['start'] = date('Y-m-d');
            }

            if ($this->Departement->DepartementsUser->save($this->request->data)) {
                return $this->redirect(array('action' => 'indexUser'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                $id = $this->request->data['EducationsUser']['id'];
            }
        }
        $user = $this->Departement->DepartementsUser->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'DepartementsUser.user_id' => $this->Auth->user('id'),
                'DepartementsUser.id' => $id,
                'DepartementsUser.active' => 1
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
                    'title' => 'Unit Kerja',
                    'controller' => 'departements',
                    'action' => 'indexUser'
                ),
                2 => array(
                    'title' => 'Ubah',
                    'controller' => 'departements',
                    'action' => 'editUser'
                )
            );

            $title_for_layout = 'Unit Kerja';

            $departement = $this->Departement->find('list', array(
                'recursive' => -1,
                'conditions' => array(
                    'Departement.active' => true
                )
            ));

            $this->set(compact('title_for_layout', 'breadCrumb', 'user', 'departement'));
        } else {
            return $this->redirect(array(
                'controller' => 'educations',
                'action' => 'indexUser'
            ));
        }

    }
}
