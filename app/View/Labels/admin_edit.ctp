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

	echo $this->Admin->ShowPageHeaderStart($current_crumb, 'cus-tag-blue-edit');

	echo $this->Form->create('Label', array('id' => 'contentform', 'url' => '/labels/admin_edit/'));
	echo $this->Form->input('Label.id', 
						array(
				   		'type' => 'hidden'
	               ));
	echo $this->Form->input('Label.name', 
						array(
				   		'label' => __('Name')
	               ));
	echo $this->Form->input('Label.alias', 
						array(
   				   	'label' => __('Alias')
	               ));
	echo $this->Form->input('Label.html', 
						array(
				   		'label' => __('HTML'),
				   		'type' => 'textarea',
				   		'class' => 'pagesmalltextarea'
	               ));
	echo $this->Form->input('Label.sort_order', 
						array(
   				   	'label' => __('Sort Order')
	               ));
	echo '<div class="clear"></div>';
	echo $this->Admin->formButton(__('Submit'), 'cus-tick', array('class' => 'btn btn-primary', 'type' => 'submit', 'name' => 'submit')) . $this->Admin->formButton(__('Cancel'), 'cus-cancel', array('class' => 'btn btn-default', 'type' => 'submit', 'name' => 'cancelbutton'));
	echo $this->Form->end();
	echo $this->Admin->ShowPageHeaderEnd(); 
?>