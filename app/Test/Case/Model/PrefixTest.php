<?php
App::uses('Prefix', 'Model');

/**
 * Prefix Test Case
 *
 */
class PrefixTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.prefix',
		'app.simplecategorytreeprefixview',
		'app.categorytree',
		'app.category',
		'app.categorytreeprefixview',
		'app.categorytreeparent',
		'app.categorytreeposition',
		'app.prefixposition',
		'app.simplecategorytreeview',
		'app.position',
		'app.categorytreecategoryview',
		'app.categorytrees_prefix',
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
		$this->Prefix = ClassRegistry::init('Prefix');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Prefix);

		parent::tearDown();
	}

}
