<?php

class Customer_Block_Order extends Core_Block_Template{

    public function __construct(){
        $this->setTemplate("customer/order.phtml");
    }

    public function getOrder(){
        return Mage::getModel('sales/order')->load($this->getRequest()->getParams('id',0));
    }

    public function itemsDetails(){
        $no = $_GET['id']; 
        return Mage::getModel('sales/order_item')->getCollection()->addFieldToFilter('order_id',$no)->getData();

    }

    public function productDetails(){

        $productIds = array(); // Array to store product IDs
    
        // Iterate over items to get product IDs
        foreach ($this->itemsDetails() as $item) { 
            $productIds[] = $item->getProduct_Id();
        }
        
        $products = array();
        foreach ($productIds as $productId) {
            $product = Mage::getModel('catalog/product')->load($productId);
            $products[] = $product;
        }
        // print_r($products);
        return $products;
        // foreach ($this->itemsDetails() as $item) { 
        //      $no= $item->getProduct_Id();
        // }   
        // return Mage::getModel('catalog/product')
        // ->load($no);
    }

    public function customerAddress(){
        $no = $_GET['id']; 
        return Mage::getModel('sales/order_customer')->getCollection()->addFieldToFilter('order_id',$no)->getData();
    }

    public function shippingDetails(){
        
        $no=$this->getOrder()->getShipping_Id();
        //echo $no;
        return Mage::getModel('sales/order_shipping')
        ->load($no);
    }

    public function paymentDetails(){
        $no=$this->getOrder()->getShipping_Id();
        //echo $no;
        return Mage::getModel('sales/order_payment')
        ->load($no);
    }

    public function historyDetails(){
        $no = $_GET['id']; 
        return Mage::getModel('sales/order_status_history')
        ->getCollection()->addFieldToFilter('order_id',$no)
        ->addFieldToOrderBy(['date'=>'DESC'])
        ->getFirstItem();
       
    }


    
}

?>