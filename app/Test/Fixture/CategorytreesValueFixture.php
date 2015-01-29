<?php

/**
 * CategorytreesValueFixture
 *
 */
class CategorytreesValueFixture extends CakeTestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
        'categorytree_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'positionlevel_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'value' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '20,3', 'unsigned' => false),
        'size_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
            'id' => 1,
            'categorytree_id' => 1,
            'positionlevel_id' => 1,
            'value' => '',
            'size_id' => 1,
            'active' => 1
        ),
    );

}
