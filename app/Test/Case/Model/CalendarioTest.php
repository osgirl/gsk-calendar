<?php
App::uses('Calendario', 'Model');

/**
 * Calendario Test Case
 *
 */
class CalendarioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.calendario',
		'app.andene',
		'app.creator',
		'app.modifier',
		'app.cita',
		'app.bloqueo',
		'app.calendario_horario',
		'app.horario'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Calendario = ClassRegistry::init('Calendario');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Calendario);

		parent::tearDown();
	}

}
