<?php
App::uses('Flujocita', 'Model');

/**
 * Flujocita Test Case
 *
 */
class FlujocitaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.flujocita',
		'app.cita',
		'app.andene',
		'app.calendario',
		'app.bloqueo',
		'app.creator',
		'app.modifier',
		'app.calendario_horario',
		'app.horario',
		'app.vehiculo',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Flujocita = ClassRegistry::init('Flujocita');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Flujocita);

		parent::tearDown();
	}

}
