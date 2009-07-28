<?php 
/* -----------------------------------------------------------------------------------------
   VaM Shop
   http://vamshop.com
   http://vamshop.ru
   Copyright 2009 VaM Shop
   -----------------------------------------------------------------------------------------
   Portions Copyright:
   Copyright 2007 by Kevin Grandon (kevingrandon@hotmail.com)
   -----------------------------------------------------------------------------------------
   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

class AdminController extends ModuleAbandonedCartsAppController {
	var $helpers = array('Time','Admin');
	var $uses = null;

	function purge_old_carts()
	{
		App::import('Model', 'Order');
		$this->Order =& new Order();
		
		$old_carts = $this->Order->findAll(array('Order.order_status_id' => '0'));
		foreach($old_carts AS $cart)
		{
			$this->Order->del($cart, true);
		}
		$this->Session->setFlash(__('Abandoned carts have been purged.', true));
		$this->redirect('/module_abandoned_carts/admin/admin_index/');
	}

	function admin_index ()
	{
		App::import('Model', 'Order');
		$this->Order =& new Order();
			
		$this->set('current_crumb',__('Abandoned Carts', true));
		$this->set('data',$this->Order->findAll(array('Order.order_status_id' => '0')));
		
		$this->render('','admin');
	}

	function admin_help()
	{
		$this->render('','admin');
	}

}

?>