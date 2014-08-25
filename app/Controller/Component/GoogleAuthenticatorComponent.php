<?php
App::uses('Component', 'Controller');


/**
 * Google Authenticator Component
 *
 * @property 
 */
class GoogleAuthenticatorComponent extends Component {


	public function generateQRCode($secret = null) {
		$ga = new PHPGangsta_GoogleAuthenticator();

		$url = $ga->getQRCodeGoogleUrl('localhost', $secret);
		return $url;
	}

	public function generateSecret() {
		$ga = new PHPGangsta_GoogleAuthenticator();
		return $ga->createSecret();
	}


	public function verifyCode($secret = null, $oneCode = null, $number = null) {
		$ga = new PHPGangsta_GoogleAuthenticator();

		$checkResult = $ga->verifyCode($secret, $oneCode, $number);

		return $checkResult;

	}

}