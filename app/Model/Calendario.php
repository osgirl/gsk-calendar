<?php
App::uses('AppModel', 'Model');
/**
 * Calendario Model
 *
 * @property Andene $Andene
 * @property Bloqueo $Bloqueo
 * @property CalendarioHorario $CalendarioHorario
 */
class Calendario extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Andene' => array(
			'className' => 'Andene',
			'foreignKey' => 'calendario_id',
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
		'Bloqueo' => array(
			'className' => 'Bloqueo',
			'foreignKey' => 'calendario_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'CalendarioHorario' => array(
			'className' => 'CalendarioHorario',
			'foreignKey' => 'calendario_id',
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
