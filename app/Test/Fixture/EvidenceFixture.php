<?php

/**
 * EvidenceFixture
 *
 */
class EvidenceFixture extends CakeTestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
        'name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
        'type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'uploader_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'active' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1)
        ),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM')
    );

    /**
     * Records
     *
     * @var array
     */
    public $records = array(
        array(
            'id' => '',
            'name' => 'Lorem ipsum dolor sit amet',
            'type_id' => 1,
            'uploader_id' => 1,
            'active' => 1
        ),
    );

}
