<?php
App::uses('AppModel', 'Model');
/**
 * Flujocita Model
 *
 * @property Cita $Cita
 * @property User $User
 * @property Creator $Creator
 */
class Flujocita extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Cita' => array(
			'className' => 'Cita',
			'foreignKey' => 'cita_id',
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
		)
	);
}
