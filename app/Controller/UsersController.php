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
     * index method
     *
     * @return void
     */
    public function index()
    {
        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
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
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
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
}
/**
 * ALTER ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `calendarviews` AS select `a`.`id` AS `id`,`a`.`activity_id` AS `activity_id`,`a`.`user_id` AS `user_id`,`a`.`tagged` AS `tagged`,`a`.`active` AS `active`,`b`.`name` AS `activityname`,`b`.`description` AS `activitydescription`,`b`.`start` AS `start`,`b`.`end` AS `end`,`b`.`uploader_id` AS `uploader_id`,`b`.`active` AS `activityactive`,`u`.`name` AS `username`,`u`.`fullname` AS `userfullname`,`u`.`active` AS `useractive` from ((`activities_users` `a` left join `activities` `b` on((`a`.`activity_id` = `b`.`id`))) left join `users` `u` on((`a`.`user_id` = `u`.`id`)))
 */