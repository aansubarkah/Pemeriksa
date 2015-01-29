<?php
App::uses('AppModel', 'Model');

/**
 * DepartementsLetter Model
 *
 * @property Departement $Departement
 * @property Letter $Letter
 */
class DepartementsLetter extends AppModel
{

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'id';


    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Departement' => array(
            'className' => 'Departement',
            'foreignKey' => 'departement_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Letter' => array(
            'className' => 'Letter',
            'foreignKey' => 'letter_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
}
