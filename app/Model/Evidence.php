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

    public function createZip($activityId = null) {
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

        //$zip->addFile(WWW_ROOT . 'files'. DS . '36.pdf', '36.pdf');
        $zip->close();
        //return true if all ok
        return true;
    }
}
