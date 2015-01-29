<?php
/**
 * UserlevelviewFixture
 *
 */
class UserlevelviewFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false, 'key' => 'primary'),
		'level_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'start' => array('type' => 'date', 'null' => false, 'default' => null),
		'end' => array('type' => 'date', 'null' => true, 'default' => null),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'useractive' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
		'levelname' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'leveldescription' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'levelactive' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
		'positionlevelname' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
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
			'level_id' => 1,
			'user_id' => 1,
			'start' => '2015-01-28',
			'end' => '2015-01-28',
			'active' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'useractive' => 1,
			'levelname' => 'Lorem ipsum dolor sit amet',
			'leveldescription' => 'Lorem ipsum dolor sit amet',
			'levelactive' => 1,
			'positionlevelname' => 'Lorem ipsum dolor sit amet'
		),
	);

}
