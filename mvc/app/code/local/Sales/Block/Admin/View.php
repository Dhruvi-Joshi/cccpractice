<?php

class Sales_Block_Admin_View extends Core_Block_Template{

    public function __construct(){
        $this->setTemplate("cart/view.phtml");
    }

    public function orderDetails(){

        if(isset($_GET['id'])){
            $no = $_GET['id']; 
            //echo $no;    
       }else{
        $error= "select order";
       }
       
        return Mage::getModel('sales/order')->getCollection()->addFieldToFilter('order_id',$no)->getData();
    }

    public function customerAddress(){
        $no = $_GET['id']; 
        return Mage::getModel('sales/order_customer')->getCollection()->addFieldToFilter('order_id',$no)->getData();
    }

    public function customerDetails(){
        foreach ($this->customerAddress() as $customer) { 
            $no= $customer->getCustomer_Id();
            // echo $no;
       }   
       return Mage::getModel('customer/customer')
       ->load($no);
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
             
        //      echo $no;
             
        // }  
        // return Mage::getModel('catalog/product')
        // ->load($no); 
        
        
    }

    public function paymentDetails(){
        foreach ($this->orderDetails() as $order) { 
             $no= $order->getPayment_Id();
             //echo $no;
        } 

        return Mage::getModel('sales/order_payment')
        ->load($no);
    }

    public function shippingDetails(){
        foreach ($this->orderDetails() as $shipping) { 
             $no= $shipping->getShipping_Id();
             //echo $no;
        }

        return Mage::getModel('sales/order_shipping')
        ->load($no);
    }

    public function historyDetails(){
        $no = $_GET['id']; 
        return Mage::getModel('sales/order_status_history')
        ->getCollection()->addFieldToFilter('order_id',$no)->getData();
        //print_r($abc);
            // foreach ($abc->getData() as $hist) { 
            //         echo $hist->getDate();
            //     }
    }

}
?>