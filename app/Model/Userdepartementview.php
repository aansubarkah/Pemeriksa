<?php
App::uses('AppModel', 'Model');
/**
 * Userdepartementview Model
 *
 * @property Departement $Departement
 * @property User $User
 */
class Userdepartementview extends AppModel {

	/*public $findMethods = array(
		'custom' => true
	);*/
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Departement' => array(
			'className' => 'Departement',
			'foreignKey' => 'departement_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	/*protected function _findCustom() {
		if($state == 'before') {
			$query['fields'] = array(
				$this->alias . '.' . $this->primaryKey,
				'levelname'
			);
		}
	}
	/*public function custom() {
		return $this->query("SELECT IFNULL((SELECT levelname FROM userlevelviews WHERE userlevelviews.user_id = 7 AND userlevelviews.end > '2011-7-01' AND '2011-7-01' > userlevelviews.start), (SELECT levelname FROM userlevelviews WHERE userlevelviews.user_id = 7 AND userlevelviews.end IS NULL))");
	}*/
}
