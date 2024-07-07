<?php
class Admin_Block_Customerlist extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate("admin/customerlist.phtml");
    }
    public function getCustomerData(){
        return Mage::getModel('customer/customer')->getCollection()->getData();
        
    }
    
}