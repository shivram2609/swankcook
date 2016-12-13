<?php
App::uses('AppModel', 'Model');
/**
 * Location Model
 *
 * @property UserDetail $UserDetail
 */
class Location extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'UserDetail' => array(
			'className' => 'UserDetail',
			'foreignKey' => 'location_id',
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
	
	var $validate = array (
		"name"=>array(
			"rule"=>"notempty",
			"message"=>"Please enter name of location."
		)
	);

}
