<?php
App::uses('AppModel', 'Model');
/**
 * Andene Model
 *
 * @property Calendario $Calendario
 * @property Creator $Creator
 * @property Modifier $Modifier
 * @property Cita $Cita
 */
class Andene extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * model validation array
 *
 * @var array
 */
var $validate = array();
/**
 * UsetAuth component object
 *
 * @var object
 */
var $userAuth;

/**
 * model validation array
 *
 * @var array
 */
function addValidate() {
        $validate1 = array(
            'name'=> array(
                    'mustValid'=>array(
                            'rule' => array('notEmpty'),
                            'message'=> __('Por favor escriba un nombre'),
                            'last'=>true)
                    ),
            'description'=> array(
                    'mustValid'=>array(
                            'rule' => array('notEmpty'),
                            'message'=> __('Por favor escriba una descripcion'),
                            'last'=>true)
                    )
                );
        $this->validate=$validate1;
        return $this->validates();
}

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
		'Cita' => array(
			'className' => 'Cita',
			'foreignKey' => 'andene_id',
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
