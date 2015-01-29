<?php
App::uses('Calendarview', 'Model');

/**
 * Calendarview Test Case
 *
 */
class CalendarviewTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.calendarview',
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
		'app.departement',
		'app.chiefs_departement',
		'app.departements_user',
		'app.evaluation',
		'app.period',
		'app.transaction',
		'app.uploader',
		'app.evidence',
		'app.type',
		'app.activities_user',
		'app.comment',
		'app.education',
		'app.educations_user',
		'app.level',
		'app.levels_user',
		'app.role',
		'app.roles_user',
		'app.users_positionlevel',
		'app.users_position'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Calendarview = ClassRegistry::init('Calendarview');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Calendarview);

		parent::tearDown();
	}

}
