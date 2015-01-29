<?php
App::uses('Chief', 'Model');

/**
 * Chief Test Case
 *
 */
class ChiefTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.chief',
		'app.user',
		'app.departement',
		'app.chiefs_departement'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Chief = ClassRegistry::init('Chief');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Chief);

		parent::tearDown();
	}

}
