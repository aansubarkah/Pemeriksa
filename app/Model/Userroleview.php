<?php
App::uses('AppModel', 'Model');

/**
 * Userroleview Model
 *
 * @property Role $Role
 * @property User $User
 */
class Userroleview extends AppModel
{

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
        'Role' => array(
            'className' => 'Role',
            'foreignKey' => 'role_id',
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

    /*public function asDate($userArr = array(), $date = null)
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

        $data = $this->find('all', array(
            'recursive' => -1,
            'conditions' => array(
                'Userroleview.user_id' => $userArr,
                'Userroleview.active' => true,
                'Userroleview.start <' => $date,
                'Userroleview.end >' => $date
            ),
            'fields' => array('Userroleview.rolename'),
            'group' => array('Userroleview.role_id'),
            'order' => array('Userroleview.role_id ASC')
        ));

        if (empty($data)) {
            $data = $this->find('all', array(
                'recursive' => -1,
                'conditions' => array(
                    'Userroleview.user_id' => $userArr,
                    'Userroleview.active' => true,
                    'Userroleview.end' => null
                ),
                'fields' => array('Userroleview.rolename'),
                'group' => array('Userroleview.role_id'),
                'order' => array('Userroleview.role_id ASC')
            ));
        }

        return $data;
    }*/
}
