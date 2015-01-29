<?php
App::uses('Categorytree', 'Model');

/**
 * Categorytree Test Case
 *
 */
class CategorytreeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.categorytree',
		'app.category',
		'app.categorytreeprefixview',
		'app.categorytreeparent',
		'app.categorytreeposition',
		'app.prefixposition',
		'app.simplecategorytreeview',
		'app.position',
		'app.activity',
		'app.transaction',
		'app.user',
		'app.activities_user',
		'app.categorytreecategoryview',
		'app.evaluation',
		'app.simplecategorytreeprefixview',
		'app.prefix',
		'app.categorytrees_prefix'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Categorytree = ClassRegistry::init('Categorytree');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Categorytree);

		parent::tearDown();
	}

}
