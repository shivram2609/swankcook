<?php
App::uses('AppModel', 'Model');
/**
 * OrderStatus Model
 *
 * @property TrackOrder $TrackOrder
 */
class OrderStatus extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'TrackOrder' => array(
			'className' => 'TrackOrder',
			'foreignKey' => 'order_status_id',
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
