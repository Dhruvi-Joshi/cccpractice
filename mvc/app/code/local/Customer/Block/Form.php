<?php

class Customer_Block_Form extends Core_Block_Template{

    public function __construct(){
        $this->setTemplate("customer/form.phtml");
    }

    public function getCustomer(){
        //echo Mage::getModel("catalog/product")->load($this->getReuest()->getParams('id',0));
        return Mage::getModel('customer/customer')->load($this->getRequest()->getParams('id',0));
    }
}

?>