<?php

/**
 * SimplecategorytreeprefixviewFixture
 *
 */
class SimplecategorytreeprefixviewFixture extends CakeTestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false, 'key' => 'primary'),
        'categorytree_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'prefix_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'position_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'active' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
        'prefix' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
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
            'categorytree_id' => 1,
            'prefix_id' => 1,
            'position_id' => 1,
            'active' => 1,
            'prefix' => 'Lorem ipsum dolor sit amet',
            'position' => 'Lorem ipsum dolor sit amet'
        ),
    );

}
