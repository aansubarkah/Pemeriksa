<?php

/**
 * ActivitiesUserFixture
 *
 */
class ActivitiesUserFixture extends CakeTestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
        'activity_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => false),
        'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'tagged' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
        'active' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1)
        ),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_bin', 'engine' => 'InnoDB')
    );

    /**
     * Records
     *
     * @var array
     */
    public $records = array(
        array(
            'id' => '',
            'activity_id' => '',
            'user_id' => 1,
            'tagged' => 1,
            'active' => 1
        ),
    );

}
