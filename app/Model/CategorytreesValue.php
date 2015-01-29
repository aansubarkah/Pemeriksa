<?php
App::uses('AppModel', 'Model');

/**
 * CategorytreesValue Model
 *
 * @property Categorytree $Categorytree
 * @property Positionlevel $Positionlevel
 * @property Size $Size
 */
class CategorytreesValue extends AppModel
{

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'categorytree_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'positionlevel_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'size_id' => array(
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
        'Categorytree' => array(
            'className' => 'Categorytree',
            'foreignKey' => 'categorytree_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Positionlevel' => array(
            'className' => 'Positionlevel',
            'foreignKey' => 'positionlevel_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Size' => array(
            'className' => 'Size',
            'foreignKey' => 'size_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
}
