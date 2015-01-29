<?php
App::uses('CategorytreesValue', 'Model');

/**
 * CategorytreesValue Test Case
 *
 */
class CategorytreesValueTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.categorytrees_value',
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
		'app.categorytrees_prefix',
		'app.positionlevel',
		'app.size'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CategorytreesValue = ClassRegistry::init('CategorytreesValue');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CategorytreesValue);

		parent::tearDown();
	}

}
