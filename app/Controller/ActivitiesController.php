<?php
App::uses('AppController', 'Controller');
//App::uses('File', 'Utility');
/**
 * Activities Controller
 *
 * @property Activity $Activity
 * @property PaginatorComponent $Paginator
 */
class ActivitiesController extends AppController
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
            'title' => 'Kegiatan',
            'controller' => 'activities',
            'action' => '/'
        )
    );

    /**
     * index method
     *
     * @return void
     */
    public function index()
    {
        $breadCrumb = $this->breadCrumb;

        $this->uses = array('Activityuserview');
        $title_for_layout = 'Kegiatan';

        $this->Paginator->settings = array(
            'recursive' => -1,
            'conditions' => array(
                'Activityuserview.activityactive' => true,
                'Activityuserview.user_id' => $this->Auth->user('id'),
                'Activityuserview.tagged' => true,
                'Activityuserview.activitydraft' => false
            ),
            'limit' => 10,
            'order' => array('Activityuserview.activitystart' => 'DESC')
        );

        $letters = $this->Paginator->paginate('Activityuserview');
        /*$this->Paginator->settings = array(
            'recursive' => 0,
            'conditions' => array(
                'ActivitiesUser.active' => true
            )
        );*/
        $this->set(compact('title_for_layout', 'breadCrumb', 'letters'));
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
        $breadCrumb = $this->breadCrumb;
        $breadCrumb[1] = array(
            'title' => 'Lihat',
            'controller' => 'activities',
            'action' => 'view'
        );

        if (!$this->Activity->exists($id)) {
            throw new NotFoundException(__('Invalid activity'));
        }

        $files = $this->Activity->Evidence->find('all', array(
            'recursive' => 0,
            'conditions' => array(
                'Evidence.activity_id' => $id,
                'Evidence.active' => 1
            )
        ));

        $this->Activity->unbindModel(array(
            'hasMany' => array('ActivitiesUser', 'Transaction'),
            'belongsTo' => array('Categorytree')
        ));

        $activity = $this->Activity->find('first', array(
            'recursive' => 1,
            'conditions' => array(
                'Activity.id' => $id
            )
        ));

        $title_for_layout = $activity['Activity']['name'];

        $users = array();
        if (count($activity['User']) > 0) $users = $this->sortName($activity['User']);

        $this->set(compact('title_for_layout', 'files', 'activity', 'users', 'breadCrumb'));
    }

    private function sortName($source)
    {
        $names = array();
        foreach ($source as $user) {
            $names[] = $user['name'];
        }

        sort($names);

        return $names;
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        $breadCrumb = $this->breadCrumb;
        $breadCrumb[1] = array(
            'title' => 'Tambah',
            'controller' => 'activities',
            'action' => 'add'
        );

        //$this->layout = 'with-menu';
        $title_for_layout = 'Tambah Penugasan';

        $departements = $this->Activity->User->Departement->find('all', array(
            'recursive' => -1,
            'conditions' => array(
                'NOT' => array(
                    'Departement.id' => $this->departementSekretariat,
                    'Departement.parent_id' => null,
                    'Departement.active' => 0
                )
            ),
            'fields' => array('Departement.id', 'Departement.name')
        ));

        $this->set(compact('title_for_layout', 'departements', 'breadCrumb'));
    }

    public function added()
    {
        if ($this->request->is('post')) {
            $errors = array();
            $employees = array();
            $data = array();

            if (!isset($this->request->data['file'])) {
                $errors[] = ' Berkas belum diunggah!';
            } else {
                $filename = $this->request->data['file'];
            }

            if (!isset($this->request->data['name'])) {
                $errors[] = 'Nomor kosong! ';
            } else {
                $name = $this->request->data['name'];
            }

            if (!isset($this->request->data['description'])) {
                $errors[] = ' Perihal kosong!';
            } else {
                $description = $this->request->data['description'];
            }

            if (!isset($this->request->data['start']) || empty($this->request->data['start'])) {
                $start = date('Y-m-d');
            } else {
                $start = $this->request->data['start'];
            }

            if (!isset($this->request->data['end']) || empty($this->request->data['end'])) {
                $end = date('Y-m-d');
            } else {
                $end = $this->request->data['end'];
            }

            if (!isset($this->request->data['employees'])) {
                $errors[] = ' Pegawai kosong!';
            } else {
                $employees = explode(',', $this->request->data['employees']);
            }

            if (empty($employees)) {
                $errors[] = ' Pegawai kosong!';
            }

            $activitiesData = array(
                'name' => $name,
                'description' => $description,
                'draft' => false,
                'start' => $start,
                'end' => $end,
                'uploader_id' => $this->Auth->user('id')
            );

            //add to activities table
            $this->Activity->create();
            if (!$this->Activity->save($activitiesData)) {
                $errors[] = ' Gagal menyimpan Penugasan, silahkan ulangi proses!';
            }

            //add to activitiesuser table
            $activityId = $this->Activity->getInsertID();
            $usersData = array();
            foreach ($employees as $employee) {
                $usersData[] = array(
                    'activity_id' => $activityId,
                    'user_id' => $employee
                );
            }

            $this->Activity->ActivitiesUser->create();
            if (!$this->Activity->ActivitiesUser->saveMany($usersData)) {
                $errors[] = ' Gagal menyimpan Pegawai dalam Penugasan, silahkan ulangi proses!';
            }

            //add to evidences table
            if (!$this->linkToFile($filename, $activityId)) {
                $errors[] = ' Gagal menyimpan Berkas, silahkan ulangi proses!';
            }

            //output to user
            if (!empty($errors)) {
                $errors = array_unique($errors);
                $data['success'] = false;
                $data['errors'] = $errors;
            } else {
                $data['success'] = true;
                $data['message'] = 'Berhasil menyimpan';
            }

            $this->set(compact('data'));
            $this->set('_serialize', 'data');
        }
    }

    private function linkToFile($filename = null, $activityId = null)
    {
        App::uses('File', 'Utility');
        $ret = false;
        $filePath = WWW_ROOT . 'files' . DS . $filename;
        $file = new File($filePath, false, 777);

        if ($file->exists()) {
            //get file extension
            $ext = $file->ext();
            $ext = (string)$ext;
            $ext = strtolower($ext);
            //$file->close();

            //save to db
            $dataToSave = array();
            $dataToSave['Evidence']['name'] = 'Berkas';
            $dataToSave['Evidence']['uploader_id'] = $this->Auth->user('id');
            $dataToSave['Evidence']['activity_id'] = $activityId;
            $dataToSave['Evidence']['extension'] = $ext;

            $this->Activity->Evidence->create();

            if ($this->Activity->Evidence->save($dataToSave)) {
                //rename uploaded file with evidences table id
                $filePathNew = WWW_ROOT . 'files' . DS . $this->Activity->Evidence->getInsertID() . '.' . $ext;
                rename($filePath, $filePathNew);
                //create zip file
                if($this->Activity->Evidence->createZip($activityId)) $ret = true;
            }
        }

        $file->close();

        return $ret;
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
        if (!$this->Activity->exists($id)) {
            throw new NotFoundException(__('Invalid activity'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Activity->save($this->request->data)) {
                $this->Session->setFlash(__('The activity has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The activity could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Activity.' . $this->Activity->primaryKey => $id));
            $this->request->data = $this->Activity->find('first', $options);
        }
        $categorytrees = $this->Activity->Categorytree->find('list');
        $users = $this->Activity->User->find('list');
        $this->set(compact('categorytrees', 'users'));
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
        $this->Activity->id = $id;
        if (!$this->Activity->exists()) {
            throw new NotFoundException(__('Invalid activity'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Activity->delete()) {
            $this->Session->setFlash(__('The activity has been deleted.'));
        } else {
            $this->Session->setFlash(__('The activity could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function addduty()
    {
        //$this->layout = 'with-menu';
    }
}