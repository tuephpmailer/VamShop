<?php
/* -----------------------------------------------------------------------------------------
   VamCart - http://vamcart.com
   Copyright 2011 David Lednik
   -----------------------------------------------------------------------------------------
   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

function smarty_function_product_pfq($params, &$smarty)
{
    global $content;
    if ($content['ContentProduct']['stock'] == -1)
    {
        return '';
    }

    echo __('Packet quantity', true) . ': ' . $content['ContentProduct']['pf'];
}

function smarty_help_function_product_pfq () {
	?>
	<h3><?php echo __('What does this tag do?') ?></h3>
	<p><?php echo __('Displays the product packet quantity.') ?></p>
	<h3><?php echo __('How do I use it?') ?></h3>
	<p><?php echo __('Just insert the tag into your template like:') ?> <code>{product_pfq}</code></p>
	<h3><?php echo __('What parameters does it take?') ?></h3>
	<ul>
		<li><em>(<?php echo __('None') ?>)</em></li>
	</ul>
	<?php
}

function smarty_about_function_product_pfq () {
	?>
	<p><?php echo __('Author: David Lednik &lt;david.lednik@gmail.com&gt;') ?></p>
	<p><?php echo __('Version:') ?> 0.1</p>
	<p>
	<?php echo __('Change History:') ?><br/>
	<?php echo __('None') ?>
	</p>
	<?php
}
?>