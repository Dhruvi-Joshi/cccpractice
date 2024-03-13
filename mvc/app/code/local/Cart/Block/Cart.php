<?php

class Cart_Block_Cart extends Core_Block_Template{

    public function __construct(){
        $this->setTemplate("cart/cart.phtml");
        $id=Mage::getSingleton('core/session')->get('quote_id');
        //print_r($id);
    }

    

    public function getCart(){
        $id=Mage::getSingleton('core/session')->get('quote_id');
        //print_r($id);
        return $id;
        // $quoteModel = Mage::getModel('sales/quote');
        // $quoteModel->initQuote();
        // print_r($quoteModel);
        // $quote=$quoteModel->getId();
        // print_r($quote);
        
        
    }

    // public function getItems(){
    //     $id=$this->getCart();
    //     //echo $id;
    //    // $pro= Mage::getModel('sales/quote_item')->getCollection()
    //                // ->addFieldToFilter('quote_id',$id);
    //                 //print_r($pro);
    //                 return $id;
    // }

    // public function getProduct(){
    //     $id=$this->getCart();
    //     //echo $id;
    //    // $pro= Mage::getModel('sales/quote_item')->getCollection()
    //                // ->addFieldToFilter('quote_id',$id);
    //                 //print_r($pro);
    //                 return $id;
    // }

    
}

?>