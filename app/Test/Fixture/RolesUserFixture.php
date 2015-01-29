<?php

/**
 * RolesUserFixture
 *
 */
class RolesUserFixture extends CakeTestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
        'role_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'start' => array('type' => 'date', 'null' => false, 'default' => null),
        'end' => array('type' => 'date', 'null' => false, 'default' => null),
        'active' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1)
        ),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_bin', 'engine' => 'MyISAM')
    );

    /**
     * Records
     *
     * @var array
     */
    public $records = array(
        array(
            'id' => 1,
            'role_id' => 1,
            'user_id' => 1,
            'start' => '2015-01-16',
            'end' => '2015-01-16',
            'active' => 1
        ),
    );

}
