<?php
/* -----------------------------------------------------------------------------------------
   VamCart - http://vamcart.com
   -----------------------------------------------------------------------------------------
   Copyright (c) 2011 VamSoft Ltd.
   License - http://vamcart.com/license.html
   ---------------------------------------------------------------------------------------*/

echo $this->Form->inputs(array(
	'legend' => null,
	'robokassa.login' => array(
	'label' => __('Robokassa Login'),
	'type' => 'text',
	'value' => $data['PaymentMethodValue'][0]['value']
	),
	
	'robokassa.password1' => array(
	'label' => __('Robokassa Password 1'),
	'type' => 'text',
	'value' => $data['PaymentMethodValue'][1]['value']
	),

	'robokassa.password2' => array(
	'label' => __('Robokassa Password 2'),
	'type' => 'text',
	'value' => $data['PaymentMethodValue'][2]['value']
	)
	
));
?>