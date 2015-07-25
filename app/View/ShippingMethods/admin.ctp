<?php
/* -----------------------------------------------------------------------------------------
   VamShop - http://vamshop.com
   -----------------------------------------------------------------------------------------
   Copyright (c) 2014 VamSoft Ltd.
   License - http://vamshop.com/license.html
   ---------------------------------------------------------------------------------------*/

echo $this->Admin->ShowPageHeaderStart($current_crumb, 'cus-box');

echo '<table class="contentTable">';

echo $this->Html->tableHeaders(array( __('Name'), __('Code'), __('Active'), __('Default'), __('Sort Order'), __('Action')));

foreach ($modules AS $module)
{

	if($module['installed'] == 0)
	{
		$action_button = $this->Admin->linkButton(__('Install'),'/shipping/' . $module['code'] . '/install/','cus-add',array('escape' => false, 'class' => 'btn btn-default'));
	}
	else
	{
		$action_button = $this->Admin->linkButton(__('Uninstall'),'/shipping/' . $module['code'] . '/uninstall/','cus-cancel',array('escape' => false, 'class' => 'btn btn-default'),__('Are you sure?'));
	}

	echo $this->Admin->TableCells(
		  array(
		  	(isset($module['id'])?$this->Html->link($module['name'],'/shipping_methods/admin_edit/' . $module['id']):$module['name']),
		  	$module['code'],
			array(($module['installed'] == 1?$this->Html->image('admin/icons/true.png', array('alt' => __('True'),'title' => __('True'))):$this->Html->image('admin/icons/false.png', array('alt' => __('False'),'title' => __('False')))), array('align'=>'center')),
			array((isset($module['id'])?$this->Admin->DefaultButton($module):''), array('align'=>'center')),
		  	array((isset($module['order'])?$module['order']:''), array('align'=>'center')),
			array($action_button, array('align'=>'center'))	
		   ));
	
}

echo '</table>';

echo $this->Admin->linkButton(__('Add module'), '/shipping_methods/admin_add/', 'cus-plugin-add', array('escape' => false, 'class' => 'btn btn-default'));

echo $this->Admin->ShowPageHeaderEnd();

?>