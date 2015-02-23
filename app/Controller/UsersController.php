<?php
App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * Breadcrumb for all
     *
     * @var array
     */
    private $breadCrumb = array(
        0 => array(
            'title' => 'Profil',
            'controller' => 'users',
            'action' => '/'
        )
    );

    //public $layout = 'profile';
    /**
     * index method
     *
     * @return void
     */
    public function index()
    {
        $this->layout = 'profile';
        $breadCrumb = $this->breadCrumb;
        $breadCrumb[1] = array(
            'title' => 'Ringkasan',
            'controller' => 'users',
            'action' => '/'
        );

        $title_for_layout = 'Ringkasan';
        $user = $this->User->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'User.id' => $this->Auth->user('id')
            )
        ));
        $departement = $this->User->DepartementsUser->find('first', array(
            'recursive' => 0,
            'conditions' => array(
                'DepartementsUser.user_id' => $this->Auth->user('id'),
                'DepartementsUser.end' => null,
                'DepartementsUser.active' => true
            ),
            'order' => array(
                'DepartementsUser.start' => 'DESC'
            )
        ));
        $education = $this->User->EducationsUser->find('first', array(
            'recursive' => 0,
            'conditions' => array(
                'EducationsUser.user_id' => $this->Auth->user('id'),
                'EducationsUser.active' => true
            ),
            'order' => array(
                'EducationsUser.date' => 'DESC'
            )
        ));
        $level = $this->User->Userlevelview->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'Userlevelview.user_id' => $this->Auth->user('id'),
                'Userlevelview.end' => null,
                'Userlevelview.active' => true
            ),
            'order' => array(
                'Userlevelview.start' => 'DESC'
            )
        ));
        $role = $this->User->RolesUser->find('first', array(
            'recursive' => 0,
            'conditions' => array(
                'RolesUser.user_id' => $this->Auth->user('id'),
                'RolesUser.end' => null,
                'RolesUser.active' => true
            ),
            'order' => array(
                'RolesUser.start' => 'DESC'
            )
        ));

        $this->set(compact('title_for_layout', 'breadCrumb', 'user', 'departement', 'education', 'level', 'role'));
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
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
        $groups = $this->User->Group->find('list');
        $activities = $this->User->Activity->find('list');
        $departements = $this->User->Departement->find('list');
        $educations = $this->User->Education->find('list');
        $levels = $this->User->Level->find('list');
        $roles = $this->User->Role->find('list');
        $periods = $this->User->Period->find('list');
        $positionlevels = $this->User->Positionlevel->find('list');
        $positions = $this->User->Position->find('list');
        $this->set(compact('groups', 'activities', 'departements', 'educations', 'levels', 'roles', 'periods', 'positionlevels', 'positions'));
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
        if ($id == $this->Auth->user('id')) {
            $breadCrumb = $this->breadCrumb;
            $breadCrumb[1] = array(
                'title' => 'Ubah',
                'controller' => 'users',
                'action' => 'edit'
            );

            $title_for_layout = 'Ubah Ringkasan Profil';
            $user = $this->User->find('first', array(
                'recursive' => -1,
                'conditions' => array(
                    'User.id' => $this->Auth->user('id')
                )
            ));
            if (!$this->User->exists($id)) {
                throw new NotFoundException(__('Invalid user'));
            }
            if ($this->request->is(array('post', 'put'))) {
                if ($this->User->save($this->request->data)) {
                    //$this->Session->setFlash(__('The user has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
            }
            $this->set(compact('title_for_layout', 'breadCrumb', 'user'));
        } else {
            $this->redirect(
                array(
                    'controller' => 'users',
                    'action' => 'index'
                )
            );
        }
    }

    public function isNumberBelongsToUser()
    {
        $data = false;
        if (isset($this->request->data['number'])) {
            $number = trim($this->request->data['number']);
            $user = $this->User->find('first', array(
                'recursive' => -1,
                'conditions' => array(
                    'User.active' => 1,
                    'User.number' => $number
                )
            ));
            if (!empty($user)) {
                if ($user['User']['id'] == $this->Auth->user('id')) $data = true;
            } else {
                $data = true;
            }
        }

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function isCardnumberBelongsToUser()
    {
        $data = false;
        if (isset($this->request->data['cardnumber'])) {
            $cardNumber = trim($this->request->data['cardnumber']);
            $user = $this->User->find('first', array(
                'recursive' => -1,
                'conditions' => array(
                    'User.active' => 1,
                    'User.cardnumber' => $cardNumber
                )
            ));
            if (!empty($user)) {
                if ($user['User']['id'] == $this->Auth->user('id')) $data = true;
            } else {
                $data = true;
            }
        }

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function isPasswordCorrect()
    {
        $data = false;
        if (isset($this->request->data['oldPassword'])) {
            $data = $this->User->comparePassword($this->Auth->user('id'), $this->request->data['oldPassword']);

        }

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function editPassword()
    {
        $id = $this->Auth->user('id');
        $breadCrumb = $this->breadCrumb;
        $breadCrumb[1] = array(
            'title' => 'Ubah Password',
            'controller' => 'users',
            'action' => 'editPassword'
        );

        $title_for_layout = 'Ubah Password';

        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->comparePassword($this->Auth->user('id'), $this->request->data['User']['oldPassword'])) {
                if ($this->User->save($this->request->data)) {
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
            } else {
                $this->Session->setFlash(__('Password lama tidak sesuai'));
            }
        }
        $this->set(compact('title_for_layout', 'breadCrumb'));
    }

    public function isUsernameBelongsToUser()
    {
        $data = false;
        if (isset($this->request->data['username'])) {
            $username = trim($this->request->data['username']);
            $user = $this->User->find('first', array(
                'recursive' => -1,
                'conditions' => array(
                    'User.active' => 1,
                    'User.username' => $username
                )
            ));
            if (!empty($user)) {
                if ($user['User']['id'] == $this->Auth->user('id')) $data = true;
            } else {
                $data = true;
            }
        }

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function editUsername()
    {
        $id = $this->Auth->user('id');
        $breadCrumb = $this->breadCrumb;
        $breadCrumb[1] = array(
            'title' => 'Ubah Username',
            'controller' => 'users',
            'action' => 'editUsername'
        );

        $title_for_layout = 'Ubah Username';

        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['User']['username'] = trim($this->request->data['User']['username']);
            if ($this->User->save($this->request->data)) {
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
        $user = $this->User->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'User.id' => $this->Auth->user('id'),
                'User.active' => true
            )
        ));
        $this->set(compact('title_for_layout', 'breadCrumb', 'user'));
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
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('The user has been deleted.'));
        } else {
            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function isAuthorized($user)
    {
        if (parent::isAuthorized($user)) {
            return true;
        }

        if ($this->action === 'profile') {
            return true;
        }

        if ($this->action === 'changePassword') {
            return true;
        }

        $this->redirect(array('controller' => 'pages', 'action' => 'noAccess'));
        return false;
    }

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('logout');
        $this->layout = 'profile';
    }


    public function login()
    {
        $this->layout = 'blank';
        $title_for_layout = 'Login';
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect('/');
            }
            $this->Session->setFlash(__('username atau password keliru, silahkan coba lagi'));
        }
        $this->set(compact('title_for_layout'));
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function lists()
    {
        if (!empty($this->request->query['q'])) {
            $q = trim(strtolower($this->request->query['q']));
            $q = '%' . $q . '%';
            $tags = $this->User->find('all', array(
                'recursive' => -1,
                'conditions' => array(
                    'User.active' => 1,
                    'User.name LIKE' => $q
                ),
                'fields' => array('User.id', 'User.name'),
                'limit' => 3,
                'order' => array('User.name' => 'ASC')
            ));

            $data = array();
            $i = 0;
            foreach ($tags as $tag) {
                //$data[$i] = $tag['User']['name'];

                $data[$i]['value'] = $tag['User']['id'];
                $data[$i]['text'] = $tag['User']['name'];
                $i++;
            }
        }


        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function calendar()
    {
        $this->layout = 'with-menu';

        $breadCrumb = array(
            0 => array(
                'title' => 'Kegiatan',
                'controller' => 'activities',
                'action' => 'index'
            ),
            1 => array(
                'title' => 'Kalender',
                'controller' => 'users',
                'action' => 'calendar'
            )
        );

        $title_for_layout = 'Kalender Kegiatan';

        $this->set(compact('title_for_layout', 'breadCrumb'));
        $this->set(array('title_for_layout', 'breadCrumb'));
    }

    public function timeline()
    {
        $breadCrumb = $this->breadCrumb;
        $breadCrumb[1] = array(
            'title' => 'Kronologi',
            'controller' => 'users',
            'action' => 'timeline'
        );

        $data = array();
        $user = $this->User->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'User.id' => $this->Auth->user('id')
            )
        ));
        $data[] = array(
            'date' => $user['User']['birthdate'],
            'icon' => 'user',
            'name' => 'Lahir',
            'description' => 'Lahir'
        );

        $dateAsEmployeeYear = substr($user['User']['number'], 8, 4);
        $dateAsEmployeeMonth = substr($user['User']['number'], 12, 2);
        $data[] = array(
            'date' => $dateAsEmployeeYear . '-' . $dateAsEmployeeMonth . '-1',
            'icon' => 'phone-alt',
            'name' => 'Karir',
            'description' => 'PNS'
        );

        //education
        $education = $this->User->EducationsUser->find('all', array(
            'recursive' => 0,
            'conditions' => array(
                'EducationsUser.user_id' => $this->Auth->user('id'),
                'EducationsUser.active' => 1
            ),
            'order' => array(
                'EducationsUser.date' => 'ASC'
            )
        ));
        if (count($education) > 0) {
            foreach ($education as $ed) {
                $data[] = array(
                    'date' => $ed['EducationsUser']['date'],
                    'icon' => 'send',
                    'name' => 'Pendidikan',
                    'description' => $ed['Education']['description']
                );
            }
        }
        //level
        $level = $this->User->Userlevelview->find('all', array(
            'recursive' => -1,
            'conditions' => array(
                'Userlevelview.user_id' => $this->Auth->user('id'),
                'Userlevelview.active' => 1
            ),
            'order' => array(
                'Userlevelview.start' => 'ASC'
            )
        ));
        if (count($level) > 0) {
            foreach ($level as $le) {
                $data[] = array(
                    'date' => $le['Userlevelview']['start'],
                    'icon' => 'tower',
                    'name' => 'Pangkat',
                    'description' => $le['Userlevelview']['leveldescription']
                );
            }
        }
        //departement
        $departement = $this->User->Userdepartementview->find('all', array(
            'recursive' => -1,
            'conditions' => array(
                'Userdepartementview.user_id' => $this->Auth->user('id'),
                'Userdepartementview.active' => 1
            ),
            'order' => array(
                'Userdepartementview.start' => 'ASC'
            )
        ));
        if (count($departement) > 0) {
            foreach ($departement as $de) {
                $data[] = array(
                    'date' => $de['Userdepartementview']['start'],
                    'icon' => 'envelope',
                    'name' => 'Unit Kerja',
                    'description' => $de['Userdepartementview']['departementdescription']
                );
            }
        }

        //role
        $roles = $this->User->Userroleview->find('all', array(
            'recursive' => -1,
            'conditions' => array(
                'Userroleview.user_id' => $this->Auth->user('id'),
                'Userroleview.active' => 1
            ),
            'order' => array(
                'Userroleview.start' => 'ASC'
            )
        ));
        if (count($roles) > 0) {
            foreach ($roles as $role) {
                $data[] = array(
                    'date' => $role['Userroleview']['start'],
                    'icon' => 'briefcase',
                    'name' => 'Peran',
                    'description' => $role['Userroleview']['roledescription']
                );
            }
        }

        //sort data
        //alternative
        usort($data, function ($a, $b) {
            return $a['date'] - $b['date'];
        });
        /*foreach ($data as $row) {
            foreach ($row as $key => $value) {
                ${$key}[] = $value;
            }
        }
        array_multisort($date, SORT_ASC, $data);*/

        $title_for_layout = 'Kronologi';
        $this->set(compact('title_for_layout', 'breadCrumb', 'data'));
    }
}