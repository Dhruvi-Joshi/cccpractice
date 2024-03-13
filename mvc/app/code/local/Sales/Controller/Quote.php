<?php

class sales_Controller_Quote extends Core_Controller_Front_Action{

    protected $_loginRequiredActions=['checkout'];

    public function __construct(){
        $this->init();
    }

    public function init(){
        $action= $this->getRequest()->getActionName();
        if(in_array($action,$this->_loginRequiredActions)){
            $customerId=Mage::getSingleton('core/session')->get('logged_in_customer_id');
            if(!$customerId){
                $this->setRedirect('customer/account/login');
                exit();
            }
        }
    }
    public function addAction(){
     
        $data=$this->getRequest()->getParams('cart');
        // echo "<pre>";
        // print_r($data);
        Mage::getModel('sales/Quote')->addProduct($data);
        $this->setRedirect('sales/quote/cart');
        
    }

    public function cartAction(){
        $layout=$this->getLayout();
        $layout->getChild("head")->addCss('../../skin/css/header.css');
        $layout->getChild("head")->addCss('../../skin/css/footer.css');
        $child= $layout->getChild("content");
        $cart=$layout->createBlock("sales/cart");
        $child->addChild("list",$cart);

        $layout->toHtml();
    }

    public function deleteAction(){
        
    }

    public function checkoutAction(){
        $layout=$this->getLayout();
        $layout->getChild("head")->addCss('../../skin/css/header.css');
        $layout->getChild("head")->addCss('../../skin/css/footer.css');
        $child= $layout->getChild("content");
        $cart=$layout->createBlock("sales/checkout");
        $child->addChild("list",$cart);

        $layout->toHtml();
    }

    public function saveAction(){
        $data=$this->getRequest()->getParams('quoteC');
        //print_r($data);
        $checkoutModel=Mage::getModel('sales/quote_customer');
        $checkoutModel->setData($data);
        //print_r($checkoutModel);
         $checkoutModel->setData($data)->save();
        
    }



 
}

?>