<?php
App::uses('AppModel', 'Model');

/**
 * Departement Model
 *
 * @property Departement $ParentDepartement
 * @property Departement $ChildDepartement
 * @property Chief $Chief
 * @property User $User
 * @property DepartementsLetter $DepartementsLetter
 * @property ChiefsDepartement $ChiefsDepartement
 * @property DepartementsUser $DepartementsUser
 * @property Usercareerview $Usercareerview
 * @property Userdepartementview $Userdepartementview
 */
class Departement extends AppModel
{

    /**
     * Behaviors
     *
     * @var array
     */
    public $actsAs = array(
        'Tree',
    );

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
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'ParentDepartement' => array(
            'className' => 'Departement',
            'foreignKey' => 'parent_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'ChildDepartement' => array(
            'className' => 'Departement',
            'foreignKey' => 'parent_id',
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
        'DepartementsLetter' => array(
            'className' => 'DepartementsLetter',
            'foreignKey' => 'departement_id',
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
        'ChiefsDepartement' => array(
            'className' => 'ChiefsDepartement',
            'foreignKey' => 'departement_id',
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
        'DepartementsUser' => array(
            'className' => 'DepartementsUser',
            'foreignKey' => 'departement_id',
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
        'Usercareerview' => array(
            'className' => 'Usercareerview',
            'foreignKey' => 'departement_id',
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
        'Userdepartementview' => array(
            'className' => 'Userdepartementview',
            'foreignKey' => 'departement_id',
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
        'Chief' => array(
            'className' => 'Chief',
            'joinTable' => 'chiefs_departements',
            'foreignKey' => 'departement_id',
            'associationForeignKey' => 'chief_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        ),
        'User' => array(
            'className' => 'User',
            'joinTable' => 'departements_users',
            'foreignKey' => 'departement_id',
            'associationForeignKey' => 'user_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        ),
        'Letter' => array(
            'className' => 'Letter',
            'joinTable' => 'departements_letters',
            'foreignKey' => 'departement_id',
            'associationForeignKey' => 'letter_id',
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
