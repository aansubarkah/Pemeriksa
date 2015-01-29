<?php

/**
 * LetterFixture
 *
 */
class LetterFixture extends CakeTestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
        'activity_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => false),
        'type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'lettercategory_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
        'date' => array('type' => 'date', 'null' => false, 'default' => null),
        'uploader_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
            'type_id' => 1,
            'lettercategory_id' => 1,
            'name' => 'Lorem ipsum dolor sit amet',
            'date' => '2015-01-22',
            'uploader_id' => 1,
            'active' => 1
        ),
    );

}
