<?php
/* -----------------------------------------------------------------------------------------
   VamCart - http://vamcart.com
   -----------------------------------------------------------------------------------------
   Copyright (c) 2011 VamSoft Ltd.
   License - http://vamcart.com/license.html
   ---------------------------------------------------------------------------------------*/

$html->script(array(
	'jquery/plugins/ui.core.js',
	'jquery/plugins/ui.tabs.js',
	'tabs.js'
), array('inline' => false));

	echo $html->css('ui.tabs', null, array('inline' => false));

	echo $admin->ShowPageHeaderStart(__('Home',true), 'home.png');

	echo $admin->StartTabs();
			echo '<ul>';
			echo $admin->CreateTab('home',__('Menu',true), 'menu.png');
			echo $admin->CreateTab('orders',__('Orders',true), 'orders.png');			
			echo '</ul>';
	
	echo $admin->StartTabContent('home');

			// If we're on the top level then assign the rest of the elements as menu children
			if($level == 1)
			{
				$tmp_navigation = array();
			
				$navigation[1] = null; // Removes the home page from being displayed below
				
				foreach($navigation AS $tmp_nav)
				{
					if(!empty($tmp_nav))
						$tmp_navigation[$level]['children'][] = $tmp_nav;
				}
				$navigation = $tmp_navigation;
			
			}
			
			if(!empty($navigation[$level]['children']))
			{
				$level_navigation = $navigation[$level]['children'];
				foreach($level_navigation AS $nav)
				{
					echo '<div class="page_menu_item" class="">
							<p class="heading">' . $admin->MenuLink($nav) . '</p>';
					if(!empty($nav['children']))
					{
						$sub_items = '';
						foreach($nav['children'] AS $child)
						{
							$sub_items .= $admin->MenuLink($child) . ', ';
						}
						$sub_items = rtrim($sub_items, ', ');
						echo $sub_items;
					}
					echo '</div>';
				}
			}

		echo $admin->EndTabContent();

		echo $admin->StartTabContent('orders');

			echo $flashChart->begin(); 

			$flashChart->setTitle(__('Orders', true),'{color:#000;font-size:18px;}');
			$flashChart->setData(array(1,2,4,8,16,32,45,54,68,82),'{n}',false,'Apples');		
			$flashChart->setData(array(3,4,6,9,13,18,24,31,39,48),'{n}',false,'Oranges');
			$flashChart->axis('y',array('range' => array(0,100,10)));
			echo $flashChart->chart('bar',array('colour'=>'#ff9900'),'Apples');
			echo $flashChart->chart('line',array('colour'=>'#0077cc','width'=>'2'),'Oranges');	
			echo $flashChart->render('100%','300');
	
		echo $admin->EndTabContent();

	echo $admin->EndTabs();
	
	echo $admin->ShowPageHeaderEnd();
	
?>