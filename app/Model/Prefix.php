<?php
App::uses('AppModel', 'Model');

/**
 * Prefix Model
 *
 * @property Simplecategorytreeprefixview $Simplecategorytreeprefixview
 * @property Categorytree $Categorytree
 */
class Prefix extends AppModel
{

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
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
        'Simplecategorytreeprefixview' => array(
            'className' => 'Simplecategorytreeprefixview',
            'foreignKey' => 'prefix_id',
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


    /**
     * hasAndBelongsToMany associations
     *
     * @var array
     */
    public $hasAndBelongsToMany = array(
        'Categorytree' => array(
            'className' => 'Categorytree',
            'joinTable' => 'categorytrees_prefixes',
            'foreignKey' => 'prefix_id',
            'associationForeignKey' => 'categorytree_id',
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
