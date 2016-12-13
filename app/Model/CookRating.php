<?php
App::uses('AppModel', 'Model');
/**
 * CookRating Model
 *
 * @property Cook $Cook
 * @property User $User
 */
class CookRating extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Cook' => array(
			'className' => 'Cook',
			'foreignKey' => 'cook_id',
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
