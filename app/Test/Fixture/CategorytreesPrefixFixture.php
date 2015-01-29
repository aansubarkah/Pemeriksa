<?php

/**
 * CategorytreesPrefixFixture
 *
 */
class CategorytreesPrefixFixture extends CakeTestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
        'categorytree_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'prefix_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'position_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
            'categorytree_id' => 1,
            'prefix_id' => 1,
            'position_id' => 1,
            'active' => 1
        ),
    );

}
