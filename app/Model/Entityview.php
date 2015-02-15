<?php
App::uses('AppModel', 'Model');
/**
 * Entityview Model
 *
 * @property Entitycategory $Entitycategory
 */
class Entityview extends AppModel {

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
}
