<?php
/**
 * UsercareerviewFixture
 *
 */
class UsercareerviewFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'userlevelid' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
		'level_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'levelstart' => array('type' => 'date', 'null' => true, 'default' => null),
		'levelend' => array('type' => 'date', 'null' => true, 'default' => null),
		'levelactive' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
		'levelname' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'leveldescription' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'positionlevelname' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'userroleid' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
		'role_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'rolestart' => array('type' => 'date', 'null' => true, 'default' => null),
		'roleend' => array('type' => 'date', 'null' => true, 'default' => null),
		'roleactive' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
		'rolename' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'roledescription' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
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
			'user_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'userlevelid' => 1,
			'level_id' => 1,
			'levelstart' => '2015-01-28',
			'levelend' => '2015-01-28',
			'levelactive' => 1,
			'levelname' => 'Lorem ipsum dolor sit amet',
			'leveldescription' => 'Lorem ipsum dolor sit amet',
			'positionlevelname' => 'Lorem ipsum dolor sit amet',
			'userroleid' => 1,
			'role_id' => 1,
			'rolestart' => '2015-01-28',
			'roleend' => '2015-01-28',
			'roleactive' => 1,
			'rolename' => 'Lorem ipsum dolor sit amet',
			'roledescription' => 'Lorem ipsum dolor sit amet'
		),
	);

}
