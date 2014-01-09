<?php
/* -----------------------------------------------------------------------------------------
   VamShop - http://vamshop.com
   -----------------------------------------------------------------------------------------
   Copyright (c) 2014 VamSoft Ltd.
   License - http://vamshop.com/license.html
   ---------------------------------------------------------------------------------------*/
App::uses('Model', 'AppModel');
class OrderStatus extends AppModel {

	public $name = 'OrderStatus';
	public $hasMany = array('OrderStatusDescription' => array('dependent'     => true),'Order');

}
?>