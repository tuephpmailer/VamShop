<?php
echo $this->Admin->ShowPageHeaderStart($current_crumb, 'cus-arrow-in');

echo $this->Form->create('Stylesheet', array('url' => '/stylesheets/admin_upload/', 'enctype' => 'multipart/form-data', 'id' => 'stylesheetImportForm'));
echo $this->Form->file('submittedfile');
echo $this->Admin->formButton(__('Submit'), 'cus-tick', array('class' => 'btn btn-primary', 'type' => 'submit', 'name' => 'submit'));
echo $this->Form->end(); 

echo $this->Admin->ShowPageHeaderEnd();