<?php

class sales_Controller_Quote extends Core_Controller_Front_Action{
    public function addAction(){
        
        $data=$this->getRequest()->getParams('cart');
        echo "<pre>";
        print_r($data);

        Mage::getModel('sales/Quote')->addProduct($data);
        
    }
}

?>