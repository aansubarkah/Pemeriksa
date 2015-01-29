<?php
App::uses('ActivitiesUser', 'Model');

/**
 * ActivitiesUser Test Case
 *
 */
class ActivitiesUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.activities_user',
		'app.activity',
		'app.categorytree',
		'app.transaction',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ActivitiesUser = ClassRegistry::init('ActivitiesUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ActivitiesUser);

		parent::tearDown();
	}

}
