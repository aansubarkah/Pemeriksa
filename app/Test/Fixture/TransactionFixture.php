<?php

/**
 * TransactionFixture
 *
 */
class TransactionFixture extends CakeTestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
        'activity_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'categorytree_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
        'value' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '20,3', 'unsigned' => false),
        'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
        'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
        'active' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1)
        ),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
    );

    /**
     * Records
     *
     * @var array
     */
    public $records = array(
        array(
            'id' => '',
            'activity_id' => 1,
            'categorytree_id' => 1,
            'name' => 'Lorem ipsum dolor sit amet',
            'value' => '',
            'user_id' => 1,
            'created' => '2015-01-16 19:22:47',
            'modified' => '2015-01-16 19:22:47',
            'active' => 1
        ),
    );

}
