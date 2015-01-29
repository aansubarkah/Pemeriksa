<?php
App::uses('LevelsUser', 'Model');

/**
 * LevelsUser Test Case
 *
 */
class LevelsUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.levels_user',
		'app.level',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LevelsUser = ClassRegistry::init('LevelsUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LevelsUser);

		parent::tearDown();
	}

}
