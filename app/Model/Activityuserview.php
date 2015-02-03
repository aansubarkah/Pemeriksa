<?php
App::uses('AppModel', 'Model');
/**
 * Activityuserview Model
 *
 * @property Activity $Activity
 * @property User $User
 * @property Duty $Duty
 * @property Categorytree $Categorytree
 * @property Type $Type
 */
class Activityuserview extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Duty' => array(
			'className' => 'Duty',
			'foreignKey' => 'duty_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Categorytree' => array(
			'className' => 'Categorytree',
			'foreignKey' => 'categorytree_id',
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
		)
	);
}
