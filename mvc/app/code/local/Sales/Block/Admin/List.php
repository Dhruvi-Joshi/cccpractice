<?php

class Sales_Block_Admin_List extends Core_Block_Template{

    public function __construct(){
        $this->setTemplate("cart/list.phtml");
    }

    public function orderDetails(){
        return Mage::getModel('sales/order')->getCollection()->getData();
    }

    public function customerDetails(){
        return Mage::getModel('sales/order_customer')->getCollection()->getData();
    }

    public function itemsDetails(){
        return Mage::getModel('sales/order_item')->getCollection()->getData();

    }

    public function productDetails($productId){
        return Mage::getModel('catalog/product')
        ->load($productId);
    
    }

    public function MenuDetails(){
        $status= Mage::getModel('status/status')->option();
        return $status;
    }

    public function menuSelect(){
        // $abc=
        return Mage::getModel('sales/order_status_history')->getCollection()->getData();
            //print_r($abc);
        //return $abc;
    }
} 