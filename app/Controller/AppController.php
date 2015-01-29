<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package        app.Controller
 * @link        http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    protected $groupAdmin = 1;
    protected $groupManager = 2;
    protected $groupUser = 3;

    protected $departementPerwakilan = 1;
    protected $departementSekretariat = 2;
    protected $departementSap1 = 3;
    protected $departementSap2 = 4;
    protected $departementSap3 = 5;
    protected $departementSap4 = 6;

    protected $letterSP2FormatNo = '/SP2/XVIII.JATIM/';

    protected $letterCategorySP2Expose = 1;

    protected $city = 'Sidoarjo';
    protected $monthInRoman = array(
        1 => 'I',
        2 => 'II',
        3 => 'III',
        4 => 'IV',
        5 => 'V',
        6 => 'VI',
        7 => 'VII',
        8 => 'VIII',
        9 => 'IX',
        10 => 'X',
        11 => 'XI',
        12 => 'XII'
    );

    protected $monthTranslation = array(
        1 => array(
            'roman' => 'I',
            'indonesianLong' => 'Januari'
        ),
        2 => array(
            'roman' => 'II',
            'indonesianLong' => 'Februari'
        ),
        3 => array(
            'roman' => 'III',
            'indonesianLong' => 'Maret'
        ),
        4 => array(
            'roman' => 'IV',
            'indonesianLong' => 'April'
        ),
        5 => array(
            'roman' => 'V',
            'indonesianLong' => 'Mei'
        ),
        6 => array(
            'roman' => 'VI',
            'indonesianLong' => 'Juni'
        ),
        7 => array(
            'roman' => 'VII',
            'indonesianLong' => 'Juli'
        ),
        8 => array(
            'roman' => 'VIII',
            'indonesianLong' => 'Agustus'
        ),
        9 => array(
            'roman' => 'IX',
            'indonesianLong' => 'September'
        ),
        10 => array(
            'roman' => 'X',
            'indonesianLong' => 'Oktober'
        ),
        11 => array(
            'roman' => 'XI',
            'indonesianLong' => 'November'
        ),
        12 => array(
            'roman' => 'XII',
            'indonesianLong' => 'Desember'
        )
    );

    public $helpers = array('Html', 'Form', 'Session');
    public $components = array(
        'RequestHandler',
        'Session',
        'DebugKit.Toolbar',
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            ),
            'logoutRedirect' => array(
                'controller' => 'pages',
                'action' => 'display',
                'home'
            )
            /*'loginRedirect' => array(
                'controller' => 'pages',
                'action' => 'display',
                'home'
            ),
            'logoutRedirect' => array(
                'controller' => 'pages',
                'action' => 'display',
                'home'
            ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            ),
            'authorize' => array('Controller'),
            /*'redirect' => array(
                'controller' => 'pages',
                'action' => 'display',
                'home'
            )*/
        )
    );

    public function isAuthorized($user)
    {
        //admin can access every action
        if (isset($user['group_id']) && $user['group_id'] == $this->groupAdmin) {
            return true;
        }
        return false;
    }

    public function beforeFilter()
    {
        $this->Auth->allow('view');

        if ($this->Auth->loggedIn()) {
            $this->layout = 'with-menu';
        }
    }
}