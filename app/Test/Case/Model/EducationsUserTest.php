<?php
App::uses('EducationsUser', 'Model');

/**
 * EducationsUser Test Case
 *
 */
class EducationsUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.educations_user',
		'app.education',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EducationsUser = ClassRegistry::init('EducationsUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EducationsUser);

		parent::tearDown();
	}

}
