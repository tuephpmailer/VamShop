<?php
/* -----------------------------------------------------------------------------------------
   VamShop - http://vamshop.com
   -----------------------------------------------------------------------------------------
   Copyright (c) 2014 VamSoft Ltd.
   License - http://vamshop.com/license.html
   ---------------------------------------------------------------------------------------*/
App::uses('Model', 'AppModel');
class AddressBook extends AppModel {
	public $name = 'AddressBook';
	
	public function _validationRules() 
	{
	//$this->validate = array(
		//'ship_name' => array(
			//'rule' => 'notBlank',
			//'message' => __('Name must only contain letters and numbers.', true)
		//),
		//'ship_line_1' => array(
			//'rule' => 'notBlank',
			//'message' => __('Address Line 1 must only contain letters and numbers.', true)
		//),
		//'ship_city' => array(
			//'rule' => 'notBlank',
			//'message' => __('City must only contain letters and numbers.', true)
		//),
		//'ship_state' => array(
			//'rule' => 'notBlank',
			//'message' => __('State must only contain letters and numbers.', true)
		//),
		//'ship_country' => array(
			//'rule' => 'notBlank',
			//'message' => __('Country must only contain letters and numbers.', true)
		//),
		//'ship_zip' => array(
			//'rule' => 'Numeric',
			//'required' => true,
			//'allowEmpty' => false,
			//'message' => __('Zipcode must only contain numbers.', true)
		//),
		//'phone' => array(
			//'rule' => 'Numeric',
			//'required' => true,
			//'allowEmpty' => false,
			//'message' => __('Phone must only contain numbers.', true)
		//),
	//);
	}

}