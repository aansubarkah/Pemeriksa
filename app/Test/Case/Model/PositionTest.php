<?php
App::uses('Position', 'Model');

/**
 * Position Test Case
 *
 */
class PositionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.position',
		'app.categorytreecategoryview',
		'app.categorytreeparent',
		'app.categorytree',
		'app.category',
		'app.categorytreeprefixview',
		'app.categorytreeposition',
		'app.prefixposition',
		'app.simplecategorytreeview',
		'app.activity',
		'app.transaction',
		'app.user',
		'app.activities_user',
		'app.evaluation',
		'app.period',
		'app.users_period',
		'app.simplecategorytreeprefixview',
		'app.prefix',
		'app.categorytrees_prefix',
		'app.positionlevel',
		'app.categorytrees_value',
		'app.size',
		'app.users_positionlevel',
		'app.users_position'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Position = ClassRegistry::init('Position');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Position);

		parent::tearDown();
	}

}
