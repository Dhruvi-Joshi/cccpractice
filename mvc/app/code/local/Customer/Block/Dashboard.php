<?php

class Customer_Block_Dashboard extends Core_Block_Template{

    public function __construct(){
        $this->setTemplate("customer/dashboard.phtml");
    }

    public function getCustomerData(){
       return Mage::getModel('customer/customer')->load(Mage::getSingleton("core/session")->get("logged_in_customer_id"));
    }
}

?>