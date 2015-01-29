<?php
App::uses('CategorytreesPrefix', 'Model');

/**
 * CategorytreesPrefix Test Case
 *
 */
class CategorytreesPrefixTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.categorytrees_prefix',
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
		'app.prefix'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CategorytreesPrefix = ClassRegistry::init('CategorytreesPrefix');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CategorytreesPrefix);

		parent::tearDown();
	}

}
