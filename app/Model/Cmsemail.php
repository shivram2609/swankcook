<?php
App::uses('AppModel', 'Model');
/**
 * Cmsemail Model
 *
 */
class Cmsemail extends AppModel {
	
	var $validate = array (
		"subject"=>array(
			"rule"=>"notempty",
			"message"=>"Please enter subject."
		),
		"emailfrom"=>array(
			"rule"=>"notempty",
			"message"=>"Please enter from email."
		),
		"content"=>array(
			"rule"=>"notempty",
			"message"=>"Please enter email content."
		),
	);

}
