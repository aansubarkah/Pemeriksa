<?php
App::uses('Period', 'Model');

/**
 * Period Test Case
 *
 */
class PeriodTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.period',
		'app.evaluation',
		'app.user',
		'app.categorytree',
		'app.category',
		'app.categorytreeprefixview',
		'app.categorytreeparent',
		'app.categorytreeposition',
		'app.prefixposition',
		'app.simplecategorytreeview',
		'app.position',
		'app.activity',
		'app.transaction',
		'app.activities_user',
		'app.categorytreecategoryview',
		'app.simplecategorytreeprefixview',
		'app.prefix',
		'app.categorytrees_prefix',
		'app.users_period'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Period = ClassRegistry::init('Period');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Period);

		parent::tearDown();
	}

}
