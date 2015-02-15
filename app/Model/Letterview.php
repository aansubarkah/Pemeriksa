<?php
App::uses('AppModel', 'Model');
/**
 * Letterview Model
 *
 * @property Activity $Activity
 * @property Type $Type
 * @property Lettercategory $Lettercategory
 * @property Entity $Entity
 * @property Uploader $Uploader
 * @property Categorytree $Categorytree
 */
class Letterview extends AppModel {

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
		'Type' => array(
			'className' => 'Type',
			'foreignKey' => 'type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Lettercategory' => array(
			'className' => 'Lettercategory',
			'foreignKey' => 'lettercategory_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Entity' => array(
			'className' => 'Entity',
			'foreignKey' => 'entity_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Uploader' => array(
			'className' => 'Uploader',
			'foreignKey' => 'uploader_id',
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
		)
	);
}
