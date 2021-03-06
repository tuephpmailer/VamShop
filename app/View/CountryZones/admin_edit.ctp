<?php
/* -----------------------------------------------------------------------------------------
   VamShop - http://vamshop.com
   -----------------------------------------------------------------------------------------
   Copyright (c) 2014 VamSoft Ltd.
   License - http://vamshop.com/license.html
   ---------------------------------------------------------------------------------------*/

$this->Html->script(array(
	'admin/modified.js',
	'admin/focus-first-input.js'
), array('inline' => false));

	echo $this->Admin->ShowPageHeaderStart($current_crumb, 'cus-application-edit');
	
	echo $this->Form->create('CountryZone', array('id' => 'contentform', 'url' => '/country_zones/admin_edit/' . $country_id));
		echo $this->Form->input('CountryZone.country_id', array(
				   		'type' => 'hidden',
						'value' => $country_id
	               ));
		echo $this->Form->input('CountryZone.id', array(
				   		'type' => 'hidden'
	               ));
		echo $this->Form->input('CountryZone.name', array(
				   		'label' => __('Name')
	               ));
		echo $this->Form->input('CountryZone.code', array(
				   		'label' => __('Code')
	               ));		   	   																									
	echo '<div class="clear"></div>';
	echo $this->Admin->formButton(__('Submit'), 'cus-tick', array('class' => 'btn btn-primary', 'type' => 'submit', 'name' => 'submit')) . $this->Admin->formButton(__('Cancel'), 'cus-cancel', array('class' => 'btn btn-default', 'type' => 'submit', 'name' => 'cancelbutton'));
	echo $this->Form->end();
	
	echo $this->Admin->ShowPageHeaderEnd();
	
	?>