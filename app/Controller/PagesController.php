<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    /**
     * This controller use Activity model
     *
     * @var array
     * @var Activity $Activity
     */
    public $uses = array('Activity', 'ActivitiesUser', 'Letteruserview');

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    //public $helpers = array('Time');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow();
    }

    /**
     * Displays a view
     *
     * @return void
     * @throws NotFoundException When the view file could not be found
     *    or MissingViewException in debug mode.
     */
    public function display()
    {
        $title_for_layout = 'Beranda';

        if ($this->Auth->loggedIn()) {
            $this->redirect(array(
                'controller' => 'activities',
                'action' => 'index'
            ));
            /*$this->view = 'display_user';
            $this->Paginator->settings = array(
                'recursive' => -1,
                'conditions' => array(
                    'Letteruserview.activityactive' => true,
                    'Letteruserview.user_id' => $this->Auth->user('id'),
                    'Letteruserview.activityusertagged' => true,
                    'Letteruserview.activitydraft' => false
                ),
                'limit' => 10,
                'order' => array('Letteruserview.date' => 'DESC')
            );

            $letters = $this->Paginator->paginate('Letteruserview');
            $this->set(compact('title_for_layout','letters'));*/
        } else {
            $this->Activity->unbindModel(
                array(
                    'hasAndBelongsToMany' => array('User'),
                    'belongsTo' => array('Categorytree'),
                    'hasMany' => array('ActivitiesUser', 'Transaction')
                )
            );

            $this->Paginator->settings = array(
                'conditions' => array(
                    'Activity.draft' => 0,
                    'Activity.active' => 1
                ),
                'limit' => 10,
                'order' => 'Activity.start DESC'
            );

            $activities = $this->Paginator->paginate('Activity');
            $this->set(compact('title_for_layout', 'activities'));
        }
    }

    public function register()
    {

    }
}