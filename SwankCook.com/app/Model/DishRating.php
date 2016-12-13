<?php
App::uses('AppModel', 'Model');
/**
 * DishRating Model
 *
 * @property Dish $Dish
 * @property User $User
 */
class DishRating extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Dish' => array(
			'className' => 'Dish',
			'foreignKey' => 'dish_id',
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
		)
	);
}
