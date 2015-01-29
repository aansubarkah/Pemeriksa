<?php

/**
 * CategorytreeFixture
 *
 */
class CategorytreeFixture extends CakeTestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
        'parent_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
        'lft' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
        'rght' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
        'category_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'position_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
            'parent_id' => 1,
            'lft' => 1,
            'rght' => 1,
            'category_id' => 1,
            'position_id' => 1,
            'active' => 1
        ),
    );

}
