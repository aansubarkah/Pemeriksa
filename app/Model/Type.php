<?php
App::uses('AppModel', 'Model');

/**
 * Type Model
 *
 * @property Evidence $Evidence
 * @property Letter $Letter
 * @property Letterview $Letterview
 * @property Letteruserview $Letteruserview
 * @property Activityuserview $Activityuserview
 */
class Type extends AppModel
{

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
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
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Evidence' => array(
            'className' => 'Evidence',
            'foreignKey' => 'type_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Letter' => array(
            'className' => 'Letter',
            'foreignKey' => 'type_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Letterview' => array(
            'className' => 'Letterview',
            'foreignKey' => 'type_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Letteruserview' => array(
            'className' => 'Letteruserview',
            'foreignKey' => 'type_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Activityuserview' => array(
            'className' => 'Activityuserview',
            'foreignKey' => 'type_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

    public function add($text = null)
    {
        $ret = 0;
        $originalText = $text;
        $text = trim(strtolower($text));
        if (empty($text)) return $ret;

        $type = $this->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'Type.active' => 1,
                'LOWER(Type.description) LIKE' => $text
            ),
            'fields' => array('Type.id'),
        ));
        $ret = $text['Type']['id'];

        if (empty($type)) {
            $words = preg_split("/\s+/", $text);
            $name = '';
            foreach ($words as $word) {
                $name .= strtoupper($word[0]);
            }

            $dataToSave = array(
                'name' => $name,
                'description' => $originalText
            );

            $this->create();

            if ($this->save($dataToSave)) {
                $ret = $this->getInsertID();
            }
        }

        return $ret;
    }
}
