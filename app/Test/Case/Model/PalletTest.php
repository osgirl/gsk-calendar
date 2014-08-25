<?php
App::uses('Pallet', 'Model');

/**
 * Pallet Test Case
 *
 */
class PalletTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pallet',
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
		$this->Pallet = ClassRegistry::init('Pallet');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Pallet);

		parent::tearDown();
	}

}
