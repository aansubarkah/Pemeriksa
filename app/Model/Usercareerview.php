<?php
App::uses('AppModel', 'Model');

/**
 * Usercareerview Model
 *
 * @property User $User
 * @property Level $Level
 * @property Role $Role
 * @property Departement $Departement
 */
class Usercareerview extends AppModel
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
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Level' => array(
            'className' => 'Level',
            'foreignKey' => 'level_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Role' => array(
            'className' => 'Role',
            'foreignKey' => 'role_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Departement' => array(
            'className' => 'Departement',
            'foreignKey' => 'departement_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * @param array $userArr user_id
     * @param integer $letterDate letterDate
     */
    public function asLetterDate($userArr = array(), $letterDate = null)
    {
        $data = array();
        $i = 0;
        foreach ($userArr as $user) {
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

            if (empty($userLevel)) {
                $userLevel = $this->find('first', array(
                    'recursive' => -1,
                    'conditions' => array(
                        'Usercareerview.id' => $user,
                        'Usercareerview.levelactive' => true,
                        'Usercareerview.levelend' => null
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

            if (empty($userRole)) {
                $userRole = $this->find('first', array(
                    'recursive' => -1,
                    'conditions' => array(
                        'Usercareerview.id' => $user,
                        'Usercareerview.roleactive' => true,
                        'Usercareerview.roleend' => null
                    )
                ));
            }

            if (!empty($userLevel) && !empty($userRole)) {
                $data[$i]['name'] = $userLevel['Usercareerview']['name'];
                $data[$i]['level_id'] = $userLevel['Usercareerview']['level_id'];
                $data[$i]['levelname'] = $userLevel['Usercareerview']['levelname'];
                $data[$i]['departementdescription'] = $userLevel['Usercareerview']['departementdescription'];
                $data[$i]['leveldescription'] = $userLevel['Usercareerview']['leveldescription'];
                $data[$i]['positionlevelname'] = $userLevel['Usercareerview']['positionlevelname'];
                $data[$i]['role_id'] = $userRole['Usercareerview']['role_id'];
                $data[$i]['rolename'] = $userRole['Usercareerview']['rolename'];
                $data[$i]['roledescription'] = $userRole['Usercareerview']['roledescription'];
                $i++;
            }
        }

        foreach ($data as $row) {
            foreach ($row as $key => $value) {
                ${$key}[] = $value;
            }
        }
        array_multisort($role_id, SORT_DESC, $level_id, SORT_DESC, $data);

        return $data;
    }
}
