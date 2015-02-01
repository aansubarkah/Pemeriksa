<?php
App::uses('UsersPositionlevel', 'Model');

/**
 * UsersPositionlevel Test Case
 *
 */
class UsersPositionlevelTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.users_positionlevel',
		'app.user',
		'app.group',
		'app.chief',
		'app.departement',
		'app.chiefs_departement',
		'app.departements_user',
		'app.evaluation',
		'app.period',
		'app.users_period',
		'app.categorytree',
		'app.category',
		'app.categorytreeprefixview',
		'app.categorytreeparent',
		'app.categorytreeposition',
		'app.prefixposition',
		'app.simplecategorytreeview',
		'app.position',
		'app.categorytreecategoryview',
		'app.categorytrees_prefix',
		'app.prefix',
		'app.simplecategorytreeprefixview',
		'app.positionlevel',
		'app.categorytrees_value',
		'app.size',
		'app.users_position',
		'app.activity',
		'app.transaction',
		'app.activities_user',
		'app.uploader',
		'app.evidence',
		'app.type',
		'app.education',
		'app.educations_user',
		'app.level',
		'app.levels_user',
		'app.role',
		'app.roles_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UsersPositionlevel = ClassRegistry::init('UsersPositionlevel');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UsersPositionlevel);

		parent::tearDown();
	}

}