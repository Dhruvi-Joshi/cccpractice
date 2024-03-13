<?php

class Sales_Block_Cart extends Core_Block_Template{

    public function __construct(){
        $this->setTemplate("cart/cart.phtml");
        //$id=Mage::getSingleton('core/session')->get('quote_id');
    }

    public function getCart(){
        // $id=Mage::getSingleton('core/session')->get('quote_id');
        // print_r($id);
        // return $id;
        $quoteModel = Mage::getSingleton('sales/quote');
        //echo "<pre>";
        //print_r($quoteModel);
        $quoteModel->initQuote();
        // $quoteModel->getId();
        $quote=$quoteModel->getId();
        //print_r($quote);
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
    

}

?>