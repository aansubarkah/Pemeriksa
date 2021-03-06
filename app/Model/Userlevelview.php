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
            return $query;
        }

        return $results;
    }

    public function cust()
    {
        $data = $this->query("SELECT IFNULL((SELECT levelname FROM userlevelviews WHERE userlevelviews.user_id = 7 AND userlevelviews.end > '2015-7-01' AND '2015-7-01' > userlevelviews.start), (SELECT levelname FROM userlevelviews WHERE userlevelviews.user_id = 7 AND userlevelviews.end IS NULL));");

        return $data;
    }

    /**
     * @param array $userArr user_id
     * @param integer $letterDate letterDate
     */
    public function asLetterDate($userArr = array(), $letterDate = null)
    {
        $data = array();
        $i = 0;
        foreach($userArr as $user) {
            //level first
            $userLevel = $this->find('first', array(
                'recursive' => -1,
                'conditions' => array(
                    'Usercareerview.id' => $user,
                    'Usercareerview.levelactive' => true,
                    'Usercareerview.levelstart <' => $letterDate,
                    'Usercareerview.levelend >' => $letterDate
                )
            ));

            if(empty($userLevel)) {
                $userLevel = $this->find('first', array(
                    'recursive' => -1,
                    'conditions' => array(
                        'Usercareerview.id' => $user,
                        'Usercareerview.levelactive' => true,
                        'Usercareerview.levelend ' => null
                    )
                ));
            }

            $userRole = $this->find('first', array(
                'recursive' => -1,
                'conditions' => array(
                    'Usercareerview.id' => $user,
                    'Usercareerview.roleactive' => true,
                    'Usercareerview.rolestart <' => $letterDate,
                    'Usercareerview.roleend >' => $letterDate
                )
            ));

            if(empty($userRole)) {
                $userRole = $this->find('first', array(
                    'recursive' => -1,
                    'conditions' => array(
                        'Usercareerview.id' => $user,
                        'Usercareerview.roleactive' => true,
                        'Usercareerview.roleend' => null
                    )
                ));
            }

            $data[$i]['Usercareerview']['name'] = $userLevel['Usercareerview']['name'];
            $data[$i]['Usercareerview']['levelname'] = $userLevel['Usercareerview']['levelname'];
            $data[$i]['Usercareerview']['leveldescription'] = $userLevel['Usercareerview']['leveldescription'];
            $data[$i]['Usercareerview']['rolname'] = $userRole['Usercareerview']['rolename'];
            $data[$i]['Usercareerview']['roledescription'] = $userRole['Usercareerview']['roledescription'];
            $i++;
        }

        return $data;
    }
}
