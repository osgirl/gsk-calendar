<?php
App::uses('CalendarioHorario', 'Model');

/**
 * CalendarioHorario Test Case
 *
 */
class CalendarioHorarioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.calendario_horario',
		'app.calendario',
		'app.horario'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CalendarioHorario = ClassRegistry::init('CalendarioHorario');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CalendarioHorario);

		parent::tearDown();
	}

}
