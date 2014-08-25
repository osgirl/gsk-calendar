<?php
App::uses('Component', 'Controller');


/**
 * Google API Client Component
 *
 * @property 
 */
class GoogleApiClientComponent extends Component {

	public $client_id;
	public $service_account_name;
	public $key_file_location;
	public $app_name;

	public $client;


	public function init( $auths = array() ) {

		$this->client_id = '657701673004-6ts079g1i7rdk8lv11lprolj20scmqmj.apps.googleusercontent.com';
		$this->service_account_name = '657701673004-6ts079g1i7rdk8lv11lprolj20scmqmj@developer.gserviceaccount.com';
		$this->key_file_location = TMP.'x325-dev-b44f6f1f655d.p12';
		$this->app_name = '657701673004-6ts079g1i7rdk8lv11lprolj20scmqmj.apps.googleusercontent.com';

		$this->client = new Google_Client();
		$this->client->setApplicationName($this->app_name);

		if (isset($_SESSION['service_token'])) {
		  $this->client->setAccessToken($_SESSION['service_token']);
		}
		$key = file_get_contents($this->key_file_location);
		$cred = new Google_Auth_AssertionCredentials(
		    $this->service_account_name,
		    $auths,
		    $key
		);
		$this->client->setAssertionCredentials($cred);
		if($this->client->getAuth()->isAccessTokenExpired()) {
		  $this->client->getAuth()->refreshTokenWithAssertion($cred);
		}
		$_SESSION['service_token'] = $this->client->getAccessToken();

		//return $this->client;

	}

	public function getClient() {
		return $this->client;
	}

}