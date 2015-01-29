<?php
App::uses('Lettercategory', 'Model');

/**
 * Lettercategory Test Case
 *
 */
class LettercategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.lettercategory',
		'app.letter'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Lettercategory = ClassRegistry::init('Lettercategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Lettercategory);

		parent::tearDown();
	}

}
