<?php

class Customer_Block_History extends Core_Block_Template{

    public function __construct(){
        $this->setTemplate("customer/history.phtml");
    }

    public function customerOrder(){
        $cid=Mage::getSingleton("core/session")->get("logged_in_customer_id");
        return Mage::getModel('sales/order_customer')->getCollection()
            ->addFieldToFilter('customer_id',$cid)->getData();
    }

    public function historyDetails(){

        $historyIds = array(); // Array to store product IDs
    
    // Iterate over items to get product IDs
    foreach ($this->customerOrder() as $order) { 
        $historyIds[] = $order->getorder_Id();
    }
    // print_r($historyIds);
    $orders = array();
    foreach ($historyIds as $orderId) {
        $product = Mage::getModel('sales/order')->getCollection()->addFieldToFilter('order_id',$orderId)->getData();
        $orders[] = $product;
        //print_r($product->getData());die;
    }
// echo "<pre>";
    // print_r($orders);
    return $orders;


        
    }

    

}

?>