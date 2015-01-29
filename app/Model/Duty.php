<?php
App::uses('AppModel', 'Model');

/**
 * Duty Model
 *
 * @property ActivitiesUser $ActivitiesUser
 */
class Duty extends AppModel
{

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';


    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'ActivitiesUser' => array(
            'className' => 'ActivitiesUser',
            'foreignKey' => 'duty_id',
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

}
