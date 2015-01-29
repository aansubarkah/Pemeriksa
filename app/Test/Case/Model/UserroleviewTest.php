<?php
App::uses('Userroleview', 'Model');

/**
 * Userroleview Test Case
 *
 */
class UserroleviewTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.userroleview',
		'app.role',
		'app.user',
		'app.group',
		'app.chief',
		'app.chiefs_departement',
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
		'app.period',
		'app.evaluation',
		'app.level',
		'app.levels_user',
		'app.users_positionlevel',
		'app.users_position',
		'app.transaction',
		'app.activities_user',
		'app.duty',
		'app.evidence',
		'app.type',
		'app.uploader',
		'app.calendarview',
		'app.lettercategory',
		'app.departements_user',
		'app.usercareerview',
		'app.userdepartementview',
		'app.comment',
		'app.userlevelview',
		'app.education',
		'app.educations_user',
		'app.roles_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Userroleview = ClassRegistry::init('Userroleview');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Userroleview);

		parent::tearDown();
	}

}
