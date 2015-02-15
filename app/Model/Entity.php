<?php
App::uses('AppModel', 'Model');
/**
 * Entity Model
 *
 * @property Entitycategory $Entitycategory
 * @property Letter $Letter
 * @property Letterview $Letterview
 */
class Entity extends AppModel {

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
		'Entitycategory' => array(
			'className' => 'Entitycategory',
			'foreignKey' => 'entitycategory_id',
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
		'Letter' => array(
			'className' => 'Letter',
			'foreignKey' => 'entity_id',
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
		'Letterview' => array(
			'className' => 'Letterview',
			'foreignKey' => 'entity_id',
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
