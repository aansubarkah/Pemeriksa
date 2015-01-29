<?php

/**
 * CategorytreecategoryviewFixture
 *
 */
class CategorytreecategoryviewFixture extends CakeTestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false, 'key' => 'primary'),
        'categorytreeparent_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
        'categorytreelft' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
        'categorytreerght' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
        'categorytree_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'position_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'active' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
        'categoryname' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
        'positionname' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
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
            'categorytreeparent_id' => 1,
            'categorytreelft' => 1,
            'categorytreerght' => 1,
            'categorytree_id' => 1,
            'position_id' => 1,
            'active' => 1,
            'categoryname' => 'Lorem ipsum dolor sit amet',
            'positionname' => 'Lorem ipsum dolor sit amet'
        ),
    );

}
