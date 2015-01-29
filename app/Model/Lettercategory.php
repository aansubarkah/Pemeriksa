<?php
App::uses('AppModel', 'Model');

/**
 * Lettercategory Model
 *
 * @property Letter $Letter
 */
class Lettercategory extends AppModel
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
        'Letter' => array(
            'className' => 'Letter',
            'foreignKey' => 'lettercategory_id',
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
