<?php
/* -----------------------------------------------------------------------------------------
   VamCart - http://vamcart.com
   -----------------------------------------------------------------------------------------
   Portions Copyright:
   Copyright 2007 by Kevin Grandon (kevingrandon@hotmail.com)
   -----------------------------------------------------------------------------------------
   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

class SearchController extends AppController {
	var $name = 'Search';
	
	function admin_global_search ()
	{
		$this->set('current_crumb',__('Search Results',true));
		$this->set('title_for_layout', __('Search Results', true));
		
		$search_tables = $this->Search->find('all');
		$search_results = array();
		
		foreach($search_tables AS $key => $table)
		{
			$search_results[$key] = array();

			App::import('Model', $table['Search']['model']);
			$this->SearchModel =& new $table['Search']['model']();
			
			$search_conditions = array($table['Search']['model'] . '.' . $table['Search']['field'].' LIKE' => '%'.$this->data['Search']['term'].'%');
			
			$search_results[$key] = $this->SearchModel->find('all', array('conditions' => $search_conditions));
		}
		
		$this->set('tables',$search_tables);
		$this->set('results',$search_results);
		
	}
}
?>