<?php
/* -----------------------------------------------------------------------------------------
   VaM Cart
   http://vamcart.ru
   http://vamcart.com
   Copyright 2009 VaM Cart
   -----------------------------------------------------------------------------------------
   Portions Copyright:
   Copyright 2007 by Kevin Grandon (kevingrandon@hotmail.com)
   -----------------------------------------------------------------------------------------
   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

function smarty_function_module($params, &$smarty)
{
	if(!isset($params['alias']))
		return;
		
	// Make sure the module is still installed, if not exit
	App::import('Model', 'Module');
	$Module =& new Module();
	
	$this_module = $Module->find(array('alias' => $params['alias']));
	if(empty($this_module))
		return;
	
	// Do some error checking and null value handling
	if(!isset($params['action']))
		$params['action'] = 'default';
	
	if(!isset($params['controller']))
		$params['controller'] = 'action';
	

	
	App::import('Component', 'Smarty');
	$Smarty =& new SmartyComponent();
	
	
	$assignments = $Smarty->requestAction('/module_' . $params['alias'] . '/' . $params['controller'] . '/' . $params['action'] .'/');

	
	
	if(isset($params['template']))
	{
		App::import('Model', 'MicroTemplate');
			$MicroTemplate =& new MicroTemplate();
		
		$template = $MicroTemplate->find(array('alias' => $params['template']));
		$display_template = $template['MicroTemplate']['template'];
	}
	else
	{	
		$display_template = $Smarty->requestAction('/module_' . $params['alias'] . '/action/' . $params['action'],array('return'));
	}
			
	
	
	$Smarty->display($display_template,$assignments);
	


}

function smarty_help_function_module() {
	?>
	<h3><?php echo __('What does this tag do?') ?></h3>
	<p><?php echo __('Makes a call to the installed module.  If the module is not found, this does nothing.') ?></p>
	<p><?php echo __('See the specific module documentation for more information.') ?></p>
	<h3><?php echo __('What parameters does it take?') ?></h3>
	<ul>
		<li><em><?php echo __('(controller)') ?></em> - <?php echo __('Controller to call.  Defaults to action') ?>.</li>
		<li><em><?php echo __('(action)') ?></em> - <?php echo __('Method to call of the action controller.') ?></li>
		<li><em><?php echo __('(template)') ?></em> - <?php echo __('Overrides the module\'s default template for the action specified.') ?></li>
	</ul>	
	<?php
}

function smarty_about_function_module() {
	?>
	<p><?php echo __('Author: Kevin Grandon &lt;kevingrandon@hotmail.com&gt;') ?></p>
	<p><?php echo __('Version:') ?> 0.1</p>
	<p>
	<?php echo __('Change History:') ?><br/>
	<?php echo __('None') ?>
	</p>
	<?php
}
?>