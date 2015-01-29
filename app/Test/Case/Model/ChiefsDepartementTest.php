<?php
App::uses('ChiefsDepartement', 'Model');

/**
 * ChiefsDepartement Test Case
 *
 */
class ChiefsDepartementTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.chiefs_departement',
		'app.chief',
		'app.user',
		'app.departement'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ChiefsDepartement = ClassRegistry::init('ChiefsDepartement');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ChiefsDepartement);

		parent::tearDown();
	}

}
