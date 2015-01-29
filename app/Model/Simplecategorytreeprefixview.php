<?php
App::uses('AppModel', 'Model');

/**
 * Simplecategorytreeprefixview Model
 *
 * @property Categorytree $Categorytree
 * @property Prefix $Prefix
 * @property Position $Position
 */
class Simplecategorytreeprefixview extends AppModel
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
        'prefix_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'position_id' => array(
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
        'position' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
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
        'Prefix' => array(
            'className' => 'Prefix',
            'foreignKey' => 'prefix_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Position' => array(
            'className' => 'Position',
            'foreignKey' => 'position_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
}
