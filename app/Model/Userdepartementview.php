<?php
App::uses('AppModel', 'Model');
/**
 * Userdepartementview Model
 *
 * @property Departement $Departement
 * @property User $User
 */
class Userdepartementview extends AppModel {

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
		'Departement' => array(
			'className' => 'Departement',
			'foreignKey' => 'departement_id',
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
