<?php

/**
 * ChiefsDepartementFixture
 *
 */
class ChiefsDepartementFixture extends CakeTestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
        'chief_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'departement_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'start' => array('type' => 'date', 'null' => false, 'default' => null),
        'end' => array('type' => 'date', 'null' => true, 'default' => null),
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
            'chief_id' => 1,
            'departement_id' => 1,
            'start' => '2015-01-16',
            'end' => '2015-01-16',
            'active' => 1
        ),
    );

}
