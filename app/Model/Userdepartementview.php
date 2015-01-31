<?php
App::uses('AppModel', 'Model');

/**
 * Userdepartementview Model
 *
 * @property Departement $Departement
 * @property User $User
 */
class Userdepartementview extends AppModel
{

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

    public function asDate($userArr = array(), $date = null)
    {
        $data = $this->find('all', array(
            'recursive' => -1,
            'conditions' => array(
                'Userdepartementview.user_id' => $userArr,
                'Userdepartementview.active' => true,
                'Userdepartementview.start <' => $date,
                'Userdepartementview.end >' => $date
            ),
            'fields' => array('Userdepartementview.departementdescription'),
            'group' => array('Userdepartementview.departement_id'),
            'order' => array('Userdepartementview.departementdescription ASC')
        ));

        if (empty($data)) {
            $data = $this->find('all', array(
                'recursive' => -1,
                'conditions' => array(
                    'Userdepartementview.user_id' => $userArr,
                    'Userdepartementview.active' => true,
                    'Userdepartementview.end' => null
                ),
                'fields' => array('Userdepartementview.departementdescription'),
                'group' => array('Userdepartementview.departement_id'),
                'order' => array('Userdepartementview.departementdescription ASC')
            ));
        }

        return $data;
    }
}