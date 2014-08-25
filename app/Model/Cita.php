<?php
App::uses('AppModel', 'Model');
/**
 * Cita Model
 *
 * @property Andene $Andene
 * @property Vehiculo $Vehiculo
 * @property User $User
 * @property Creator $Creator
 * @property Modifier $Modifier
 * @property Flujocita $Flujocita
 */
class Cita extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Andene' => array(
			'className' => 'Andene',
			'foreignKey' => 'andene_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Vehiculo' => array(
			'className' => 'Vehiculo',
			'foreignKey' => 'vehiculo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Creator' => array(
			'className' => 'User',
			'foreignKey' => 'creator_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Modifier' => array(
			'className' => 'User',
			'foreignKey' => 'modifier_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Flujocita' => array(
			'className' => 'Flujocita',
			'foreignKey' => 'cita_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
