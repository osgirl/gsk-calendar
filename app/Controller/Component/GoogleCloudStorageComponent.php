<?php
App::uses('Component', 'Controller');

require_once 'google/appengine/api/cloud_storage/CloudStorageTools.php';
use google\appengine\api\cloud_storage\CloudStorageTools;
/**
 * Google Cloud Storage Controller
 *
 * @property 
 */
class GoogleCloudStorageComponent extends Component {

	public $service;

	public $components = array('GoogleApiClient');

	function initialize(Controller $controller) {
		$this->cont = $controller;
	}

	function __construct(ComponentCollection $collection, $settings = array()) {
		parent::__construct($collection, $settings);

		$scopes = array('https://www.googleapis.com/auth/devstorage.full_control',
			'https://www.googleapis.com/auth/userinfo.email');

		$this->GoogleApiClient->init($scopes);
		$this->service = new Google_Service_Storage( $this->GoogleApiClient->getClient() );

	}

	/**
	 * Is called after the controller’s beforeFilter method but before the controller executes the current action handler.
	 *
	 * @return void
	 */
	/*
	public function startup(Controller $controller) {

		foreach ($this->components as $component_name) {
	        App::import('Component', $component_name);
	        $component_class = "{$component_name}Component";
	        $this->$component_name = new $component_class();
	        $this->$component_name->startup($this);
    	}

		$client_id = '657701673004-6ts079g1i7rdk8lv11lprolj20scmqmj.apps.googleusercontent.com';
		$service_account_name = '657701673004-6ts079g1i7rdk8lv11lprolj20scmqmj@developer.gserviceaccount.com';
		$key_file_location = TMP.'x325-dev-b44f6f1f655d.p12';

		$this->client = new Google_Client();
		$this->client->setApplicationName("657701673004-6ts079g1i7rdk8lv11lprolj20scmqmj.apps.googleusercontent.com");
		

		if (isset($_SESSION['service_token'])) {
		  $this->client->setAccessToken($_SESSION['service_token']);
		}
		$key = file_get_contents($key_file_location);
		$cred = new Google_Auth_AssertionCredentials(
		    $service_account_name,
		    array(
		    	'https://www.googleapis.com/auth/devstorage.full_control'
		    	),
		    $key
		);
		$this->client->setAssertionCredentials($cred);
		if($this->client->getAuth()->isAccessTokenExpired()) {
		  $this->client->getAuth()->refreshTokenWithAssertion($cred);
		}
		$_SESSION['service_token'] = $this->client->getAccessToken();
		

	}
	*/
	

/**
 * create_url method
 *
 * @return Google Cloud Storage URL
 */
	public function create_url($url = null) {
		// Google Cloud Storage Testing
  		$options = [ 'gs_bucket_name' => 'x325-test' ];
  		$upload_url = CloudStorageTools::createUploadUrl($url, $options);
		//debug($upload_url);
		return $upload_url;
	}


/**
 * uploadFiles method
 *
 * @return void
 */
	public function uploadFiles($idempresa = null, $path = null, $files = null) {

			//debug($files);
		/*
			$auths = array(
				'https://www.googleapis.com/auth/devstorage.full_control'
				);
			$this->GoogleApiClient->init($auths);
		*/

			foreach($files['file'] as $file):
				debug('Vamos a mover: '.$file['tmp_name'].' a: '.TMP.$path.$file['name'] );
				/* El archivo temporal que se guarda en GS, se mueve al destino solicitado de la empresa */
				move_uploaded_file($file['tmp_name'], TMP.$path.$file['name']);
			endforeach;

			//$this->service = new Google_Service_Storage( $this->GoogleApiClient->getClient() );

			//$results = $this->service->buckets->listBuckets(str_replace("s~", "", $_SERVER['APPLICATION_ID']));
			//debug($results);
			//$this->service->buckets->insert();


			// get image from Form
			/*
			//STACKOVERFLOW
			//http://stackoverflow.com/questions/22205432/how-do-i-upload-images-to-the-google-cloud-storage-from-php-form

			$gs_name = $_FILES["uploaded_files"]["tmp_name"]; 
			$fileType = $_FILES["uploaded_files"]["type"]; 
			$fileSize = $_FILES["uploaded_files"]["size"]; 
			$fileErrorMsg = $_FILES["uploaded_files"]["error"]; 
			$fileExt = pathinfo($_FILES['uploaded_files']['name'], PATHINFO_EXTENSION);

			// change name if you want
			$fileName = 'foo.jpg';

			// put to cloud storage
			$image = file_get_contents($gs_name);
			$options = [ "gs" => [ "Content-Type" => "image/jpeg"]];
			$ctx = stream_context_create($options);
			file_put_contents("gs://<bucketname>/".$fileName, $gs_name, 0, $ctx);

			// or move 
			$moveResult = move_uploaded_file($gs_name, 'gs://<bucketname>/'.$fileName); 
			*/

			/*
			$data = CloudStorageTools::serve(TMP.'empresa/test/10007404_656271557772305_1491234437_n.jpg', 
				['content_type' => 'binary/octet-stream']);
			*/
			/*
			$this->response->header(array(
			    'WWW-Authenticate: Negotiate',
			    'Content-type: binary/octet-stream'
			));
			*/

			//debug(TMP.'empresa/test/10007404_656271557772305_1491234437_n.jpg');
			/*
			$this->response->file(file_get_contents(TMP.'empresa/test/10007404_656271557772305_1491234437_n.jpg'),
				array('download' => true, 'name' => 'imagen.jpg')
				);

			return $this->response;
			*/

			//$bucketsAccessControls = $this->service->bucketAccessControls->listBucketAccessControls('x325-test');
			/*
			* Con el delimiter y prefix puedes sacar la lista de objetos de cierto Path en el storage.
			*/
			
			//$opts = array('delimiter' => '/', 'prefix' => 'empresa/test/');
			//$bucketsObjects = $this->service->objects->listObjects('x325-test', $opts);
			//debug($bucketsObjects);
	}


}

?>