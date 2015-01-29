<?php
App::uses('Categorytreeprefixview', 'Model');

/**
 * Categorytreeprefixview Test Case
 *
 */
class CategorytreeprefixviewTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.categorytreeprefixview',
		'app.categorytreeparent',
		'app.category',
		'app.categorytree',
		'app.simplecategorytreeview',
		'app.categorytreeposition',
		'app.prefixposition'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Categorytreeprefixview = ClassRegistry::init('Categorytreeprefixview');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Categorytreeprefixview);

		parent::tearDown();
	}

}
