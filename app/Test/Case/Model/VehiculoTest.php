<?php
App::uses('Vehiculo', 'Model');

/**
 * Vehiculo Test Case
 *
 */
class VehiculoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.vehiculo',
		'app.creator',
		'app.modifier',
		'app.cita',
		'app.andene',
		'app.calendario',
		'app.bloqueo',
		'app.calendario_horario',
		'app.horario',
		'app.user',
		'app.flujocita'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Vehiculo = ClassRegistry::init('Vehiculo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Vehiculo);

		parent::tearDown();
	}

}
