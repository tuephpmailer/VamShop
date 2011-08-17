<?php
/* -----------------------------------------------------------------------------------------
   VamCart - http://vamcart.com
   -----------------------------------------------------------------------------------------
   Portions Copyright:
   Copyright 2007 by Kevin Grandon (kevingrandon@hotmail.com)
   -----------------------------------------------------------------------------------------
   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

echo $admin->ShowPageHeaderStart($current_crumb, 'import.png');

	echo $form->create('ImportExport', array('enctype' => 'multipart/form-data', 'id' => 'contentform', 'action' => '/import_export/import/', 'url' => '/import_export/import/'));

	echo $form->inputs(array(
					'legend' => null,
					'fieldset' => __('YML Import', true),
				   'ImportExport.submittedfile' => array(
				   	'type' => 'file',
				   	'label' => __('YML Import', true),
						'between'=>'<br />'
	               )
		 ));

	echo $admin->formButton(__('Submit', true), 'submit.png', array('type' => 'submit', 'name' => 'submit')) . $admin->formButton(__('Cancel', true), 'cancel.png', array('type' => 'reset', 'name' => 'cancel'));
	
	echo '<div class="clear"></div>';
	echo $form->end();

echo $admin->ShowPageHeaderEnd();

?>