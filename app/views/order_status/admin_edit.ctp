<?php
/* -----------------------------------------------------------------------------------------
   VamCart - http://vamcart.com
   -----------------------------------------------------------------------------------------
   Portions Copyright:
   Copyright 2007 by Kevin Grandon (kevingrandon@hotmail.com)
   -----------------------------------------------------------------------------------------
   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

$html->script(array(
	'modified.js',
	'jquery/jquery.min.js',
	'jquery/plugins/ui.core.js',
	'jquery/plugins/ui.tabs.js',
	'tabs.js',
	'focus-first-input.js'
), array('inline' => false));
	
	echo $html->css('ui.tabs', null, array('inline' => false));

	echo $admin->ShowPageHeaderStart($current_crumb, 'edit.png');

	echo $form->create('OrderStatus', array('id' => 'contentform', 'action' => '/order_status/admin_edit/' . $data['OrderStatus']['id'], 'url' => '/order_status/admin_edit/' . $data['OrderStatus']['id']));
	echo $form->inputs(array(
					'legend' => null,
					'fieldset' => __('Order Status Details', true),
				   'OrderStatus.id' => array(
				   		'type' => 'hidden',
						'value' => $data['OrderStatus']['id']
	               )
		 ));
	
	echo $admin->StartTabs();
			echo '<ul>';
	foreach($languages AS $language)
	{
			echo $admin->CreateTab('language_'.$language['Language']['id'],$language['Language']['name'],$language['Language']['iso_code_2'].'.png');
	}
			echo '</ul>';
			
	foreach($languages AS $language)
	{
		$language_key = $language['Language']['id'];
		
		echo $admin->StartTabContent('language_'.$language_key);
		
	   	echo $form->inputs(array(
						'legend' => null,
	   				'OrderStatusDescription.' . $language['Language']['id'] => array(
				   	'label' => $admin->ShowFlag($language['Language']) . '&nbsp;' . $language['Language']['name'],
						'value' => $data['OrderStatusDescription'][$language_key]['name']
	            	  ) 	   																									
				));
				
	echo $admin->EndTabContent();
	
	}
	
	echo $admin->EndTabs();
		
	echo $admin->formButton(__('Submit', true), 'submit.png', array('type' => 'submit', 'name' => 'submit')) . $admin->formButton(__('Cancel', true), 'cancel.png', array('type' => 'reset', 'name' => 'cancel'));
	echo '<div class="clear"></div>';
	echo $form->end();
	echo $admin->ShowPageHeaderEnd(); 
?>