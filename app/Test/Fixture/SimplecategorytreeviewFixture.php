<?php

/**
 * SimplecategorytreeviewFixture
 *
 */
class SimplecategorytreeviewFixture extends CakeTestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false, 'key' => 'primary'),
        'parent_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
        'lft' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
        'rght' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
        'active' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
        'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
        'categorytree_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false),
        'category_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false),
        'position_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'position' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
        'indexes' => array(),
        'tableParameters' => array('comment' => 'VIEW')
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
            'active' => 1,
            'name' => 'Lorem ipsum dolor sit amet',
            'categorytree_id' => 1,
            'category_id' => 1,
            'position_id' => 1,
            'position' => 'Lorem ipsum dolor sit amet'
        ),
    );

}
