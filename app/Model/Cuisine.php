<?php
App::uses('AppModel', 'Model');
/**
 * Cuisine Model
 *
 * @property Dish $Dish
 */
class Cuisine extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Dish' => array(
			'className' => 'Dish',
			'foreignKey' => 'cuisine_id',
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
		"type"=>array(
			"rule"=>"notempty",
			"message"=>"Please enter type of cuisine."
		)
	);

}
