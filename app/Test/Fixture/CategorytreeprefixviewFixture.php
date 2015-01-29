<?php

/**
 * CategorytreeprefixviewFixture
 *
 */
class CategorytreeprefixviewFixture extends CakeTestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
        'categorytreeparent_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
        'categorytreelft' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
        'categorytreerght' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
        'category_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
        'categorytreeactive' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
        'categorytreeposition_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
        'prefixposition_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
        'categoryname' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
        'prefixname' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
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
            'category_id' => 1,
            'categorytreeactive' => 1,
            'categorytreeposition_id' => 1,
            'prefixposition_id' => 1,
            'categoryname' => 'Lorem ipsum dolor sit amet',
            'prefixname' => 'Lorem ipsum dolor sit amet'
        ),
    );

}
