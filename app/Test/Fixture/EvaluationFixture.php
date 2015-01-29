<?php

/**
 * EvaluationFixture
 *
 */
class EvaluationFixture extends CakeTestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
        'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'period_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'value' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '20,3', 'unsigned' => false),
        'categorytree_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
            'user_id' => 1,
            'period_id' => 1,
            'value' => '',
            'categorytree_id' => 1,
            'active' => 1
        ),
    );

}
