<?php
/* -----------------------------------------------------------------------------------------
   VaM Shop
   http://vamshop.com
   http://vamshop.ru
   Copyright 2009 VaM Shop
   -----------------------------------------------------------------------------------------
   Portions Copyright:
   Copyright 2007 by Kevin Grandon (kevingrandon@hotmail.com)
   -----------------------------------------------------------------------------------------
   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

	$id = $this->data['MicroTemplate']['id'];
	echo $form->create('MicroTemplate', array('id' => 'contentform', 'action' => '/micro_templates/admin_edit/'.$id, 'url' => '/micro_templates/admin_edit/'.$id));
		
		echo $form->inputs(array(
					'fieldset' => __('Micro Template Details', true),
					'MicroTemplate.id' => array(
   				   		'type' => 'hidden'
	                ),  
					'MicroTemplate.alias' => array(
   				   		'label' => __('Alias', true)
	                ),
	                'MicroTemplate.tag_name' => array(
   				   		'label' => __('Tag Name', true)
	                ),
					'MicroTemplate.template' => array(
						'type' => 'textarea',
   				   		'label' => __('Template', true)
	                ),
				));

	echo $form->submit( __('Submit', true), array('name' => 'submit')) . $form->submit( __('Apply', true), array('name' => 'apply')) . $form->submit( __('Cancel', true), array('name' => 'cancel'));
	echo '<div class="clear"></div>';
	echo $form->end();
	?>
</div>