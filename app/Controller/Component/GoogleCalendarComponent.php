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
		// 657701673004-6ts079g1i7rdk8lv11lprolj20scmqmj@developer.gserviceaccount.com

		// ab68bab2v3edo4qd94vlerggeo@group.calendar.google.com
		// Este es el nuevo calendario, el secundario.
		$acl = $this->service->acl->listAcl('primary');
		return $acl;
	}

	function create() {
		$newCalendar = new Google_Service_Calendar_Calendar();
		$newCalendar->setSummary('pruebaDeCalendarioSummary');
		$newCalendar->setTimeZone('America/Mexico_City');

		$createdCalendarId = $this->service->calendars->insert($newCalendar);

		debug( $createdCalendarId->getId() );
	}
}
