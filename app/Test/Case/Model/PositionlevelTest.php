<?php
App::uses('Positionlevel', 'Model');

/**
 * Positionlevel Test Case
 *
 */
class PositionlevelTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.positionlevel',
		'app.position',
		'app.categorytrees_value',
		'app.categorytree',
		'app.category',
		'app.categorytreeprefixview',
		'app.categorytreeparent',
		'app.categorytreeposition',
		'app.prefixposition',
		'app.simplecategorytreeview',
		'app.activity',
		'app.transaction',
		'app.user',
		'app.activities_user',
		'app.categorytreecategoryview',
		'app.evaluation',
		'app.period',
		'app.users_period',
		'app.simplecategorytreeprefixview',
		'app.prefix',
		'app.categorytrees_prefix',
		'app.size',
		'app.users_positionlevel'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Positionlevel = ClassRegistry::init('Positionlevel');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Positionlevel);

		parent::tearDown();
	}

}
