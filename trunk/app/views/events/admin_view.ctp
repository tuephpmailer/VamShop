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

echo '<div class="page">';
echo '<h2>'.$admin->ShowPageHeader($current_crumb, 'events.png').'</h2>';
echo '<div class="pageContent">';

echo '<table class="contentTable">';

echo $html->tableHeaders(array(	__('Originator', true),__('Action', true)));

foreach ($event_handlers AS $handle)
{
	echo $admin->TableCells(
		  array(
				$handle['EventHandler']['originator'],
				array($handle['EventHandler']['action'], array('align'=>'center'))
		   ));
		   	
}

echo '</table>';
echo $admin->EmptyResults($event_handlers);

echo '</div>';
echo '</div>';

?>