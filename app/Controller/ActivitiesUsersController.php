<?php
App::uses('AppController', 'Controller');

/**
 * ActivitiesUsers Controller
 *
 * @property ActivitiesUser $ActivitiesUser
 * @property PaginatorComponent $Paginator
 */
class ActivitiesUsersController extends AppController
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
        $this->ActivitiesUser->recursive = 0;
        $this->set('activitiesUsers', $this->Paginator->paginate());
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
        $title_for_layout = 'Penugasan Personal';

        $this->Paginator->settings = array(
            'conditions' => array(
                'ActivitiesUser.user_id' => $this->Auth->user('id'),
                'ActivitiesUser.active' => 1
            ),
            'limit' => 10,
            'order' => array(
                'Activity.start' => 'DESC'
            )
        );

        $activities = $this->Paginator->paginate('ActivitiesUser');

        $this->set(compact('title_for_layout', 'activities'));
    }

    public function viewPersonal($id = null)
    {
        $title_for_layout = 'Penugasan Personal';

        $this->Paginator->settings = array(
            'conditions' => array(
                'Activity.active' => 1
            ),
            'limit' => 10,
            'order' => array(
                'Activity.start' => 'DESC'
            )
        );

        $activities = $this->Paginator->paginate('Activity');

        $this->set(compact('title_for_layout', 'activities'));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->ActivitiesUser->create();
            if ($this->ActivitiesUser->save($this->request->data)) {
                $this->Session->setFlash(__('The activities user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The activities user could not be saved. Please, try again.'));
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
        if (!$this->ActivitiesUser->exists($id)) {
            throw new NotFoundException(__('Invalid activities user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->ActivitiesUser->save($this->request->data)) {
                $this->Session->setFlash(__('The activities user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The activities user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('ActivitiesUser.' . $this->ActivitiesUser->primaryKey => $id));
            $this->request->data = $this->ActivitiesUser->find('first', $options);
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
        $this->ActivitiesUser->id = $id;
        if (!$this->ActivitiesUser->exists()) {
            throw new NotFoundException(__('Invalid activities user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->ActivitiesUser->delete()) {
            $this->Session->setFlash(__('The activities user has been deleted.'));
        } else {
            $this->Session->setFlash(__('The activities user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function calendar($start = null, $end = null)
    {
        $start = $this->request->query['start'];
        $end = $this->request->query['end'];

        $events = $this->ActivitiesUser->Activity->Calendarview->find('all', array(
            'recursive' => -1,
            'conditions' => array(
                'Calendarview.start >=' => $start,
                'Calendarview.end <=' => $end,
                'Calendarview.user_id' => $this->Auth->user('id'),
                'Calendarview.active' => 1,
                'Calendarview.activityactive' => 1
            )
        ));

        $data = array();
        if (count($events) > 0) {
            foreach ($events as $event) {
                $data[] = array(
                    'title' => $event['Calendarview']['activitydescription'],
                    'id' => $event['Calendarview']['activity_id'],
                    'start' => $event['Calendarview']['start'],
                    'end' => $event['Calendarview']['end']
                );
            }
        }

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }
}
/**
 *
 * CREATE VIEW calendarviews
 * AS
 * SELECT  a.id AS id, a.activity_id AS activity_id, a.user_id AS user_id, a.tagged AS tagged, a.active AS active, b.name AS activityname, b.description AS activitydescription, b.start AS start, b.end AS end, b.uploader AS uploader, b.active AS activityactive, u.name AS username, u.fullname AS userfullname, u.active AS useractive
 * FROM activities_users a
 * LEFT JOIN activities b
 * ON a.activity_id = b.id
 * LEFT JOIN users u
 * ON a.user_id = u.id
 */