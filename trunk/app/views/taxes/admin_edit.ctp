<?php
/* -----------------------------------------------------------------------------------------
   VaM Cart
   http://vamcart.com
   http://vamcart.ru
   Copyright 2009-2010 VaM Cart
   -----------------------------------------------------------------------------------------
   Portions Copyright:
   Copyright 2007 by Kevin Grandon (kevingrandon@hotmail.com)
   -----------------------------------------------------------------------------------------
   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

	echo $javascript->link('modified', false);

echo '<div class="page">';
echo '<h2>'.$admin->ShowPageHeader($current_crumb, 'edit.png').'</h2>';
echo '<div class="pageContent">';

	echo $form->create('Tax', array('id' => 'contentform', 'action' => '/taxes/admin_edit/', 'url' => '/taxes/admin_edit/'));
	echo $form->inputs(array(
					'legend' => null,
					'fieldset' => __('Tax Details', true),
				   'Tax.id' => array(
				   		'type' => 'hidden'
	               ),
	               'Tax.name' => array(
				   		'label' => __('Name', true)
	               )					     				   	   																									
			));
	echo $form->submit( __('Submit', true), array('name' => 'submit')) . $form->submit( __('Cancel', true), array('name' => 'cancel'));
	echo '<div class="clear"></div>';
	echo $form->end();
	
echo '</div>';
echo '</div>';
	
?>