<?php
App::uses('Userdepartementview', 'Model');

/**
 * Userdepartementview Test Case
 *
 */
class UserdepartementviewTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.userdepartementview',
		'app.departement',
		'app.departements_letter',
		'app.letter',
		'app.activity',
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
		'app.users_period',
		'app.user',
		'app.group',
		'app.chief',
		'app.chiefs_departement',
		'app.evaluation',
		'app.period',
		'app.transaction',
		'app.uploader',
		'app.evidence',
		'app.type',
		'app.activities_user',
		'app.duty',
		'app.comment',
		'app.calendarview',
		'app.usercareerview',
		'app.level',
		'app.levels_user',
		'app.role',
		'app.roles_user',
		'app.departements_user',
		'app.education',
		'app.educations_user',
		'app.users_positionlevel',
		'app.users_position',
		'app.lettercategory'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Userdepartementview = ClassRegistry::init('Userdepartementview');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Userdepartementview);

		parent::tearDown();
	}

}
