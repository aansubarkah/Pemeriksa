<?php
/**
 * UserroleviewFixture
 *
 */
class UserroleviewFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false, 'key' => 'primary'),
		'role_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'start' => array('type' => 'date', 'null' => false, 'default' => null),
		'end' => array('type' => 'date', 'null' => true, 'default' => null),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'rolename' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'roledescription' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'roleactive' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
		'username' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'useractive' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
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
			'role_id' => 1,
			'user_id' => 1,
			'start' => '2015-01-28',
			'end' => '2015-01-28',
			'active' => 1,
			'rolename' => 'Lorem ipsum dolor sit amet',
			'roledescription' => 'Lorem ipsum dolor sit amet',
			'roleactive' => 1,
			'username' => 'Lorem ipsum dolor sit amet',
			'useractive' => 1
		),
	);

}
