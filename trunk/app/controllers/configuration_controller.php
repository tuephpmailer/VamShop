<?php
/* -----------------------------------------------------------------------------------------
   VamCart - http://vamcart.com
   -----------------------------------------------------------------------------------------
   Copyright (c) 2011 VamSoft Ltd.
   License - http://vamcart.com/license.html
   ---------------------------------------------------------------------------------------*/

class ConfigurationController extends AppController {
	var $name = 'Configuration';
	
	function admin_clear_cache ()
	{
		Cache::clear();
		$this->Session->setFlash(__('Cache cleared.',true));
		$this->redirect('/configuration/admin_edit/');
	}
	
	function admin_edit ()
	{
		$this->set('current_crumb', __('Store Configuration', true));
		$this->set('title_for_layout', __('Store Configuration', true));
		if(!empty($this->data))
		{
			if(isset($this->params['form']['cancelbutton']))
			{
				$this->redirect('/admin/admin_top/5/');
				die();
			}
						
			foreach($this->data['Configuration'] AS $key => $value)
			{
				$current_config = $this->Configuration->find(array('key' => $key));
				$current_config['Configuration']['value'] = $value;
				$this->Configuration->save($current_config);
			}
			$this->Session->setFlash(__('Record saved.', true));
		}
		
		// Grab all configration values then loop through and set the array key to the database key
		$configuration_values = $this->Configuration->find('all');
		$keyed_config_values = array();
		foreach($configuration_values AS $key => $value)
		{
			$array_key = $value['Configuration']['key'];
			$keyed_config_values[$array_key] = $value['Configuration'];
		}

		$this->set('configuration_values',$keyed_config_values);
	}
}
?>