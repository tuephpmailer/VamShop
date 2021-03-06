<?php
/* -----------------------------------------------------------------------------------------
   VamShop - http://vamshop.com
   -----------------------------------------------------------------------------------------
   Copyright (c) 2014 VamSoft Ltd.
   License - http://vamshop.com/license.html
   ---------------------------------------------------------------------------------------*/

$search_form  = $this->Form->create('Search', array('url' => '/orders/admin_search/'));
$search_form .= $this->Form->input('Search.term',array('label' => __('Search'),'value' => __('Order Search'),"onblur" => "if(this.value=='') this.value=this.defaultValue;","onfocus" => "if(this.value==this.defaultValue) this.value='';"));
$search_form .= $this->Form->submit( __('Submit'));
$search_form .= $this->Form->end();

echo $this->Admin->ShowPageHeaderStart($current_crumb, 'cus-magnifier', $search_form);

echo $this->Form->create('Order', array('url' => '/orders/admin_modify_selected/'));

echo '<table class="contentTable">';

echo $this->Html->tableHeaders(array(__('Customer'),__('Order Number'),__('Total'), __('Date'), __('Status'), __('Action')));

foreach ($data AS $order)
{
	echo $this->Admin->TableCells(
		  array(
				$this->Html->link($order['Order']['bill_name'],'/orders/admin_view/' . $order['Order']['id']),
				$order['Order']['id'],
				$order['Order']['total'],
				$this->Time->i18nFormat($order['Order']['created'], "%e %b %Y, %H:%M"),
				$order_status_list[$order['OrderStatus']['id']],
				array($this->Admin->ActionButton('view','/orders/admin_view/' . $order['Order']['id'],__('View')) . $this->Admin->ActionButton('delete','/orders/admin_delete/' . $order['Order']['id'],__('Delete')), array('align'=>'center'))
		   ));
		   	
}
echo '</table>';
echo $this->Admin->EmptyResults($data);

echo '<table class="contentFooter">';
echo '<tr><td>';
echo $this->Admin->linkButton(__('New Order'),'/orders_edit/admin/','cus-cart-add',array('escape' => false, 'class' => 'btn btn-default'));
echo '</td>';
echo '<td>';
echo $this->Admin->ActionBar(array('delete'=>__('Delete'), 'change_status'=>__('Change Order Status'),), false);
echo $this->Form->end();
echo '</td></tr>';
echo '</table>';
?>
<table class="contentPagination">
	<tr>
		<td><?php echo $this->Paginator->numbers(array('separator'=>' - ')); ?></td>
	</tr>
</table>

<?php echo $this->Admin->ShowPageHeaderEnd(); ?>