<?php
App::uses('Component', 'Controller');

class GoogleDatastoreComponent extends Component {

	public $service;
	public $uses = null;
	public $dataset_id = "x325-dev";

	public $components = array('GoogleApiClient');

	function __construct(ComponentCollection $collection, $settings = array()) {
		parent::__construct($collection, $settings);

		$scopes = array('https://www.googleapis.com/auth/datastore',
					'https://www.googleapis.com/auth/userinfo.email');

		$this->GoogleApiClient->init($scopes);
		$this->service = new Google_Service_Datastore( $this->GoogleApiClient->getClient() );
	}

	function create_entity() {
		$entity = new Google_Service_Datastore_Entity();
		$entity->setKey($this->createKeyForTestItem());
		$string_prop = new Google_Service_Datastore_Property();
		$string_prop->setStringValue("Valor random ".rand());
		$property_map = [];
		$property_map["propiedad1"] = $string_prop;
		$entity->setProperties($property_map);
		return $entity;
	}

	function createKeyForTestItem() {
		$path = new Google_Service_Datastore_KeyPathElement();
		$path->setKind("criptest");
		$path->setName(rand());
		$key = new Google_Service_Datastore_Key();
		$key->setPath([$path]);
		return $key;
	}

	function create_request() {
		$entity = $this->create_entity();

		$mutation = new Google_Service_Datastore_Mutation();
		$mutation->setUpsert([$entity]);

		$req = new Google_Service_Datastore_CommitRequest();
		$req->setMode('NON_TRANSACTIONAL');
		$req->setMutation($mutation);
		return $req;
	}


	public function save( $entities = array() ) {
		
		$saveentities = array();

		foreach($entities as $entidad):
			$entity = new Google_Service_Datastore_Entity();

			$path = new Google_Service_Datastore_KeyPathElement();
			$path->setKind( $entidad['kind'] );
			//$path->setId( rand() );
			$key = new Google_Service_Datastore_Key();
			$key->setPath([$path]);

			$entity->setKey($key);

			$property_map = array();
			foreach($entidad['propiedades'] as $key => $value):
				//debug("Key: ".$key." Value: ".$value);
				$string_prop = new Google_Service_Datastore_Property();
				$string_prop->setIndexed(true);
				$string_prop->setStringValue( $value );
				
				$property_map[$key] = $string_prop;
				

			endforeach;

			$entity->setProperties($property_map);

			array_push($saveentities, $entity);

		endforeach;
		
		//debug($saveentities);

		$mutation = new Google_Service_Datastore_Mutation();
		//$mutation->setUpsert($saveentities);
		$mutation->setInsertAutoId($saveentities);

		$req = new Google_Service_Datastore_CommitRequest();
		$req->setMode('NON_TRANSACTIONAL');
		$req->setMutation($mutation);
		

		$service_dataset = $this->service->datasets;

		try {
			$service_dataset->commit($this->dataset_id, $req, []);
			return 1;
		}
		catch (Google_Exception $ex) {
			debug( $ex->getMessage() );
			syslog(LOG_WARNING, 'Commit to Cloud Datastore exception: ' . $ex->getMessage());
			echo "There was an issue -- check the logs.";
			return;
		}

	}

	public function guardadatastore() {
		//$this->autoRender=false;
		$service_dataset = $this->service->datasets;

		try {
			$req = $this->create_request();
			$service_dataset->commit($this->dataset_id, $req, []);
			return 1;
		}
		catch (Google_Exception $ex) {
			syslog(LOG_WARNING, 'Commit to Cloud Datastore exception: ' . $ex->getMessage());
			echo "There was an issue -- check the logs.";
			return;
		}
	}

	public function find( $kind = null, $args = array(), $sorts = array() ) {
		$query_req = new Google_Service_Datastore_RunQueryRequest();
		//$fields = array();
		$values = array();
		$query_args = "";
		$queryString = "";
		$querySorts = " ORDER BY ";
		if( !empty($args) ) {
			$i = 1;
			foreach($args as $key => $value):

				$gqlArg = new Google_Service_Datastore_GqlQueryArg();
				$gqlValue = new Google_Service_Datastore_Value();
				$gqlValue->setStringValue($value);
				$gqlArg->setValue($gqlValue);

				if($i == 1) {
					$query_args .= " ".$key." = @".$i;
				} else {
					$query_args .= " AND ".$key." = @".$i;
				}

				//array_push($fields, $key);
				array_push($values, $gqlArg);
				$i++;
			endforeach;

			$queryString .= "select * from ".$kind." where".$query_args;
		} else {
			$queryString .= "select * from ".$kind;
		}

		if( !empty($sorts) ) {
			foreach($sorts as $sort):
				$querySorts .= $sort.",";
			endforeach;
			$querySorts = trim($querySorts, ",")." ASC";

			$queryString .= $querySorts;
		}

		debug($queryString);

		$queryGql = static::createGqlQuery($queryString);
		$queryGql->setNumberArgs($values);
		$query_req->setGqlQuery($queryGql);

		$response = $this->service->datasets->runQuery($this->dataset_id,$query_req);
		return $response;

	}

	public function traeDatastore($busca) {
		$query_req = new Google_Service_Datastore_RunQueryRequest();

		//*
		//GQL

		$gqlArg = new Google_Service_Datastore_GqlQueryArg();
		$gqlValue = new Google_Service_Datastore_Value();
		$gqlValue->setStringValue("39");
		//$gqlArg->setName("prop");
		$gqlArg->setValue($gqlValue);
		$queryString = "select * from " . $busca . " where empresa_id = @1";

		$queryGql = static::createGqlQuery($queryString);
		$queryGql->setNumberArgs([$gqlArg]);
		$query_req->setGqlQuery($queryGql);

		//*/

		/*
		//Datastore Query

		$query= $this->createQuery($busca);
		$query_req->setQuery($query);

		//*/

		$response = $this->service->datasets->runQuery($this->dataset_id,$query_req);
		//$result = static::extractQueryResults($response['batch']['entityResults']);
		return $response;
	}


	public function getFoldersBase($empresaid = null) {
		$query_req = new Google_Service_Datastore_RunQueryRequest();

		$gqlArg = new Google_Service_Datastore_GqlQueryArg();
		$gqlValue = new Google_Service_Datastore_Value();
		$gqlValue->setStringValue($empresaid);
		$gqlArg->setValue($gqlValue);
		$queryString = "select * from foldersBase where empresa_id = @1";

		$queryGql = static::createGqlQuery($queryString);
		$queryGql->setNumberArgs([$gqlArg]);
		//debug($queryGql);
		$query_req->setGqlQuery($queryGql);

		$response = $this->service->datasets->runQuery($this->dataset_id,$query_req);
		$result = static::extractQueryResultsArray($response['batch']['entityResults']);
		return $result;
	}

	public function getFoldersVirtuales($empresaid = null) {
		$query_req = new Google_Service_Datastore_RunQueryRequest();

		$gqlArg = new Google_Service_Datastore_GqlQueryArg();
		$gqlValue = new Google_Service_Datastore_Value();
		$gqlValue->setStringValue($empresaid);
		$gqlArg->setValue($gqlValue);
		$queryString = "select * from foldersVirtuales where empresa_id = @1";

		$queryGql = static::createGqlQuery($queryString);
		$queryGql->setNumberArgs([$gqlArg]);
		$query_req->setGqlQuery($queryGql);

		$response = $this->service->datasets->runQuery($this->dataset_id,$query_req);
		$result = static::extractQueryResultsArray($response['batch']['entityResults']);
		return $result;
	}

	protected static function createQuery($kind_name) {
		$query = new Google_Service_Datastore_Query();
		$kind = new Google_Service_Datastore_KindExpression();
		$kind->setName($kind_name);
		$query->setKinds([$kind]);
		return $query;
	}

	protected static function createGqlQuery($queryString) {
		$GqlQuery = new Google_Service_Datastore_GqlQuery();
		//$GqlQuery->setAllowLiteral(true);
		$GqlQuery->setQueryString($queryString);
		return $GqlQuery;
	}

	protected static function extractQueryResults($results) {
		$html = '';
		foreach($results as $result) {
			$kind = @$result['entity']['key']['path'][0]['kind'];
			$name = @$result['entity']['key']['path'][0]['name'];
			$props = $result['entity']['properties']['propiedad1']['stringValue'];

			$html.='<tr>';
			$html.='<td style="border:1px solid black; text-align:center;">'.$kind.'</td>';
			$html.='<td style="border:1px solid black; text-align:center;">'.$name.'</td>';
			$html.='<td style="border:1px solid black; text-align:center;"> Propiedad 1: '.$props.'</td>';
			$html.='</tr>';
		}
		return $html;
	}

	protected static function extractQueryResultsArray($results) {
		$data = array();
		$i = 0;
		foreach($results as $result) {
			/*
			if($i == 0) {
				$data['kind'] = @$result['entity']['key']['path'][0]['kind'];
				$data['id'] = @$result['entity']['key']['path'][0]['id'];
			}
			*/
			foreach($result['entity']['properties'] as $key => $value):
				$data[$i][$key] = $value['stringValue'];
			endforeach;
			$i++;
		}
		return $data;
	}
}
