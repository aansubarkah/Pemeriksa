<?php
App::uses('AppController', 'Controller');

/**
 * Calendarviews Controller
 *
 * @property Calendarview $Calendarview
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CalendarviewsController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

}
