<?php
App::uses('AppController', 'Controller');

/**
 * Letters Controller
 *
 * @property Letter $Letter
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class LettersController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

    //public $helpers = array('Minify.Minify');

    /**
     * Breadcrumb for all
     *
     * @var array
     */
    private $breadCrumb = array(
        0 => array(
            'title' => 'Surat Penugasan',
            'controller' => 'letters',
            'action' => '/'
        )
    );

    public function index()
    {
        $this->redirect('indexExpose');
    }

    public function indexExpose($draft = null)
    {
        /**
         * This controller use Activity model
         *
         * @var array
         * @var Activity $Activity
         */
        $this->uses = array('Letteruserview');

        $title_for_layout = 'SP2 Ekspose';
        $breadCrumb = $this->breadCrumb;
        $breadCrumb[1] = array(
            'title' => 'SP2 Ekspose',
            'controller' => 'letters',
            'action' => 'indexExpose'
        );

        $conditions = array(
            'Letteruserview.active' => true,
            'Letteruserview.activityactive' => true,
            'Letteruserview.lettercategory_id' => $this->letterCategorySP2Expose,
            'Letteruserview.user_id' => $this->Auth->user('id'),
            'Letteruserview.activityusertagged' => true
        );
        if ($draft == 'onlyDraft') {
            $conditions['Letteruserview.activitydraft'] = true;
        } elseif ($draft == 'noDraft') {
            $conditions['Letteruserview.activitydraft'] = false;
        }

        $this->Paginator->settings = array(
            'recursive' => -1,
            'conditions' => $conditions,
            'limit' => 10,
            'order' => array('Letteruserview.date' => 'DESC')
        );

        $letters = $this->Paginator->paginate('Letteruserview');

        $this->set(compact('title_for_layout', 'breadCrumb', 'letters'));
    }

    public function addExpose()
    {
        $title_for_layout = 'Tambah SP2 Ekspose';
        $breadCrumb = $this->breadCrumb;
        $breadCrumb[1] = array(
            'title' => 'SP2 Ekspose',
            'controller' => 'letters',
            'action' => 'indexExpose'
        );
        $breadCrumb[2] = array(
            'title' => 'Tambah',
            'controller' => 'letters',
            'action' => 'addExpose'
        );

        $data = array();
        if ($this->request->is(array('post', 'put'))) {
            empty($this->request->data['Letter']['start']) ? $start = date('Y-m-d') : $start = $this->request->data['Letter']['start'];
            empty($this->request->data['Letter']['end']) ? $end = date('Y-m-d') : $end = $this->request->data['Letter']['end'];
            empty($this->request->data['Letter']['date']) ? $date = $start : $date = $this->request->data['Letter']['date'];
            $description = $this->request->data['Letter']['description'];
            $personInCharge = explode(',', $this->request->data['Letter']['personInCharge']);
            $employees = explode(',', $this->request->data['Letter']['employees']);
            $dateArr = explode('-', $date);
            $name = $this->letterSP2FormatNo . $dateArr[1] . '/' . $dateArr[0];

            $employees = array_diff($employees, $personInCharge);
            $employees = array_values($employees);

            //1st save to activities table
            $dataToActivities = array(
                'name' => $name,
                'description' => $description,
                'start' => $start,
                'end' => $end,
                'uploader_id' => $this->Auth->user('id')
            );
            if (!$this->addExposeAddToActivities($dataToActivities)) {
                $this->Session->setFlash(__('Kegiatan tidak dapat disimpan, silahkan ulangi.'));
                return $this->redirect(array('action' => 'addExpose'));
            }
            $activityId = $this->Letter->Activity->getInsertID();

            //2nd save to activities_users table
            $dataToActivitiesUsers = array(
                'activity_id' => $activityId,
                'start' => $start,
                'end' => $end,
                'personInCharge' => $personInCharge,
                'employees' => $employees
            );
            if (!$this->addExposeAddToActivitiesUsers($dataToActivitiesUsers)) {
                $this->Session->setFlash(__('Peserta tidak dapat disimpan, silahkan ulangi.'));
                return $this->redirect(array('action' => 'addExpose'));
            }

            //3rd save to letters table
            $dataToLetters = array(
                'activity_id' => $activityId,
                'type_id' => $this->typeSP2,
                'lettercategory_id' => $this->letterCategorySP2Expose,
                'name' => $name,
                'date' => $date,
                'uploader_id' => $this->Auth->user('id')
            );
            if (!$this->addExposeAddToLetters($dataToLetters)) {
                $this->Session->setFlash(__('Draft tidak dapat disimpan, silahkan ulangi.'));
                return $this->redirect(array('action' => 'addExpose'));
            }

            //4th save to evidences table
            $dataToEvidences = array(
                'name' => 'Draft SP2',
                'extension' => 'pdf',
                'type_id' => $this->typeSP2,
                'uploader_id' => $this->Auth->user('id'),
                'activity_id' => $activityId
            );
            if (!$this->addExposeAddToEvidences($dataToEvidences)) {
                $this->Session->setFlash(__('Berkas Draft tidak dapat disimpan, silahkan ulangi.'));
                return $this->redirect(array('action' => 'addExpose'));
            }

            //5th create file
            $fileName = $this->Letter->Activity->Evidence->getInsertID();
            $this->addExposeCreatePdf($date, $description, $personInCharge, $employees, $fileName);

            //6th give a download link for pdf file generated by no 4
            if ($this->Letter->Activity->Evidence->createZip($activityId)) return $this->redirect(array('action' => 'addExposeSuccess', $this->Letter->Activity->Evidence->getInsertID()));
            //return $this->redirect(array('action' => 'addExposeSuccess', $this->Letter->Activity->Evidence->getInsertID()));
        }

        $departements = $this->Letter->Departement->find('all', array(
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

        $this->set(compact('title_for_layout', 'breadCrumb', 'departements', 'data'));
    }

    private function addExposeAddToActivities($data)
    {
        if (!empty($data)) {
            $this->Letter->Activity->create();

            if ($this->Letter->Activity->save($data)) {
                return true;
            }
        }
        return false;
    }

    private function addExposeAddToActivitiesUsers($data)
    {
        if (!empty($data)) {
            $countPersonInCharge = count($data['personInCharge']);
            $countEmployees = count($data['employees']);

            $persons = array();
            $i = 0;

            for ($j = 0; $j < $countPersonInCharge; $j++) {
                $persons[$i]['activity_id'] = $data['activity_id'];
                $persons[$i]['start'] = $data['start'];
                $persons[$i]['end'] = $data['end'];
                $persons[$i]['duty_id'] = $this->dutyPemapar;
                $persons[$i]['user_id'] = $data['personInCharge'][$j];
                $i++;
            }
            for ($j = 0; $j < $countEmployees; $j++) {
                $persons[$i]['activity_id'] = $data['activity_id'];
                $persons[$i]['start'] = $data['start'];
                $persons[$i]['end'] = $data['end'];
                $persons[$i]['duty_id'] = $this->dutyPeserta;
                $persons[$i]['user_id'] = $data['employees'][$j];
                $i++;
            }

            $this->Letter->Activity->ActivitiesUser->create();

            if ($this->Letter->Activity->ActivitiesUser->saveMany($persons)) {
                return true;
            }
        }
        return false;
    }

    private function addExposeAddToLetters($data)
    {
        if (!empty($data)) {
            $this->Letter->create();

            if ($this->Letter->save($data)) {
                return true;
            }
        }
        return false;
    }

    private function addExposeAddToEvidences($data)
    {
        if (!empty($data)) {
            $this->Letter->Activity->Evidence->create();

            if ($this->Letter->Activity->Evidence->save($data)) {
                return true;
            }
        }
        return false;
    }

    private function addExposeCreatePdf($date = null, $description = null, $officerIds = null, $userIds = null, $fileName = null)
    {
        //variable to changed
        $arrDate = explode('-', $date);
        $month = $this->monthTranslation[(int)$arrDate[1]]['indonesianLong'];
        $city = $this->city;

        $officers = $this->Letter->Uploader->User->Usercareerview->asLetterDate($officerIds, $date);
        $users = $this->Letter->Uploader->User->Usercareerview->asLetterDate($userIds, $date);

        //for master of the office
        $master = $this->Letter->Departement->ChiefsDepartement->asDate($this->departementPerwakilan, $date);

        $numberFormat = $this->letterSP2FormatNo;
        $this->set(compact('date', 'arrDate', 'month', 'description', 'officers', 'users', 'city', 'master', 'fileName', 'numberFormat'));

        $this->layout = '/pdf/default';

        $this->render('/Pdf/add_expose_draft');
    }

    public function addExposeSuccess($fileId = null)
    {
        $title_for_layout = 'Tambah SP2 Ekspose';
        $breadCrumb = $this->breadCrumb;
        $breadCrumb[1] = array(
            'title' => 'SP2 Ekspose',
            'controller' => 'letters',
            'action' => 'indexExpose'
        );
        $breadCrumb[2] = array(
            'title' => 'Tambah',
            'controller' => 'letters',
            'action' => 'addExpose'
        );
        $breadCrumb[2] = array(
            'title' => 'Berhasil',
            'controller' => 'letters',
            'action' => 'indexExpose'
        );

        $this->set(compact('title_for_layout', 'breadCrumb', 'fileId'));
    }

    public function addExposeNumber($letterId = null)
    {
        if ($this->request->is(array('post', 'put'))) {
            if (!$this->Letter->exists($this->request->data['Letter']['id'])) {
                return false;
            }

            $name = trim($this->request->data['Letter']['name']);
            //first save to letters table
            //$this->Letter->read(null, $this->request->data['Letter']['id']);
            $this->Letter->id = $this->request->data['Letter']['id'];
            $this->Letter->set('name', $name);
            if (!empty($this->request->data['Letter']['date'])) {
                $this->Letter->set('date', $this->request->data['Letter']['date']);
            }

            if (!$this->Letter->save()) {
                $this->Session->setFlash(__('Nomor SP2 tidak dapat disimpan, silahkan ulangi.'));
                return $this->redirect(array('action' => 'indexExpose'));
            }

            //second save to activity table
            $activity = $this->Letter->find('first', array(
                'recursive' => -1,
                'conditions' => array(
                    'Letter.id' => $this->request->data['Letter']['id']
                ),
                'fields' => array('Letter.activity_id')
            ));
            $this->Letter->Activity->id = $activity['Letter']['activity_id'];
            $this->Letter->Activity->set(array(
                'name' => $name,
                'draft' => false
            ));

            if (!$this->Letter->Activity->save()) {
                $this->Session->setFlash(__($activity['Letter']['activity_id']));
                //return $this->redirect(array('action' => 'indexExpose'));
                //$this->view
                return $this->redirect(array(
                    'controller' => 'messages',
                    'action' => 'savingSuccess'
                ));
            }

            return $this->redirect(array('action' => 'indexExpose'));
        }

        $title_for_layout = 'Nomor SP2 Ekspose';
        $breadCrumb = $this->breadCrumb;
        $breadCrumb[1] = array(
            'title' => 'SP2 Ekspose',
            'controller' => 'letters',
            'action' => 'indexExpose'
        );
        $breadCrumb[2] = array(
            'title' => 'Nomor',
            'controller' => 'letters',
            'action' => 'addExposeNumber'
        );

        $letter = $this->Letter->Activity->Letteruserview->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'Letteruserview.id' => $letterId,
                'Letteruserview.active' => true,
                'Letteruserview.activitydraft' => true,
                'Letteruserview.user_id' => $this->Auth->user('id')
            )
        ));

        if ($this->Auth->user('group_id') == $this->groupAdmin) {
            $letter = $this->Letter->Activity->Letteruserview->find('first', array(
                'recursive' => -1,
                'conditions' => array(
                    'Letteruserview.id' => $letterId,
                    'Letteruserview.active' => true,
                    'Letteruserview.activitydraft' => true
                )
            ));
        }

        if (!empty($letter)) {
            $this->set(compact('title_for_layout', 'breadCrumb', 'letter'));
        } else {
            $this->redirect(array('action' => 'indexExpose'));
        }
    }

    public function isLetterNotExists()
    {
        $start = trim($this->request->data['start']);
        empty($start) ? $start = date('Y-m-d') : $start = $start;

        $conditions = array(
            'Activity.active' => 1,
            'Activity.draft' => 0,
            'Activity.start' => $start
        );
        if (isset($this->request->data['name'])) {
            $name = trim(strtolower($this->request->data['name']));
            $name = '%' . $name . '%';
            $conditions['Activity.name LIKE'] = $name;
        } else {
            $description = trim(strtolower($this->request->data['description']));
            $description = '%' . $description . '%';
            $conditions['Activity.description LIKE'] = $description;
        }

        $countData = $this->Letter->Activity->find('count', array(
                'conditions' => $conditions
            )
        );

        $countData > 0 ? $data = false : $data = true;

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function indexAudit($draft = null)
    {
        /**
         * This controller use Activity model
         *
         * @var array
         * @var Activity $Activity
         */
        $this->uses = array('Letteruserview');

        $title_for_layout = 'ST Pemeriksaan';
        $breadCrumb = $this->breadCrumb;
        $breadCrumb[1] = array(
            'title' => 'ST Pemeriksaan',
            'controller' => 'letters',
            'action' => 'indexAudit'
        );

        $conditions = array(
            'Letteruserview.active' => true,
            'Letteruserview.activityactive' => true,
            'Letteruserview.lettercategory_id' => $this->letterCategorySTPS,
            'Letteruserview.user_id' => $this->Auth->user('id'),
            'Letteruserview.activityusertagged' => true
        );
        if ($draft == 'onlyDraft') {
            $conditions['Letteruserview.activitydraft'] = true;
        } elseif ($draft == 'noDraft') {
            $conditions['Letteruserview.activitydraft'] = false;
        }

        $this->Paginator->settings = array(
            'recursive' => -1,
            'conditions' => $conditions,
            'limit' => 10,
            'order' => array('Letteruserview.date' => 'DESC')
        );

        $letters = $this->Paginator->paginate('Letteruserview');

        $this->set(compact('title_for_layout', 'breadCrumb', 'letters'));
    }

    public function addAudit()
    {
        $title_for_layout = 'Tambah Surat Tugas Pemeriksaan';
        $breadCrumb = $this->breadCrumb;
        $breadCrumb[1] = array(
            'title' => 'ST Pemeriksaan',
            'controller' => 'letters',
            'action' => 'indexAudit'
        );
        $breadCrumb[2] = array(
            'title' => 'Tambah',
            'controller' => 'letters',
            'action' => 'addAudit'
        );

        $data = array();
        if ($this->request->is(array('post', 'put'))) {
            $this->autoRender = false;
            empty($this->request->data['Letter']['date']) ? $date = date('Y-m-d') : $date = $this->request->data['Letter']['date'];
            $daysPJ = 'P' . ($this->request->data['Letter']['daysPJ'] - 1) . 'D';
            $daysPT = 'P' . ($this->request->data['Letter']['daysPT'] - 1) . 'D';
            $daysAT = 'P' . ($this->request->data['Letter']['daysKT'] - 1). 'D';

            $startPJ = new DateTime($date);
            $startWPJ = new DateTime($date);
            $startPT = new DateTime($date);
            $startAT = new DateTime($date);
            $startKSB = $startAT;

            $endPJ = $startPJ->add(new DateInterval($daysPJ));
            $endPJ = $endPJ->format('Y-m-d');
            $endWPJ = $endPJ;
            $endPT = $startPT->add(new DateInterval($daysPT));
            $endPT = $endPT->format('Y-m-d');
            $endAT = $startAT->add(new DateInterval($daysAT));
            $endAT = $endAT->format('Y-m-d');
            $endKSB = $endAT;

            if (!empty($this->request->data['Letter']['employeesWPJ'])) {
                $daysWPJ = 'P' . ($this->request->data['Letter']['daysWPJ'] - 1). 'D';
                $endWPJ = $startWPJ->add(new DateInterval($daysWPJ));
                $endWPJ = $endWPJ->format('Y-m-d');
            }
            if (!empty($this->request->data['Letter']['employeesKSB'])) {
                $daysKSB = 'P' . ($this->request->data['Letter']['daysKSB'] - 1). 'D';
                $endKSB = $startKSB->add(new DateInterval($daysKSB));
                $endKSB = $endKSB->format('Y-m-d');
            }

            //first add to activities table
            $dataToActivities = array(
                'name' => $this->request->data['Letter']['name'],
                'description' => $this->request->data['Letter']['description'],
                'start' => $this->request->data['Letter']['date'],
                'end' => $endAT,
                'uploader_id' => $this->Auth->user('id')
            );
            if (!$this->addAuditAddToActivities($dataToActivities)) {
                $this->Session->setFlash(__('Kegiatan tidak dapat disimpan, silahkan ulangi.'));
                return $this->redirect(array('action' => 'addAudit'));
            }
            $activityId = $this->Letter->Activity->getInsertID();

            //second add to activities_users table
            $employeesWPJ = array();
            if (isset($daysWPJ)) {
                $employeesWPJ = explode(',', $this->request->data['Letter']['employeesWPJ']);
            }
            $employeesKSB = array();
            if (isset($daysKSB)) {
                $employeesKSB = explode(',', $this->request->data['Letter']['employeesKSB']);
            }

            $employeesPJ = explode(',', $this->request->data['Letter']['employeesPJ']);
            $employeesPT = explode(',', $this->request->data['Letter']['employeesPT']);
            $employeesKT = explode(',', $this->request->data['Letter']['employeesKT']);
            $employeesAT = explode(',', $this->request->data['Letter']['employeesAT']);
            $dataToActivitiesUsers = array(
                'activity_id' => $activityId,
                'start' => $this->request->data['Letter']['date'],
                'endPJ' => $endPJ,
                'endWPJ' => $endWPJ,
                'endPT' => $endPT,
                'endKT' => $endAT,
                'endKSB' => $endKSB,
                'endAT' => $endAT,
                'employeesPJ' => $employeesPJ,
                'employeesWPJ' => $employeesWPJ,
                'employeesPT' => $employeesPT,
                'employeesKT' => $employeesKT,
                'employeesKSB' => $employeesKSB,
                'employeesAT' => $employeesAT,
            );

            if (!$this->addAuditAddToActivitiesUsers($dataToActivitiesUsers)) {
                $this->Session->setFlash(__('Peserta tidak dapat disimpan, silahkan ulangi.'));
                return $this->redirect(array('action' => 'addExpose'));
            }

            //third add to letters table
            $dataToLetters = array(
                'activity_id' => $activityId,
                'type_id' => $this->typeST,
                'lettercategory_id' => $this->letterCategorySTPS,
                'entity_id' => $this->request->data['Letter']['entity_id'],
                'name' => $this->request->data['Letter']['name'],
                'date' => $date,
                'uploader_id' => $this->Auth->user('id')
            );
            if (!$this->addAuditAddToLetters($dataToLetters)) {
                $this->Session->setFlash(__('Draft tidak dapat disimpan, silahkan ulangi.'));
                return $this->redirect(array('action' => 'addExpose'));
            }

            //fourth add to evidences table
            $dataToEvidences = array(
                'activity_id' => $activityId,
                'name' => 'Draft ST',
                'extension' => 'pdf',
                'type_id' => $this->typeST,
                'uploader_id' => $this->Auth->user('id')
            );
            if (!$this->addAuditAddToEvidences($dataToEvidences)) {
                $this->Session->setFlash(__('Berkas Draft tidak dapat disimpan, silahkan ulangi.'));
                return $this->redirect(array('action' => 'addExpose'));
            }

            //fifth create file
            $this->addAuditCreatePdf($this->Letter->Activity->getInsertID());

            //sixth create zip file and redirect to success page
            if ($this->Letter->Activity->Evidence->createZip($activityId)) return $this->redirect(array('action' => 'addAuditSuccess', $this->Letter->Activity->Evidence->getInsertID()));
        }

        $duties = $this->Letter->Activity->ActivitiesUser->Duty->find('list', array(
            'conditions' => array(
                'NOT' => array(
                    'Duty.id' => array($this->dutyPeserta, $this->dutyPemapar)
                )
            )
        ));
        $entities = $this->Letter->Entity->Entitycategory->Entityview->find('list', array(
            'recursive' => -1,
            'conditions' => array(
                'Entityview.active' => true
            ),
            'order' => array(
                'Entityview.entitycategoryname' => 'ASC',
                'Entityview.name' => 'ASC'
            ),
            'fields' => array('Entityview.id', 'Entityview.fullname')
        ));

        $letterNumberFormat = $this->letterSTFormatNo;
        $city = $this->city;
        //for master of the office
        $master = $this->Letter->Departement->ChiefsDepartement->asDate($this->departementPerwakilan, date('Y-m-d'));

        $this->set(compact('title_for_layout', 'breadCrumb', 'data', 'duties', 'entities', 'letterNumberFormat', 'city', 'master'));
    }

    private function addAuditAddToActivities($data)
    {
        if (!empty($data)) {
            $this->Letter->Activity->create();

            if ($this->Letter->Activity->save($data)) {
                return true;
            }
        }
        return false;
    }

    private function addAuditAddToActivitiesUsers($data)
    {
        if (!empty($data)) {
            $countEmployeesPJ = count($data['employeesPJ']);
            $countEmployeesWPJ = count($data['employeesWPJ']);
            $countEmployeesPT = count($data['employeesPT']);
            $countEmployeesKT = count($data['employeesKT']);
            $countEmployeesKSB = count($data['employeesKSB']);
            $countEmployeesAT = count($data['employeesAT']);

            $persons = array();
            $i = 0;

            for ($j = 0; $j < $countEmployeesPJ; $j++) {
                $persons[$i]['activity_id'] = $data['activity_id'];
                $persons[$i]['start'] = $data['start'];
                $persons[$i]['end'] = $data['endPJ'];
                $persons[$i]['duty_id'] = $this->dutyPJ;
                $persons[$i]['user_id'] = $data['employeesPJ'][$j];
                $i++;
            }
            for ($j = 0; $j < $countEmployeesWPJ; $j++) {
                $persons[$i]['activity_id'] = $data['activity_id'];
                $persons[$i]['start'] = $data['start'];
                $persons[$i]['end'] = $data['endWPJ'];
                $persons[$i]['duty_id'] = $this->dutyWPJ;
                $persons[$i]['user_id'] = $data['employeesWPJ'][$j];
                $i++;
            }
            for ($j = 0; $j < $countEmployeesPT; $j++) {
                $persons[$i]['activity_id'] = $data['activity_id'];
                $persons[$i]['start'] = $data['start'];
                $persons[$i]['end'] = $data['endPT'];
                $persons[$i]['duty_id'] = $this->dutyPT;
                $persons[$i]['user_id'] = $data['employeesPT'][$j];
                $i++;
            }
            for ($j = 0; $j < $countEmployeesKT; $j++) {
                $persons[$i]['activity_id'] = $data['activity_id'];
                $persons[$i]['start'] = $data['start'];
                $persons[$i]['end'] = $data['endKT'];
                $persons[$i]['duty_id'] = $this->dutyKT;
                $persons[$i]['user_id'] = $data['employeesKT'][$j];
                $i++;
            }
            for ($j = 0; $j < $countEmployeesKSB; $j++) {
                $persons[$i]['activity_id'] = $data['activity_id'];
                $persons[$i]['start'] = $data['start'];
                $persons[$i]['end'] = $data['endKSB'];
                $persons[$i]['duty_id'] = $this->dutyKSB;
                $persons[$i]['user_id'] = $data['employeesKSB'][$j];
                $i++;
            }
            for ($j = 0; $j < $countEmployeesAT; $j++) {
                $persons[$i]['activity_id'] = $data['activity_id'];
                $persons[$i]['start'] = $data['start'];
                $persons[$i]['end'] = $data['endAT'];
                $persons[$i]['duty_id'] = $this->dutyAT;
                $persons[$i]['user_id'] = $data['employeesAT'][$j];
                $i++;
            }

            $this->Letter->Activity->ActivitiesUser->create();

            if ($this->Letter->Activity->ActivitiesUser->saveMany($persons)) {
                return true;
            }
        }
        return false;
    }

    private function addAuditAddToLetters($data)
    {
        if (!empty($data)) {
            $this->Letter->create();

            if ($this->Letter->save($data)) {
                return true;
            }
        }
        return false;
    }

    private function addAuditAddToEvidences($data)
    {
        if (!empty($data)) {
            $this->Letter->Activity->Evidence->create();

            if ($this->Letter->Activity->Evidence->save($data)) {
                return true;
            }
        }
        return false;
    }

    public function surat($activityId)
    {
        $this->autoRender = false;
        $letter = $this->Letter->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'Letter.activity_id' => $activityId
            )
        ));
        $entity = $this->Letter->Entity->Entitycategory->Entityview->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'Entityview.id' => $letter['Letter']['entity_id']
            )
        ));
        $users = $this->Letter->Activity->Activityuserview->find('all', array(
            'recursive' => -1,
            'conditions' => array(
                'Activityuserview.activity_id' => $activityId,
                'Activityuserview.useractive' => true
            ),
            'order' => array(
                'Activityuserview.duty_id' => 'ASC'
            )
        ));
        $usersLength = count($users);
        for ($i = 0; $i < $usersLength; $i++) {
            //foreach($users as $user) {
            $userId = array($users[$i]['Activityuserview']['user_id']);
            //print_r($userId);
            //echo '<br>';

            $userCareer = $this->Letter->Uploader->User->Usercareerview->asLetterDate($userId, $letter['Letter']['date']);
            $users[$i]['User'] = $userCareer[0];
            //print_r($userCareer);
            //echo '<br>';
        }
        foreach ($users as $user) {
            print_r($user);
            echo '<br>';
        }

        $userIds = array();
        /*foreach($users as $user){
            $userIds[] = $user['Activityuserview']['user_id'];
        }
        $users = $this->Letter->Uploader->User->Usercareerview->asLetterDate($userIds, $letter['Letter']['date']);*/
        //print_r($users);
    }

    private function addAuditCreatePdf($activityId)
    {
        //first get activity data from activities table and it related such as activities_users, letters, evidences
        $letter = $this->Letter->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'Letter.activity_id' => $activityId
            )
        ));

        $date = $letter['Letter']['date'];
        $dutyAT = $this->dutyAT;
        $dutyKT = $this->dutyKT;

        $entity = $this->Letter->Entity->Entitycategory->Entityview->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'Entityview.id' => $letter['Letter']['entity_id']
            )
        ));

        $users = $this->Letter->Activity->Activityuserview->find('all', array(
            'recursive' => -1,
            'conditions' => array(
                'Activityuserview.activity_id' => $activityId,
                'Activityuserview.useractive' => true
            ),
            'order' => array(
                'Activityuserview.duty_id' => 'ASC'
            )
        ));

        $usersLength = count($users);
        for ($i = 0; $i < $usersLength; $i++) {
            $userId = array($users[$i]['Activityuserview']['user_id']);
            $userCareer = $this->Letter->Uploader->User->Usercareerview->asLetterDate($userId, $date);
            $users[$i]['User'] = $userCareer[0];
        }

        //variable to changed
        $arrDate = explode('-', $date);
        $month = $this->monthTranslation[(int)$arrDate[1]]['indonesianLong'];
        $city = $this->city;

        //for master of the office
        $master = $this->Letter->Departement->ChiefsDepartement->asDate($this->departementPerwakilan, $date);

        //for signer (PPK)
        $signer = $this->Letter->Activity->User->JobsUser->asLetterDate($this->jobPPK, $date);

        //for filename
        $evidenceId = $this->Letter->Activity->Evidence->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'Evidence.activity_id' => $activityId
            )
        ));

        $this->set(compact('dutyAT', 'dutyKT', 'users', 'letter', 'entity', 'date', 'arrDate', 'month', 'city', 'master', 'signer', 'evidenceId'));

        $this->layout = '/pdf/default';

        $this->render('/Pdf/add_audit_draft');
    }

    public function addAuditSuccess($fileId = null)
    {
        $title_for_layout = 'Tambah ST Pemeriksaan';
        $breadCrumb = $this->breadCrumb;
        $breadCrumb[1] = array(
            'title' => 'ST Pemeriksaan',
            'controller' => 'letters',
            'action' => 'indexExpose'
        );
        $breadCrumb[2] = array(
            'title' => 'Tambah',
            'controller' => 'letters',
            'action' => 'addExpose'
        );
        $breadCrumb[2] = array(
            'title' => 'Berhasil',
            'controller' => 'letters',
            'action' => 'indexExpose'
        );

        $this->set(compact('title_for_layout', 'breadCrumb', 'fileId'));
    }

    public function addAuditNumber($letterId = null)
    {
        if ($this->request->is(array('post', 'put'))) {
            if (!$this->Letter->exists($this->request->data['Letter']['id'])) {
                return false;
            }

            $name = trim($this->request->data['Letter']['name']);
            //first save to letters table
            $this->Letter->id = $this->request->data['Letter']['id'];
            $this->Letter->set('name', $name);
            if (!empty($this->request->data['Letter']['date'])) {
                $this->Letter->set('date', $this->request->data['Letter']['date']);
            }

            if (!$this->Letter->save()) {
                $this->Session->setFlash(__('Nomor SP2 tidak dapat disimpan, silahkan ulangi.'));
                return $this->redirect(array('action' => 'indexExpose'));
            }

            //second save to activity table
            $activity = $this->Letter->find('first', array(
                'recursive' => -1,
                'conditions' => array(
                    'Letter.id' => $this->request->data['Letter']['id']
                ),
                'fields' => array('Letter.activity_id')
            ));
            $this->Letter->Activity->id = $activity['Letter']['activity_id'];
            $this->Letter->Activity->set(array(
                'name' => $name,
                'draft' => false
            ));

            if (!$this->Letter->Activity->save()) {
                $this->Session->setFlash(__($activity['Letter']['activity_id']));
                return $this->redirect(array(
                    'controller' => 'messages',
                    'action' => 'savingSuccess'
                ));
            }

            return $this->redirect(array('action' => 'indexAudit'));
        }

        $title_for_layout = 'Nomor ST Pemeriksaan';
        $breadCrumb = $this->breadCrumb;
        $breadCrumb[1] = array(
            'title' => 'ST Pemeriksaan',
            'controller' => 'letters',
            'action' => 'indexAudit'
        );
        $breadCrumb[2] = array(
            'title' => 'Nomor',
            'controller' => 'letters',
            'action' => 'addAuditNumber'
        );

        $letter = $this->Letter->Activity->Letteruserview->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'Letteruserview.id' => $letterId,
                'Letteruserview.active' => true,
                'Letteruserview.activitydraft' => true,
                'Letteruserview.user_id' => $this->Auth->user('id')
            )
        ));

        if ($this->Auth->user('group_id') == $this->groupAdmin) {
            $letter = $this->Letter->Activity->Letteruserview->find('first', array(
                'recursive' => -1,
                'conditions' => array(
                    'Letteruserview.id' => $letterId,
                    'Letteruserview.active' => true,
                    'Letteruserview.activitydraft' => true
                )
            ));
        }

        if (!empty($letter)) {
            $this->set(compact('title_for_layout', 'breadCrumb', 'letter'));
        } else {
            $this->redirect(array('action' => 'indexAudit'));
        }
    }

    public function addAuditDate($letterId = null)
    {
        if ($this->request->is(array('post', 'put'))) {
            $activityId = $this->request->data['Letter']['id'];
            if (!$this->Letter->Activity->exists($this->request->data['Letter']['id'])) {
                return false;
            }

            $data = $this->request->data['Letter'];
            $dataToSave = array();
            foreach($data as $key=>$value) {
                if($key != 'id') {
                    $arrKey = explode('_', $key);
                    $userId = $arrKey[1];
                    $keyId = $arrKey[0];

                    if($keyId == 'start') {
                        $dataToSave[$userId]['start'] = $value;
                    } elseif($keyId == 'end') {
                        $dataToSave[$userId]['end'] = $value;
                    }
                }
            }
            //first update activity start and end date to latest user date
            $dataLen = count($dataToSave) - 1;
            $this->Letter->Activity->updateAll(array(
                'Activity.start' => '"' . $dataToSave[$dataLen]['start'] . '"',
                'Activity.end' => '"' . $dataToSave[$dataLen]['end'] . '"'
            ), array(
                'Activity.id' => $activityId,
                'Activity.active' => true
            ));

            //second update activitiesusers table
            foreach($dataToSave as $key=>$value) {
                $user_id = $key;
                $st = strtotime($value['start']);
                $en = strtotime($value['end']);
                $days = $en - $st;

                $this->Letter->Activity->ActivitiesUser->updateAll(
                    array(
                        'ActivitiesUser.start' => '"' . $value['start'] . '"',
                        'ActivitiesUser.end' => '"' . $value['end'] . '"'
                    ),
                    array(
                        'ActivitiesUser.activity_id' => $activityId,
                        'ActivitiesUser.user_id' => $user_id,
                        'ActivitiesUser.tagged' => true,
                        'ActivitiesUser.active' => true
                    )
                );
                if($days < 0) {//if end date before start date, tagged column set to false
                    $this->Letter->Activity->ActivitiesUser->updateAll(
                        array(
                            'ActivitiesUser.tagged' => false
                        ),
                        array(
                            'ActivitiesUser.activity_id' => $activityId,
                            'ActivitiesUser.user_id' => $user_id,
                            'ActivitiesUser.tagged' => true,
                            'ActivitiesUser.active' => true
                        )
                    );
                }
            }
            return $this->redirect(array('action' => 'indexAudit'));
        }

        $title_for_layout = 'Jadwal Pemeriksaan';
        $breadCrumb = $this->breadCrumb;
        $breadCrumb[1] = array(
            'title' => 'ST Pemeriksaan',
            'controller' => 'letters',
            'action' => 'indexAudit'
        );
        $breadCrumb[2] = array(
            'title' => 'Jadwal',
            'controller' => 'letters',
            'action' => 'addAuditNumber'
        );

        $letter = $this->Letter->Activity->Letteruserview->find('all', array(
            'recursive' => -1,
            'conditions' => array(
                'Letteruserview.activity_id' => $letterId,
                'Letteruserview.active' => true,
                'Letteruserview.activitydraft' => false
            )
        ));

        if ($this->Auth->user('group_id') == $this->groupAdmin) {
            $letter = $this->Letter->Activity->Letteruserview->find('first', array(
                'recursive' => -1,
                'conditions' => array(
                    'Letteruserview.activity_id' => $letterId,
                    'Letteruserview.active' => true,
                    'Letteruserview.activitydraft' => false
                ),
                'order' => array(
                    'Letteruserview.duty_id' => 'ASC'
                )
            ));
        }

        if (!empty($letter)) {
            $this->set(compact('title_for_layout', 'breadCrumb', 'letter'));
        } else {
            $this->redirect(array('action' => 'indexAudit'));
        }
    }

    public function jajal($date)
    {
        $this->autoRender = false;
        $start = microtime(true);
        echo '<br>';

        $users = array();
        for ($i = 1; $i < 77; $i++) {
            $users[] = $i;
        }

        $test = $this->Letter->Departement->User->Usercareerview->asLetterDate($users, $date);
        $countTest = count($test);

        echo '<table>';
        echo '<tr><td>No</td><td>Name</td><td>Peran</td><td>Pangkat</td><td>JFP</td></tr>';
        for ($i = 0; $i < $countTest; $i++) {
            echo '<tr>';
            echo '<td>' . $i . '</td>';
            echo '<td>' . $test[$i]['name'] . '</td>';
            echo '<td>' . $test[$i]['roledescription'] . '</td>';
            echo '<td>' . $test[$i]['levelname'] . '</td>';
            echo '<td>' . $test[$i]['positionlevelname'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
        $end = microtime(true);
        $elapsed = $end - $start;
        echo $elapsed;
    }

    public function lihatjob($jobId = null)
    {
        $this->autoRender = false;
        $data = $this->Letter->Activity->User->JobsUser->asLetterDate(1, '2015-02-15');
        print_r($data);
    }

    public function lihat()
    {
        $this->autoRender = false;
        $userIds = array(2, 3, 4, 5, 6, 7, 8, 9, 10);
        $data = $this->Letter->Uploader->User->Usercareerview->asLetterDate($userIds, '2015-01-31');
        $arrRole = array();
        //print_r($users);
        /*$data = $this->Letter->Uploader->User->Userroleview->find('all', array(
            'recursive' => -1,
            'order' => array('Userroleview.user_id ASC')
        ));*/
        $dataCount = count($data);
        for ($i = 0; $i < $dataCount; $i++) {
            echo $i;
            echo '&nbsp;';
            //echo $data[$i]['Userroleview']['user_id'];
            echo $data[$i]['name'];
            echo '&nbsp;';
            echo $data[$i]['role_id'];
            echo '&nbsp;';
            echo $data[$i]['rolename'];
            echo '<br>';
            $arrRole[$data[$i]['role_id']] = $data[$i]['rolename'];
        }
        ksort($arrRole);
        $countRole = count($arrRole);
        $i = 0;
        foreach ($arrRole as $key => $value) {
            echo $value;
            if ($i == $countRole - 3) {
                //$table .= '&nbsp;dan&nbsp;';
                echo ' dan ';
            } elseif ($i == $countRole - 2) {
                //$table .= '&nbsp;serta&nbsp;';
                echo ' serta ';
            } elseif ($i > $countRole - 2) {

            } else {
                //$table .= ',&nbsp;';
                echo ', ';
            }
            $i++;
            //echo '<br>';
        }
        //print_r($arrRole);
        //$this->Letter->Departement->ChiefsDepartement->unbindModel(array('belongsTo' => array('Departement')));
        //$master = $this->Letter->Departement->ChiefsDepartement->asDate($this->departementPerwakilan, '2015-01-01');
        //print_r($master);
    }
}