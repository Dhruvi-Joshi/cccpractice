<?php
class Sales_Block_Checkout extends Core_Block_Template{

    public function __construct(){
        $this->setTemplate("cart/checkout.phtml");
        // $id=Mage::getSingleton('core/session')->get('quote_id');
    }

    public function getCart(){
        $quoteModel = Mage::getSingleton('sales/quote');
        $quoteModel->initQuote();
        $quote=$quoteModel->getId();
        return $quote;
    } 

    public function getQuote(){
        $id=$this->getCart();

        return Mage::getModel('cart/cart')->getCollection()
                        ->addFieldToFilter('quote_id',$id);
    }

    public function getproduct(){
        $id=$this->getCart();
        return Mage::getModel('sales/quote_item')->getCollection()
                    ->addFieldToFilter('quote_id',$id);
        
    }
    public function getCustomer(){
        $customerModel=Mage::getModel('customer/customer')->load(Mage::getSingleton("core/session")->get("logged_in_customer_id"));
        $cid=$customerModel->getcustomer_id();
        return $cid;
     }


   
    
}

?>