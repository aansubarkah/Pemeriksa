<?php
App::uses('AppModel', 'Model');

/**
 * Userlevelview Model
 *
 * @property Level $Level
 * @property User $User
 */
class Userlevelview extends AppModel
{

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';


    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Level' => array(
            'className' => 'Level',
            'foreignKey' => 'level_id',
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

    public $findMethods = array(
        'custom' => true
    );

    protected function _findCustom($state, $query, $results = array())
    {
        if ($state == 'before') {
            //$this->virtualFields['current'] = "ISNULL(levelname)";
            $this->virtualFields['current'] = "IFNULL((SELECT levelname FROM userlevelviews WHERE userlevelviews.user_id = 7 AND userlevelviews.end > '2015-7-01' AND '2015-7-01' > userlevelviews.start), (SELECT levelname FROM userlevelviews WHERE userlevelviews.user_id = 7 AND userlevelviews.end IS NULL))";
            $query['fields'] = array(
                $this->alias . '.' . $this->primaryKey,
                'current'
            );
            $query['conditions'] = array(
                'user_id = 7',
                'start <= \'2014-01-20\'',
                'end >= \'2014-01-20\''
            );

            //SELECT IFNULL((SELECT levelname FROM userlevelviews WHERE userlevelviews.user_id = 7 AND userlevelviews.end > '2015-7-01' AND '2015-7-01' > userlevelviews.start), (SELECT levelname FROM userlevelviews WHERE userlevelviews.user_id = 7 AND userlevelviews.end IS NULL))
            //$query['fields'] = "IFNULL((SELECT levelname FROM userlevelviews WHERE userlevelviews.user_id = 7 AND userlevelviews.end > '2015-7-01' AND '2015-7-01' > userlevelviews.start), (SELECT levelname FROM userlevelviews WHERE userlevelviews.user_id = 7 AND userlevelviews.end IS NULL))";
            /*$query['conditions'] = array(
                'user_id = 7'
            );*/


            return $query;
        }

        return $results;
    }

    public function cust()
    {
        $data = $this->query("SELECT IFNULL((SELECT levelname FROM userlevelviews WHERE userlevelviews.user_id = 7 AND userlevelviews.end > '2015-7-01' AND '2015-7-01' > userlevelviews.start), (SELECT levelname FROM userlevelviews WHERE userlevelviews.user_id = 7 AND userlevelviews.end IS NULL));");

        return $data;
    }
}
