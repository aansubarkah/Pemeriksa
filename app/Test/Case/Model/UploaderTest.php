<?php
App::uses('Uploader', 'Model');

/**
 * Uploader Test Case
 *
 */
class UploaderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.uploader',
		'app.user',
		'app.evidence',
		'app.type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Uploader = ClassRegistry::init('Uploader');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Uploader);

		parent::tearDown();
	}

}
