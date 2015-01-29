<?php
App::uses('Categorytreecategoryview', 'Model');

/**
 * Categorytreecategoryview Test Case
 *
 */
class CategorytreecategoryviewTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.categorytreecategoryview',
		'app.categorytreeparent',
		'app.categorytree',
		'app.position'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Categorytreecategoryview = ClassRegistry::init('Categorytreecategoryview');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Categorytreecategoryview);

		parent::tearDown();
	}

}
