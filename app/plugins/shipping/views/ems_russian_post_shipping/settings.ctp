<?php
/* -----------------------------------------------------------------------------------------
   VamCart - http://vamcart.com
   -----------------------------------------------------------------------------------------
   Portions Copyright:
   Copyright 2007 by Kevin Grandon (kevingrandon@hotmail.com)
   -----------------------------------------------------------------------------------------
   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

echo $form->inputs(array(
	'legend' => null,
	'key_values.city' => array(
		'label' => __('Store City',true), 
		'type' => 'text',
		'value' => $data['ShippingMethodValue'][0]['value']
	)
));

?>