<?php
App::uses('AppController', 'Controller');

/**
 * Educations Controller
 *
 * @property Education $Education
 * @property PaginatorComponent $Paginator
 */
class EducationsController extends AppController
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
        $this->Education->recursive = 0;
        $this->set('educations', $this->Paginator->paginate());
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
        if (!$this->Education->exists($id)) {
            throw new NotFoundException(__('Invalid education'));
        }
        $options = array('conditions' => array('Education.' . $this->Education->primaryKey => $id));
        $this->set('education', $this->Education->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Education->create();
            if ($this->Education->save($this->request->data)) {
                $this->Session->setFlash(__('The education has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The education could not be saved. Please, try again.'));
            }
        }
        $users = $this->Education->User->find('list');
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
        if (!$this->Education->exists($id)) {
            throw new NotFoundException(__('Invalid education'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Education->save($this->request->data)) {
                $this->Session->setFlash(__('The education has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The education could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Education.' . $this->Education->primaryKey => $id));
            $this->request->data = $this->Education->find('first', $options);
        }
        $users = $this->Education->User->find('list');
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
        $this->Education->id = $id;
        if (!$this->Education->exists()) {
            throw new NotFoundException(__('Invalid education'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Education->delete()) {
            $this->Session->setFlash(__('The education has been deleted.'));
        } else {
            $this->Session->setFlash(__('The education could not be deleted. Please, try again.'));
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
                'title' => 'Pendidikan',
                'controller' => 'educations',
                'action' => 'indexUser'
            )
        );
        $title_for_layout = 'Pendidikan';

        /**
         * This controller's action use Usereducationview model
         *
         * @var array
         * @var Usereducationview $Usereducationview
         */
        $this->uses = array('Usereducationview');

        $conditions = array(
            'Usereducationview.active' => true,
            'Usereducationview.user_id' => $this->Auth->user('id')
        );

        $this->Paginator->settings = array(
            'recursive' => -1,
            'conditions' => $conditions,
            'limit' => 10,
            'order' => array('Usereducationview.date' => 'DESC')
        );

        $educations = $this->Paginator->paginate('Usereducationview');

        $this->set(compact('title_for_layout', 'breadCrumb', 'educations'));
    }

    public function addUser()
    {
        if ($this->request->is(array('post'))) {
            $this->Education->EducationsUser->create();
            $this->request->data['EducationsUser']['user_id'] = $this->Auth->user('id');
            if (!isset($this->request->data['EducationsUser']['date']) || empty($this->request->data['EducationsUser']['date'])) {
                $this->request->data['EducationsUser']['date'] = date('Y-m-d');
            }

            if ($this->Education->EducationsUser->save($this->request->data)) {
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
                'title' => 'Pendidikan',
                'controller' => 'educations',
                'action' => 'indexUser'
            ),
            2 => array(
                'title' => 'Tambah',
                'controller' => 'educations',
                'action' => 'addUser'
            )
        );

        $title_for_layout = 'Pendidikan';

        $education = $this->Education->find('list', array(
            'recursive' => -1,
            'conditions' => array(
                'Education.active' => true
            )
        ));

        $this->set(compact('title_for_layout', 'breadCrumb', 'education'));
    }

    public function editUser($id = null)
    {
        if ($this->request->is(array('post', 'put'))) {
            if (!isset($this->request->data['EducationsUser']['date']) || empty($this->request->data['EducationsUser']['date'])) {
                $this->request->data['EducationsUser']['date'] = date('Y-m-d');
            }

            if ($this->Education->EducationsUser->save($this->request->data)) {
                return $this->redirect(array('action' => 'indexUser'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                $id = $this->request->data['EducationsUser']['id'];
            }
        }
        $user = $this->Education->EducationsUser->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'EducationsUser.user_id' => $this->Auth->user('id'),
                'EducationsUser.id' => $id,
                'EducationsUser.active' => 1
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
                    'title' => 'Pendidikan',
                    'controller' => 'educations',
                    'action' => 'indexUser'
                ),
                2 => array(
                    'title' => 'Ubah',
                    'controller' => 'educations',
                    'action' => 'addUser'
                )
            );

            $title_for_layout = 'Pendidikan';

            $education = $this->Education->find('list', array(
                'recursive' => -1,
                'conditions' => array(
                    'Education.active' => true
                )
            ));

            $this->set(compact('title_for_layout', 'breadCrumb', 'user', 'education'));
        } else {
            return $this->redirect(array(
                'controller' => 'educations',
                'action' => 'indexUser'
            ));
        }

    }
}
