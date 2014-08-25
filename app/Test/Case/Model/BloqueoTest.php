<?php
App::uses('Bloqueo', 'Model');

/**
 * Bloqueo Test Case
 *
 */
class BloqueoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bloqueo',
		'app.calendario',
		'app.creator',
		'app.modifier'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Bloqueo = ClassRegistry::init('Bloqueo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Bloqueo);

		parent::tearDown();
	}

}
