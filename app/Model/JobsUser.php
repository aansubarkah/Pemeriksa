<?php
App::uses('AppModel', 'Model');

/**
 * JobsUser Model
 *
 * @property Job $Job
 * @property User $User
 */
class JobsUser extends AppModel
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
        'Job' => array(
            'className' => 'Job',
            'foreignKey' => 'job_id',
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

    /**
     * @param array $userArr user_id
     * @param integer $letterDate letterDate
     */
    public function asLetterDate($jobId = null, $letterDate = null)
    {
        $userData = $this->find('first', array(
            'recursive' => 0,
            'conditions' => array(
                'JobsUser.job_id' => $jobId,
                'JobsUser.start <' => $letterDate,
                'JobsUser.end >' => $letterDate,
                'JobsUser.active' => true
            )
        ));
        if (empty($userData)) {
            $userData = $this->find('first', array(
                'recursive' => 0,
                'conditions' => array(
                    'JobsUser.job_id' => $jobId,
                    'JobsUser.end' => null,
                    'JobsUser.active' => true
                )
            ));
        }
        /*$data = array(
            'name' => $userData['User']['name'],
            'number' => $userData['User']['number']
        );*/

        return $userData;
    }
}
