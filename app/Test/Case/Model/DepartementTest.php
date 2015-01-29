<?php
App::uses('Departement', 'Model');

/**
 * Departement Test Case
 *
 */
class DepartementTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.departement',
		'app.chief',
		'app.user',
		'app.chiefs_departement',
		'app.departements_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Departement = ClassRegistry::init('Departement');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Departement);

		parent::tearDown();
	}

}
