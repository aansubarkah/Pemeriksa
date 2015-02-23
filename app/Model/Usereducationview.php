<?php
App::uses('AppModel', 'Model');
/**
 * Usereducationview Model
 *
 * @property Education $Education
 * @property User $User
 */
class Usereducationview extends AppModel {

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
		'Education' => array(
			'className' => 'Education',
			'foreignKey' => 'education_id',
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
		)
	);
}
