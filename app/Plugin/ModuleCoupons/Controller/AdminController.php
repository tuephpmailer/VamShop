<?php 
/* -----------------------------------------------------------------------------------------
   VamShop - http://vamshop.com
   -----------------------------------------------------------------------------------------
   Copyright (c) 2014 VamSoft Ltd.
   License - http://vamshop.com/license.html
   ---------------------------------------------------------------------------------------*/
App::uses('ModuleCouponsAppController', 'ModuleCoupons.Controller');

class AdminController extends ModuleCouponsAppController {
	public $helpers = array('Time','Admin');
	public $uses = array('ModuleCoupon');
	
	public function admin_delete($id)
	{
		$this->ModuleCoupon->delete($id);
		$this->Session->setFlash(__('You have deleted a coupon.'));
		$this->redirect('/module_coupons/admin/admin_index/');
	}
	
	public function admin_edit($id = null)
	{
		if(empty($this->data))
		{
			$this->set('current_crumb', __('Edit Coupon'));
			$this->set('title_for_layout', __('Edit Coupon'));

			$this->set('free_shipping_options',array('no' => __('no' ), 'yes' => __('yes')));
			$this->request->data = $this->ModuleCoupon->read(null,$id);

		}
		else
		{
			if(isset($this->data['cancelbutton']))
			{
				$this->redirect('/module_coupons/admin/admin_index/');
				die();
			}
			
			$this->ModuleCoupon->save($this->data);
			$this->Session->setFlash(__('You have updated a coupon.'));
			
			if($id == null)
				$id = $this->ModuleCoupon->getLastInsertId();
			
			if(isset($this->data['applybutton']))
				$this->redirect('/module_coupons/admin/admin_edit/' . $id);		
			else
				$this->redirect('/module_coupons/admin/admin_index/');
		
		}
	}
	
	public function admin_new()
	{
		$this->redirect('/module_coupons/admin/admin_edit/');
	}
	
	public function admin_index()
	{
		$this->set('current_crumb', __('Manage Coupons'));
		$this->set('title_for_layout', __('Manage Coupons'));
		$this->set('coupons',$this->ModuleCoupon->find('all'));
	}
	
	public function admin_help()
	{
		$this->set('current_crumb', __('Coupons'));
		$this->set('title_for_layout', __('Coupons'));
	}

}

?>