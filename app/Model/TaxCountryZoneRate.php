<?php
/* -----------------------------------------------------------------------------------------
   VamShop - http://vamshop.com
   -----------------------------------------------------------------------------------------
   Copyright (c) 2014 VamSoft Ltd.
   License - http://vamshop.com/license.html
   ---------------------------------------------------------------------------------------*/
App::uses('Model', 'AppModel');
class TaxCountryZoneRate extends AppModel {
	public $name = 'TaxCountryZoneRate';
	public $belongsTo = array('Tax','CountryZone');
}
?>