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

    /**
     * Breadcrumb for all
     *
     * @var array
     */
    private $breadCrumb = array(
        0 => array(
            'title' => 'Dokumen',
            'controller' => 'evidences',
            'action' => '/'
        )
    );

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
            //$this->Evidence->create();
            /*if ($this->Evidence->save($this->request->data)) {
                $this->Session->setFlash(__('The evidence has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The evidence could not be saved. Please, try again.'));
            }*/
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

        $breadCrumb = $this->breadCrumb;
        $breadCrumb[1] = array(
            'title' => 'Tambah',
            'controller' => 'evidences',
            'action' => 'add'
        );
        $breadCrumb[2] = array(
            'title' => $activity['Activity']['name'],
            'controller' => 'activities',
            'action' => 'view'
        );

        $title_for_layout = 'Tambah Dokumen';
        //$types = $this->Evidence->Type->find('list');
        //$uploaders = $this->Evidence->Uploader->find('list');
        $this->set(compact('activity', 'title_for_layout', 'breadCrumb'));

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
        App::import('Vendor', 'UploadHandler', array('file' => 'file.upload' . DS . 'UploadHandler.php'));
        $options = array(
            'upload_dir' => WWW_ROOT . 'files' . DS,
            'accept_file_types' => '/\.(gif|jpe?g|png|txt|pdf|doc|docx|xls|xlsx|ppt|pptx|rar|zip|odt|tar|gz)$/i'
        );

        $upload_handler = new UploadHandler($options);

        exit;
    }

    public function download($type = null, $id = null)
    {
        if ($type == 'file') {
            $file = $this->Evidence->find('first', array(
                'recursive' => 0,
                'conditions' => array(
                    'Evidence.id' => $id,
                    'Evidence.active' => 1
                )
            ));
        } elseif ($type == 'zip') {
            $file = $this->Evidence->Activity->find('first', array(
                'recursive' => -1,
                'conditions' => array(
                    'Activity.id' => $id,
                    'Activity.active' => 1
                )
            ));
        }

        if (!empty($file)) {
            if ($type == 'file') {
                $filePath = WWW_ROOT . 'files' . DS . $id . '.' . $file['Evidence']['extension'];
                if (!empty($file['Evidence']['name'])) {
                    $nameToUser = str_replace('/', '-', $file['Evidence']['name']);
                } else {
                    $nameToUser = $file['Type']['name'];
                }
                $nameToUser = $nameToUser . '.' . $file['Evidence']['extension'];
            } elseif ($type == 'zip') {
                $filePath = WWW_ROOT . 'files' . DS . 'activity' . DS . $id . '.zip';
                $nameToUser = str_replace('/', '-', $file['Activity']['name'] . '.zip');
            }

            $this->response->file($filePath, array(
                'download' => true,
                'name' => $nameToUser
            ));
            return $this->response;
        } else {
            return $this->flash(
                'Berkas tidak tersedia.',
                Router::url('/', true),
                3
            );
        }
    }

    /*private function createZip($activityId = null)
    {
        $files = $this->Evidence->find('all', array(
            'recursive' => -1,
            'conditions' => array(
                'Evidence.activity_id' => $activityId,
                'Evidence.active' => 1
            )
        ));
        if (empty($files)) return false;

        App::uses('Folder', 'Utility');
        App::uses('File', 'Utility');

        $zipFolder = WWW_ROOT . 'files' . DS . 'activity';
        $zipPath = $zipFolder . DS . $activityId . '.zip';
        $zipFile = new File($zipPath, false, 0777);

        //first delete zip file if exists
        if ($zipFile->exists()) {
            $zipFile->delete();
        }

        //2nd create zip
        $zip = new ZipArchive();
        if ($zip->open($zipPath, ZipArchive::CREATE) !== true) return false;

        //3rd add file to zip
        foreach ($files as $file) {
            $filePath = WWW_ROOT . 'files' . DS . $file['Evidence']['id'] . '.' . $file['Evidence']['extension'];
            $fileLocalName = str_replace('/', '-', $file['Evidence']['name']) . '.' . $file['Evidence']['extension'];
            $zip->addFile($filePath, $fileLocalName);
        }
        $zip->close();
        //return true if all ok
        return true;
    }*/

    public function downloadAll($activityId = null)
    {
        //if ($this->createZip($activityId)) {
        if ($this->Evidence->createZip($activityId)) {
            //$zipPath = $this->filePath . DS . $this->fileActivityPath . DS . $activityId . '.zip';
            $zipPath = WWW_ROOT . 'files' . DS . 'activity' . DS . $activityId . '.zip';
            $this->response->file($zipPath);
            return $this->response;
        }
    }
}
