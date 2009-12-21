<?php 
/* -----------------------------------------------------------------------------------------
   VaM Cart
   http://vamcart.com
   http://vamcart.ru
   Copyright 2009 VaM Cart
   -----------------------------------------------------------------------------------------
   Portions Copyright:
   Copyright 2007 by Kevin Grandon (kevingrandon@hotmail.com)
   -----------------------------------------------------------------------------------------
   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

class KvitanciaController extends PaymentAppController {
	var $uses = array('PaymentMethod', 'Order');
	var $helpers = array('Time');
	var $module_name = 'kvitancia';

	function settings ()
	{
		$this->set('data', $this->PaymentMethod->findByAlias($this->module_name));
	}

	function install()
	{
		$new_module = array();
		$new_module['PaymentMethod']['active'] = '1';
		$new_module['PaymentMethod']['default'] = '0';
		$new_module['PaymentMethod']['name'] = Inflector::humanize($this->module_name);
		$new_module['PaymentMethod']['alias'] = $this->module_name;

		$new_module['PaymentMethodValue'][0]['payment_method_id'] = $this->PaymentMethod->id;
		$new_module['PaymentMethodValue'][0]['key'] = 'bank_name';
		$new_module['PaymentMethodValue'][0]['value'] = '';

		$new_module['PaymentMethodValue'][1]['payment_method_id'] = $this->PaymentMethod->id;
		$new_module['PaymentMethodValue'][1]['key'] = 'bank_account1';
		$new_module['PaymentMethodValue'][1]['value'] = '';

		$new_module['PaymentMethodValue'][2]['payment_method_id'] = $this->PaymentMethod->id;
		$new_module['PaymentMethodValue'][2]['key'] = 'bik';
		$new_module['PaymentMethodValue'][2]['value'] = '';

		$new_module['PaymentMethodValue'][3]['payment_method_id'] = $this->PaymentMethod->id;
		$new_module['PaymentMethodValue'][3]['key'] = 'bank_account2';
		$new_module['PaymentMethodValue'][3]['value'] = '';

		$new_module['PaymentMethodValue'][4]['payment_method_id'] = $this->PaymentMethod->id;
		$new_module['PaymentMethodValue'][4]['key'] = 'inn';
		$new_module['PaymentMethodValue'][4]['value'] = '';

		$new_module['PaymentMethodValue'][5]['payment_method_id'] = $this->PaymentMethod->id;
		$new_module['PaymentMethodValue'][5]['key'] = 'recipient';
		$new_module['PaymentMethodValue'][5]['value'] = '';

		$new_module['PaymentMethodValue'][6]['payment_method_id'] = $this->PaymentMethod->id;
		$new_module['PaymentMethodValue'][6]['key'] = 'kpp';
		$new_module['PaymentMethodValue'][6]['value'] = '';

		$new_module['PaymentMethodValue'][7]['payment_method_id'] = $this->PaymentMethod->id;
		$new_module['PaymentMethodValue'][7]['key'] = 'payment_text';
		$new_module['PaymentMethodValue'][7]['value'] = '';

		$this->PaymentMethod->saveAll($new_module);

		$this->Session->setFlash(__('Module Installed', true));
		$this->redirect('/payment_methods/admin/');
	}

	function uninstall()
	{

		$module_id = $this->PaymentMethod->findByAlias($this->module_name);

		$this->PaymentMethod->del($module_id['PaymentMethod']['id'], true);
			
		$this->Session->setFlash(__('Module Uninstalled', true));
		$this->redirect('/payment_methods/admin/');
	}

	function before_process () 
	{
		$content = '
		<a class="button" href="http://'.$_SERVER['HTTP_HOST'] .  BASE . '/payment/kvitancia/print_order/' . $_SESSION['Customer']['order_id'] . '" target="_blank"><span>{lang}Print Order{/lang}</span></a><br />
		<form action="' . BASE . '/orders/place_order/" method="post">
		<span class="button"><button type="submit" value="{lang}Confirm Order{/lang}">{lang}Confirm Order{/lang}</button></span>
		</form>';
		return $content;	
	}

	function after_process()
	{
	}
	
	
	function print_order($id)
	{
		$this->layout = 'print';		
		$this->pageTitle = __('Order Number', true) . ': ' . $_SESSION['Customer']['order_id'];		
		
		$this->set('data', $this->Order->find('first', array('conditions' => array('Order.id' => $_SESSION['Customer']['order_id']))));
		$this->set('payment_data', $this->PaymentMethod->findByAlias($this->module_name));
		
	}
	
}

?>