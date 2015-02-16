<?php
App::uses('AppModel', 'Model');

/**
 * Evidence Model
 *
 * @property Type $Type
 * @property Uploader $Uploader
 * @property Activity $Activity
 */
class Evidence extends AppModel
{

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'type_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'uploader_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'active' => array(
            'boolean' => array(
                'rule' => array('boolean'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Type' => array(
            'className' => 'Type',
            'foreignKey' => 'type_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Uploader' => array(
            'className' => 'Uploader',
            'foreignKey' => 'uploader_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Activity' => array(
            'className' => 'Activity',
            'foreignKey' => 'activity_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * @param null $data
     * @return bool
     * @throws Exception
     *
     * $data array consist of
     * name, type_id, uploader_id, activity_id, filename
     */
    public function saveAndRename($data = null)
    {
        App::uses('File', 'Utility');
        $ret = false;
        $filePath = WWW_ROOT . 'files' . DS . $data['filename'];
        $file = new File($filePath, false, 777);

        if ($file->exists()) {
            //get file extension
            $ext = $file->ext();
            $ext = (string)$ext;
            $ext = strtolower($ext);

            //save to db
            $data['extension'] = $ext;

            $this->create();

            if ($this->save($data)) {
                //rename uploaded file with evidences table id
                $filePathNew = WWW_ROOT . 'files' . DS . $this->getInsertID() . '.' . $ext;
                rename($filePath, $filePathNew);
                //create zip file
                if($this->createZip($data['activity_id'])) $ret = true;
            }
        }

        $file->close();

        return $ret;
    }

    public function createZip($activityId = null)
    {
        $files = $this->find('all', array(
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
    }
}
