<?php
App::uses('Simplecategorytreeview', 'Model');

/**
 * Simplecategorytreeview Test Case
 *
 */
class SimplecategorytreeviewTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.simplecategorytreeview',
		'app.categorytree',
		'app.category',
		'app.categorytreeprefixview',
		'app.categorytreeparent',
		'app.categorytreeposition',
		'app.prefixposition',
		'app.position',
		'app.categorytreecategoryview',
		'app.categorytrees_prefix',
		'app.prefix',
		'app.simplecategorytreeprefixview',
		'app.positionlevel',
		'app.categorytrees_value',
		'app.size',
		'app.users_period',
		'app.user',
		'app.users_positionlevel',
		'app.users_position',
		'app.activity',
		'app.transaction',
		'app.activities_user',
		'app.evaluation',
		'app.period'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Simplecategorytreeview = ClassRegistry::init('Simplecategorytreeview');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Simplecategorytreeview);

		parent::tearDown();
	}

}
