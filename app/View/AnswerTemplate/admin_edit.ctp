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

	echo $this->Form->create('AnswerTemplate', array('id' => 'contentform', 'url' => '/answer_template/admin_edit/' . $data['AnswerTemplate']['id']));
	echo $this->Form->input('AnswerTemplate.id', 
						array(
				   		'type' => 'hidden',
							'value' => $data['AnswerTemplate']['id']
	               ));
		
		echo $this->Form->input('AnswerTemplate.alias', 
						array(
   				   	'label' => __('Alias'),				   
   						'value' => $data['AnswerTemplate']['alias']
	               ));
	
			echo '<ul id="myTabLang" class="nav nav-tabs">';
	foreach($languages AS $language)
	{
			echo $this->Admin->CreateTab('language_'.$language['Language']['id'],$language['Language']['name'],'cus-page-white');
	}
			echo '</ul>';

	echo $this->Admin->StartTabs();
	
	foreach($languages AS $language)
	{
		$language_key = $language['Language']['id'];
		
		echo $this->Admin->StartTabContent('language_'.$language_key);
		
	   	echo $this->Form->input('AnswerTemplateDescription.' . $language['Language']['id'].'.name', 
	   				array(
				   		'label' => $this->Admin->ShowFlag($language['Language']) . '&nbsp;' . __('Name'),
							'value' => $data['AnswerTemplateDescription'][$language_key]['name']
	            	  ));
		echo $this->Form->input('AnswerTemplateDescription.' . $language['Language']['id'].'.content', 
					array(
			   		'label' => $this->Admin->ShowFlag($language['Language']) . '&nbsp;' . __('Content'),
						'type' => 'textarea',
						'class' => 'pagesmalltextarea',											
						'value' => $data['AnswerTemplateDescription'][$language_key]['content']
            	  ));
	
	echo $this->Admin->EndTabContent();
	
	}
	
	echo $this->Admin->EndTabs();
	
	echo '<div class="clear"></div>';
	echo $this->Admin->formButton(__('Submit'), 'cus-tick', array('class' => 'btn btn-primary', 'type' => 'submit', 'name' => 'submit')) . $this->Admin->formButton(__('Cancel'), 'cus-cancel', array('class' => 'btn btn-default', 'type' => 'submit', 'name' => 'cancelbutton'));
	echo $this->Form->end();
	
	echo $this->Admin->ShowPageHeaderEnd();
	
	?>