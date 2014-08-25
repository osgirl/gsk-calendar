<?php
App::uses('Andene', 'Model');

/**
 * Andene Test Case
 *
 */
class AndeneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.andene',
		'app.calendario',
		'app.creator',
		'app.modifier',
		'app.cita'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Andene = ClassRegistry::init('Andene');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Andene);

		parent::tearDown();
	}

}
