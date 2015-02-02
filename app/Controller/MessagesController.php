<?php
App::uses('AppController', 'Controller');

/**
 * Messages Controller
 *

 */
class MessagesController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

    /**
     * Breadcrumb for all
     *
     * @var array
     */
    private $breadCrumb = array(
        0 => array(
            'title' => 'Pesan',
            'controller' => 'messages',
            'action' => '/'
        )
    );

    public $uses = array();

    public function index() {

    }

    public function savingSuccess($message = null, $goToLink = null, $redirectLink = null) {
        $title_for_layout = 'Pesan';
        $breadCrumb = $this->breadCrumb;
        $breadCrumb[1] = array(
            'title' => 'Simpan Berhasil',
            'controller' => 'messages',
            'action' => 'savingSuccess'
        );

        $this->set(compact('title_for_layout', 'breadCrumb', 'message', 'goToLink', 'redirectLink'));
    }
}