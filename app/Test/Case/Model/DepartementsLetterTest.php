<?php
App::uses('DepartementsLetter', 'Model');

/**
 * DepartementsLetter Test Case
 *
 */
class DepartementsLetterTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.departements_letter',
		'app.departement',
		'app.chief',
		'app.user',
		'app.group',
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
		'app.users_positionlevel',
		'app.users_position',
		'app.activity',
		'app.transaction',
		'app.activities_user',
		'app.evidence',
		'app.type',
		'app.uploader',
		'app.calendarview',
		'app.comment',
		'app.departements_user',
		'app.education',
		'app.educations_user',
		'app.level',
		'app.levels_user',
		'app.role',
		'app.roles_user',
		'app.chiefs_departement',
		'app.letter'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DepartementsLetter = ClassRegistry::init('DepartementsLetter');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DepartementsLetter);

		parent::tearDown();
	}

}
