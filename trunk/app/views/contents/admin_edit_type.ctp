<?php
/* -----------------------------------------------------------------------------------------
   VamCart - http://vamcart.com
   -----------------------------------------------------------------------------------------
   Copyright (c) 2011 VamSoft Ltd.
   License - http://vamcart.com/license.html
   ---------------------------------------------------------------------------------------*/
switch($content_type_id) {
	case '1':
		echo $form->inputs(array(
			'legend' => false,
			'fieldset' => false,
			'ContentCategory.extra' => array(
				'type' => 'hidden',
				'value' => 1
			)
		));
		break;
	case '2':
	default:
		$tax_options = $this->requestAction('/contents/generate_tax_list/');

		echo $validation->bind('ContentProduct', array('form' => '#contentform', 'messageId' => 'messages'));

		echo $form->inputs(array(
			'legend' => false,
			'fieldset' => false,
			'ContentProduct.price' => array(
				'label' => __('Price', true),
				'type' => 'text',
				'value' => !isset($data['ContentProduct']['price'])? 0 : $data['ContentProduct']['price']
			),
      //     'ContentProduct.moq' => array(
   	//	'label' => __('Minimum order quantity', true),
		//'type' => 'text',
		//'value' => !isset($data['ContentProduct']['moq'])? 0 : $data['ContentProduct']['moq']
	   //),
      //     'ContentProduct.pf' => array(
   	//	'label' => __('Packet quantity', true),
		//'type' => 'text',
		//'value' => !isset($data['ContentProduct']['pf'])? 0 : $data['ContentProduct']['pf']
	   //),
			'ContentProduct.tax_id' => array(
				'label' => __('Tax Class', true),
				'type' => 'select',
				'options' => $tax_options,
				'selected' => $data['ContentProduct']['tax_id']
			),
			'ContentProduct.stock' => array(
				'label' => __('Stock', true),
				'type' => 'text',
				'value' => !isset($data['ContentProduct']['stock'])? 0 : $data['ContentProduct']['stock']
			),
			'ContentProduct.model' => array(
				'label' => __('Model', true),
				'type' => 'text',
				'value' => $data['ContentProduct']['model']
			),
			'ContentProduct.weight' => array(
				'label' => __('Weight', true),
				'type' => 'text',
				'value' => !isset($data['ContentProduct']['weight'])? 0 : $data['ContentProduct']['weight']
			)
		));
		break;
	case '3':
		echo $form->inputs(array(
			'legend' => false,
			'fieldset' => false,
			'ContentPage.extra' => array(
				'type' => 'hidden',
				'value' => 1
			)
		));
		break;
	case '4':
		echo $form->inputs(array(
			'legend' => false,
			'fieldset' => false,
			'ContentLink.url' => array(
				'type' => 'text',
				'label' => __('URL', true),
				'value' => $data['ContentLink']['url']
			)
		));
		break;
	case '5':
		echo $form->inputs(array(
			'legend' => false,
			'fieldset' => false,
			'ContentNews.extra' => array(
				'type' => 'hidden',
				'value' =>1
			)
		));
		break;
	case '6':
		echo $form->inputs(array(
			'legend' => false,
			'fieldset' => false,
			'ContentArticle.extra' => array(
				'type' => 'hidden',
				'value' => 1
			)
		));
		break;
	case '7':
		$tax_options = $this->requestAction('/contents/generate_tax_list/');
		$order_statuses = $this->requestAction('/contents/generate_order_statuses_list/');

		echo $validation->bind('ContentDownloadable', array('form' => '#contentform', 'messageId' => 'messages'));

		echo $form->inputs(array(
			'legend' => false,
			'fieldset' => false,
			'ContentDownloadable.price' => array(
				'label' => __('Price', true),
				'type' => 'text',
				'value' => !isset($data['ContentDownloadable']['price'])? 0 : $data['ContentDownloadable']['price']
			),
			'ContentDownloadable.tax_id' => array(
				'label' => __('Tax Class', true),
				'type' => 'select',
				'options' => $tax_options,
				'selected' => $data['ContentDownloadable']['tax_id']
			),
			'ContentDownloadable.order_status_id' => array(
				'label' => __('Required order status to download', true),
				'type' => 'select',
				'options' => $order_statuses,
				'selected' => $data['ContentDownloadable']['order_status_id']
			),
			'ContentDownloadable.model' => array(
				'label' => __('Model', true),
				'type' => 'text',
				'value' => $data['ContentDownloadable']['model']
			),
			'ContentDownloadable.file' => array(
				'label' => __('File: ', true) . $data['ContentDownloadable']['filename'],
				'type' => 'file',
				'value' => $data['ContentDownloadable']['filename']
			),
			'ContentDownloadable.delete' => array(
				'label' => __('delete ', true),
				'type' => 'checkbox'
			),
			'ContentDownloadable.max_downloads' => array(
				'label' => __('Max. downloads', true),
				'type' => 'text',
				'value' => $data['ContentDownloadable']['max_downloads']
			),
			'ContentDownloadable.max_days_for_download' => array(
				'label' => __('Days for download', true),
				'type' => 'text',
				'value' => $data['ContentDownloadable']['max_days_for_download']
			)
		));
		break;
}
