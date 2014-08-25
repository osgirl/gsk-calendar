<?php
App::uses('AppModel', 'Model');
/**
 * CalendarioHorario Model
 *
 * @property Calendario $Calendario
 * @property Horario $Horario
 */
class CalendarioHorario extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Calendario' => array(
			'className' => 'Calendario',
			'foreignKey' => 'calendario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Horario' => array(
			'className' => 'Horario',
			'foreignKey' => 'horario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
