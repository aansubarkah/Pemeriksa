<?php
App::uses('AppModel', 'Model');

/**
 * Letter Model
 *
 * @property Activity $Activity
 * @property Type $Type
 * @property Lettercategory $Lettercategory
 * @property Uploader $Uploader
 * @property Departement $Departement
 * @property Entity $Entity
 */
class Letter extends AppModel
{

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';


    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Activity' => array(
            'className' => 'Activity',
            'foreignKey' => 'activity_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Type' => array(
            'className' => 'Type',
            'foreignKey' => 'type_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Lettercategory' => array(
            'className' => 'Lettercategory',
            'foreignKey' => 'lettercategory_id',
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
        'Entity' => array(
            'className' => 'Entity',
            'foreignKey' => 'entity_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasAndBelongsToMany associations
     *
     * @var array
     */
    public $hasAndBelongsToMany = array(
        'Departement' => array(
            'className' => 'Departement',
            'joinTable' => 'departements_letters',
            'foreignKey' => 'letter_id',
            'associationForeignKey' => 'departement_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        )
    );

}
