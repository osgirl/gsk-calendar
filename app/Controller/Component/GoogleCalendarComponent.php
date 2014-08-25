<?php
App::uses('Component', 'Controller');

class GoogleCalendarComponent extends Component {

	public $service;
	public $uses = null;

	public $components = array('GoogleApiClient');

	function __construct(ComponentCollection $collection, $settings = array()) {
		parent::__construct($collection, $settings);

		$scopes = array('https://www.googleapis.com/auth/calendar', 
			'https://www.googleapis.com/auth/userinfo.email');

		$this->GoogleApiClient->init($scopes);
		$this->service = new Google_Service_Calendar( $this->GoogleApiClient->getClient() );
	}

	function test() {
		$acl = $this->service->acl->listAcl('primary');
		return $acl;
	}
}
