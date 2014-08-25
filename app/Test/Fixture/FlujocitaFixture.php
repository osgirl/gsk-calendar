<?php
/**
 * FlujocitaFixture
 *
 */
class FlujocitaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'cita_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'startdate' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'enddate' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'creator_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'cita_id' => 1,
			'user_id' => 1,
			'startdate' => '2014-08-25 11:17:29',
			'enddate' => '2014-08-25 11:17:29',
			'creator_id' => 1,
			'created' => '2014-08-25 11:17:29'
		),
	);

}
