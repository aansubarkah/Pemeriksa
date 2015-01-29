<?php
App::uses('AppController', 'Controller');

/**
 * Evidences Controller
 *
 * @property Evidence $Evidence
 * @property PaginatorComponent $Paginator
 */
class EvidencesController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('download');
    }

    /**
     * index method
     *
     * @return void
     */
    public function index()
    {
        $this->Evidence->recursive = 0;
        $this->set('evidences', $this->Paginator->paginate());
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
        if (!$this->Evidence->exists($id)) {
            throw new NotFoundException(__('Invalid evidence'));
        }
        $options = array('conditions' => array('Evidence.' . $this->Evidence->primaryKey => $id));
        $this->set('evidence', $this->Evidence->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($activityId = null)
    {
        if (is_null($activityId)) return $this->redirect('/');

        $activityUser = $this->Evidence->Activity->ActivitiesUser->find('count', array(
            'conditions' => array(
                'ActivitiesUser.activity_id' => $activityId,
                'ActivitiesUser.user_id' => $this->Auth->user('id'),
                'ActivitiesUser.active' => 1
            )
        ));

        if ($activityUser == 0) return $this->redirect('/');


        if ($this->request->is('post')) {
            $this->Evidence->create();
            if ($this->Evidence->save($this->request->data)) {
                $this->Session->setFlash(__('The evidence has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The evidence could not be saved. Please, try again.'));
            }
        }
        $activity = $this->Evidence->Activity->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'Activity.id' => $activityId,
                'Activity.active' => 1
            ),
            'fields' => array(
                'Activity.description',
                'Activity.name',
                'Activity.id'
            )
        ));

        $title_for_layout = 'Tambah Dokumen';
        //$types = $this->Evidence->Type->find('list');
        //$uploaders = $this->Evidence->Uploader->find('list');
        $this->set(compact('activity', 'title_for_layout'));

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
        if (!$this->Evidence->exists($id)) {
            throw new NotFoundException(__('Invalid evidence'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Evidence->save($this->request->data)) {
                $this->Session->setFlash(__('The evidence has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The evidence could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Evidence.' . $this->Evidence->primaryKey => $id));
            $this->request->data = $this->Evidence->find('first', $options);
        }
        $types = $this->Evidence->Type->find('list');
        $uploaders = $this->Evidence->Uploader->find('list');
        $this->set(compact('types', 'uploaders'));
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
        $this->Evidence->id = $id;
        if (!$this->Evidence->exists()) {
            throw new NotFoundException(__('Invalid evidence'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Evidence->delete()) {
            $this->Session->setFlash(__('The evidence has been deleted.'));
        } else {
            $this->Session->setFlash(__('The evidence could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function upload()
    {
        App::import('Vendor', 'UploadHandler', array('file' => 'file.upload/UploadHandler.php'));
        $options = array(
            'upload_dir' => 'files/',
            'accept_file_types' => '/\.(gif|jpe?g|png|txt|pdf|doc|docx|xls|xlsx|ppt|pptx|rar|zip|odt|tar|gz)$/i'
        );

        $upload_handler = new UploadHandler($options);

        exit;
    }

    public function download($id = null)
    {
        $file = $this->Evidence->find('first', array(
            'recursive' => 0,
            'conditions' => array(
                'Evidence.id' => $id,
                'Evidence.active' => 1
            )
        ));

        if (!empty($file)) {
            $this->viewClass = 'Media';
            $docNameOnServer = $file['Evidence']['id'] . '.' . $file['Evidence']['extension'];
            if (!empty($file['Evidence']['name'])) {
                $docNameForUser = $file['Evidence']['name'];
            } else {
                $docNameForUser = $file['Type']['name'];
            }

            $params = array(
                'id' => $docNameOnServer,
                'name' => $docNameForUser,
                'extension' => $file['Evidence']['extension'],
                'download' => true,
                'path' => 'files' . DS
            );

            $this->set($params);
        } else {
            return $this->flash(
                'Berkas tidak tersedia.',
                Router::url('/', true),
                3
            );
        }
    }
}
