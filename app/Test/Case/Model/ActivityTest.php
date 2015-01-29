<?php
App::uses('Activity', 'Model');

/**
 * Activity Test Case
 *
 */
class ActivityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.activity',
		'app.categorytree',
		'app.transaction',
		'app.user',
		'app.activities_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Activity = ClassRegistry::init('Activity');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Activity);

		parent::tearDown();
	}

}
