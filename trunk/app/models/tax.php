<?php
/* -----------------------------------------------------------------------------------------
   VamCart - http://vamcart.com
   -----------------------------------------------------------------------------------------
   Copyright (c) 2011 VamSoft Ltd.
   License - http://vamcart.com/license.html
   ---------------------------------------------------------------------------------------*/

class Tax extends AppModel {
	var $name = 'Tax';
	var $hasMany = array('TaxCountryZoneRate','ContentProduct');
}
?>