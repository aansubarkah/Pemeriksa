<?php
App::uses('AppModel', 'Model');

/**
 * Categorytreeprefixview Model
 *
 * @property Categorytreeparent $Categorytreeparent
 * @property Category $Category
 * @property Categorytreeposition $Categorytreeposition
 * @property Prefixposition $Prefixposition
 */
class Categorytreeprefixview extends AppModel
{


    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Categorytreeparent' => array(
            'className' => 'Categorytreeparent',
            'foreignKey' => 'categorytreeparent_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Categorytreeposition' => array(
            'className' => 'Categorytreeposition',
            'foreignKey' => 'categorytreeposition_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Prefixposition' => array(
            'className' => 'Prefixposition',
            'foreignKey' => 'prefixposition_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
}
