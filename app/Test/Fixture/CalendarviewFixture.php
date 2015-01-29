<?php

/**
 * CalendarviewFixture
 *
 */
class CalendarviewFixture extends CakeTestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'id' => array('type' => 'biginteger', 'null' => false, 'default' => '0', 'unsigned' => false, 'key' => 'primary'),
        'activity_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => false),
        'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
        'tagged' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
        'active' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
        'activityname' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
        'activitydescription' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
        'start' => array('type' => 'date', 'null' => true, 'default' => null),
        'end' => array('type' => 'date', 'null' => true, 'default' => null),
        'uploader' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
        'activityactive' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
        'username' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
        'userfullname' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
        'useractive' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
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
            'id' => '',
            'activity_id' => '',
            'user_id' => 1,
            'tagged' => 1,
            'active' => 1,
            'activityname' => 'Lorem ipsum dolor sit amet',
            'activitydescription' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'start' => '2015-01-21',
            'end' => '2015-01-21',
            'uploader' => 1,
            'activityactive' => 1,
            'username' => 'Lorem ipsum dolor sit amet',
            'userfullname' => 'Lorem ipsum dolor sit amet',
            'useractive' => 1
        ),
    );

}
