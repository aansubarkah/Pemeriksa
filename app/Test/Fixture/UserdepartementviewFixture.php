<?php
/**
 * UserdepartementviewFixture
 *
 */
class UserdepartementviewFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false, 'key' => 'primary'),
		'departement_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'start' => array('type' => 'date', 'null' => false, 'default' => null),
		'end' => array('type' => 'date', 'null' => true, 'default' => null),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'departementname' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'departementdescription' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'departementactive' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
		'username' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array(
			
		),
		'tableParameters' => array('comment' => 'VIEW')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'departement_id' => 1,
			'user_id' => 1,
			'start' => '2015-01-28',
			'end' => '2015-01-28',
			'active' => 1,
			'departementname' => 'Lorem ipsum dolor sit amet',
			'departementdescription' => 'Lorem ipsum dolor sit amet',
			'departementactive' => 1,
			'username' => 'Lorem ipsum dolor sit amet'
		),
	);

}
