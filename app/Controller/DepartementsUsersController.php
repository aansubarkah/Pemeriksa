<?php
App::uses('AppController', 'Controller');

/**
 * DepartementsUsers Controller
 *
 * @property DepartementsUser $DepartementsUser
 * @property PaginatorComponent $Paginator
 */
class DepartementsUsersController extends AppController
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
        $this->DepartementsUser->recursive = 0;
        $this->set('departementsUsers', $this->Paginator->paginate());
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
        if (!$this->DepartementsUser->exists($id)) {
            throw new NotFoundException(__('Invalid departements user'));
        }
        $options = array('conditions' => array('DepartementsUser.' . $this->DepartementsUser->primaryKey => $id));
        $this->set('departementsUser', $this->DepartementsUser->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->DepartementsUser->create();
            if ($this->DepartementsUser->save($this->request->data)) {
                $this->Session->setFlash(__('The departements user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The departements user could not be saved. Please, try again.'));
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
        if (!$this->DepartementsUser->exists($id)) {
            throw new NotFoundException(__('Invalid departements user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->DepartementsUser->save($this->request->data)) {
                $this->Session->setFlash(__('The departements user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The departements user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('DepartementsUser.' . $this->DepartementsUser->primaryKey => $id));
            $this->request->data = $this->DepartementsUser->find('first', $options);
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
        $this->DepartementsUser->id = $id;
        if (!$this->DepartementsUser->exists()) {
            throw new NotFoundException(__('Invalid departements user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->DepartementsUser->delete()) {
            $this->Session->setFlash(__('The departements user has been deleted.'));
        } else {
            $this->Session->setFlash(__('The departements user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function lists()
    {
        if (!empty($this->request->query['q'])) {
            $q = trim(strtolower($this->request->query['q']));
            if ($q == 'all') {
                $conditions = array(
                    'NOT' => array(
                        'Userdepartementview.active' => false,
                        'Userdepartementview.useractive' => false,
                        'Userdepartementview.departement_id' => array($this->departementPerwakilan, $this->departementSekretariat)
                    ),
                    'Userdepartementview.end' => null
                );
            } else {
                $conditions = array(
                    'Userdepartementview.active' => true,
                    'Userdepartementview.useractive' => true,
                    'Userdepartementview.departement_id' => $q,
                    'Userdepartementview.end' => null
                );
            }

            $tags = $this->DepartementsUser->User->Userdepartementview->find('all', array(
                'recursive' => -1,
                'conditions' => $conditions,
                'fields' => array(
                    'Userdepartementview.user_id',
                    'Userdepartementview.username'
                )
            ));

            $data = array();
            $i = 0;
            foreach ($tags as $tag) {
                $data[$i]['value'] = $tag['Userdepartementview']['user_id'];
                $data[$i]['text'] = $tag['Userdepartementview']['username'];
                $i++;
            }

            usort($data, $this->buildSorter('text'));

            $this->set(compact('data'));
            $this->set('_serialize', 'data');
        }
    }

    private function buildSorter($key)
    {
        return function ($a, $b) use ($key) {
            return strnatcmp($a[$key], $b[$key]);
        };
    }
}
