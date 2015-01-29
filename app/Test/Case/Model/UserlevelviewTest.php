<?php
App::uses('Userlevelview', 'Model');

/**
 * Userlevelview Test Case
 *
 */
class UserlevelviewTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.userlevelview',
		'app.level',
		'app.positionlevel',
		'app.position',
		'app.categorytreecategoryview',
		'app.categorytreeparent',
		'app.categorytree',
		'app.category',
		'app.categorytreeprefixview',
		'app.categorytreeposition',
		'app.prefixposition',
		'app.simplecategorytreeview',
		'app.activity',
		'app.transaction',
		'app.user',
		'app.group',
		'app.chief',
		'app.chiefs_departement',
		'app.departement',
		'app.departements_letter',
		'app.letter',
		'app.type',
		'app.evidence',
		'app.uploader',
		'app.lettercategory',
		'app.departements_user',
		'app.usercareerview',
		'app.role',
		'app.roles_user',
		'app.evaluation',
		'app.period',
		'app.users_period',
		'app.activities_user',
		'app.duty',
		'app.comment',
		'app.calendarview',
		'app.education',
		'app.educations_user',
		'app.levels_user',
		'app.users_positionlevel',
		'app.users_position',
		'app.simplecategorytreeprefixview',
		'app.prefix',
		'app.categorytrees_prefix',
		'app.categorytrees_value',
		'app.size'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Userlevelview = ClassRegistry::init('Userlevelview');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Userlevelview);

		parent::tearDown();
	}

}
