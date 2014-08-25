<?php
/**
 * BloqueoFixture
 *
 */
class BloqueoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'startdate' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'enddate' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'calendario_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'creator_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'modifier_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'startdate' => '2014-08-25 11:15:29',
			'enddate' => '2014-08-25 11:15:29',
			'calendario_id' => 1,
			'creator_id' => 1,
			'created' => 1408983329,
			'modifier_id' => 1,
			'modified' => '2014-08-25 11:15:29'
		),
	);

}
