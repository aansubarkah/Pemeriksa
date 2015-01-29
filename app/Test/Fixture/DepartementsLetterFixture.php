<?php

/**
 * DepartementsLetterFixture
 *
 */
class DepartementsLetterFixture extends CakeTestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
        'departement_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'letter_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => false),
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
            'departement_id' => 1,
            'letter_id' => '',
            'active' => 1
        ),
    );

}
