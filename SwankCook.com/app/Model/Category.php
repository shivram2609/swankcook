<?php
App::uses('AppModel', 'Model');
/**
 * Category Model
 *
 * @property Dish $Dish
 */
class Category extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Dish' => array(
			'className' => 'Dish',
			'foreignKey' => 'category_id',
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
		"name"=> array (
			"rule"=>"notempty",
			"message"=> "please enter name of category."
		)
	);

}
