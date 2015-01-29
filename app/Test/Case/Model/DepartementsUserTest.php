<?php
App::uses('DepartementsUser', 'Model');

/**
 * DepartementsUser Test Case
 *
 */
class DepartementsUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.departements_user',
		'app.departement',
		'app.chief',
		'app.user',
		'app.chiefs_departement'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DepartementsUser = ClassRegistry::init('DepartementsUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DepartementsUser);

		parent::tearDown();
	}

}
