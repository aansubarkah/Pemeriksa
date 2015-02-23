<?php
App::uses('AppController', 'Controller');

/**
 * Levels Controller
 *
 * @property Level $Level
 * @property PaginatorComponent $Paginator
 */
class LevelsController extends AppController
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
        $this->Level->recursive = 0;
        $this->set('levels', $this->Paginator->paginate());
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
        if (!$this->Level->exists($id)) {
            throw new NotFoundException(__('Invalid level'));
        }
        $options = array('conditions' => array('Level.' . $this->Level->primaryKey => $id));
        $this->set('level', $this->Level->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Level->create();
            if ($this->Level->save($this->request->data)) {
                $this->Session->setFlash(__('The level has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The level could not be saved. Please, try again.'));
            }
        }
        $users = $this->Level->User->find('list');
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
        if (!$this->Level->exists($id)) {
            throw new NotFoundException(__('Invalid level'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Level->save($this->request->data)) {
                $this->Session->setFlash(__('The level has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The level could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Level.' . $this->Level->primaryKey => $id));
            $this->request->data = $this->Level->find('first', $options);
        }
        $users = $this->Level->User->find('list');
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
        $this->Level->id = $id;
        if (!$this->Level->exists()) {
            throw new NotFoundException(__('Invalid level'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Level->delete()) {
            $this->Session->setFlash(__('The level has been deleted.'));
        } else {
            $this->Session->setFlash(__('The level could not be deleted. Please, try again.'));
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
                'title' => 'Pangkat/Gol',
                'controller' => 'levels',
                'action' => 'indexUser'
            )
        );
        $title_for_layout = 'Pangkat/Gol';

        /**
         * This controller's action use Userlevelview model
         *
         * @var array
         * @var Userlevelview $Userlevelview
         */
        $this->uses = array('Userlevelview');

        $conditions = array(
            'Userlevelview.active' => true,
            'Userlevelview.user_id' => $this->Auth->user('id')
        );

        $this->Paginator->settings = array(
            'recursive' => -1,
            'conditions' => $conditions,
            'limit' => 10,
            'order' => array('Userlevelview.start' => 'DESC')
        );

        $levels = $this->Paginator->paginate('Userlevelview');

        $this->set(compact('title_for_layout', 'breadCrumb', 'levels'));
    }

    public function addUser()
    {
        if ($this->request->is(array('post'))) {
            $this->Level->LevelsUser->create();
            $this->request->data['LevelsUser']['user_id'] = $this->Auth->user('id');
            if (!isset($this->request->data['LevelsUser']['start']) || empty($this->request->data['LevelsUser']['start'])) {
                $this->request->data['LevelsUser']['start'] = date('Y-m-d');
            }

            if ($this->Level->LevelsUser->save($this->request->data)) {
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
                'title' => 'Pangkat/Gol',
                'controller' => 'levels',
                'action' => 'indexUser'
            ),
            2 => array(
                'title' => 'Tambah',
                'controller' => 'levels',
                'action' => 'addUser'
            )
        );

        $title_for_layout = 'Pangkat/Gol';

        $level = $this->Level->find('list', array(
            'recursive' => -1,
            'conditions' => array(
                'Level.active' => true
            )
        ));

        $this->set(compact('title_for_layout', 'breadCrumb', 'level'));
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
