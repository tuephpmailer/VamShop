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

	echo $this->Admin->ShowPageHeaderStart($current_crumb, 'cus-group-edit');

	echo $this->Form->create('User', array('id' => 'contentform', 'url' => '/users/admin_user_account/'));
	echo $this->Form->input('User.id', 
						array(
				   		'type' => 'hidden'
	               ));
	echo $this->Form->input('User.username', 
						array(
				   		'label' => __('Username')
	               ));
	echo $this->Form->input('User.email', 
						array(
   				   	'label' => __('Email')
	               ));
	echo $this->Form->input('User.password', 
						array(
				   		'type' => 'password',
				   		'autocomplete' => 'off',
   				   	'label' => __('New Password')
	               ));
	echo $this->Form->input('User.confirm_password', 
						array(
				   		'type' => 'password',
				   		'autocomplete' => 'off',				   
   				   	'label' => __('Confirm Password')
	               ));
	echo '<div class="clear"></div>';
	echo $this->Admin->formButton(__('Submit'), 'cus-tick', array('class' => 'btn btn-primary', 'type' => 'submit', 'name' => 'submit')) . $this->Admin->formButton(__('Cancel'), 'cus-cancel', array('class' => 'btn btn-default', 'type' => 'submit', 'name' => 'cancelbutton'));
	echo $this->Form->end();
	
	echo $this->Admin->ShowPageHeaderEnd();
	
?>