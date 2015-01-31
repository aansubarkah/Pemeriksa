<?php
App::uses('AppModel', 'Model');

/**
 * ChiefsDepartement Model
 *
 * @property Chief $Chief
 * @property Departement $Departement
 */
class ChiefsDepartement extends AppModel
{

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'chief_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'departement_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'start' => array(
            'date' => array(
                'rule' => array('date'),
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
        'Chief' => array(
            'className' => 'Chief',
            'foreignKey' => 'chief_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Departement' => array(
            'className' => 'Departement',
            'foreignKey' => 'departement_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    public function asDate($departementId = null, $date = null) {
        $this->unbindModel(array(
            'belongsTo' => array('Departement')
        ));

        $data = $this->find('first', array(
            'recursive' => 2,
            'conditions' => array(
                'ChiefsDepartement.departement_id' => $departementId,
                'ChiefsDepartement.start <' => $date,
                'ChiefsDepartement.end >' => $date,
                'ChiefsDepartement.active' => true
            )
        ));

        if(empty($data)) {
            $data = $this->find('first', array(
                'recursive' => 2,
                'conditions' => array(
                    'ChiefsDepartement.departement_id' => $departementId,
                    'ChiefsDepartement.end' => null,
                    'ChiefsDepartement.active' => true
                )
            ));
        }

        return $data;
    }
}
