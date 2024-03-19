<?php

class sales_Controller_Quote extends Core_Controller_Front_Action{

    protected $_loginRequiredActions=['checkout'];

    public function __construct(){
        $this->init();
    }

    public function init(){
        $action= $this->getRequest()->getActionName();
        //echo $action;
        if(in_array($action,$this->_loginRequiredActions)){
            $customerId=Mage::getSingleton('core/session')->get('logged_in_customer_id');
            $actionUrl=$this->getRequest()->getRequestUri();
            echo $actionUrl;
            if(!$customerId){
                Mage::getSingleton('core/session')->set('actionUrl',$actionUrl);
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

        Mage::getModel('sales/quote_item')
              ->load($this->getRequest()->getParams('id',0))->delete();
        $quoteModel=Mage::getModel('sales/quote');
        $quoteModel->initQuote();
        $quoteModel->save();
        $this->setRedirect('sales/quote/cart');
    }

    public function quantityAction(){
        $quantity=$this->getRequest()->getParams('quantity',0);
        $item=$this->getRequest()->getParams('item',0);
        $product=$this->getRequest()->getParams('product',0);
        //$data=['qty'=>$quantity];
        $data=Mage::getModel('sales/quote_item')
        ->setData(['qty'=>$quantity,'item_id'=>$item,'product_id'=>$product]);
        $data->save();
        $quoteModel=Mage::getModel('sales/quote');
        $quoteModel->initQuote();
        $quoteModel->save();
        $this->setRedirect('sales/quote/cart');

        
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
        echo "<pre>";
        // $customerId=Mage::getSingleton('core/session')->get('logged_in_customer_id');
        // echo $customerId;
        $addressData=$this->getRequest()->getParams('quoteC');
        //print_r($addressData);
        $addressObj = Mage::getSingleton('sales/quote')->addAddress($addressData);
        
        $shippingData=$this->getRequest()->getParams('shipping');
        //print_r($shippingData);
        $shippingObj = Mage::getSingleton('sales/quote')->addShipping($shippingData);
        Mage::getSingleton('sales/quote')->addShipId($shippingObj->getId());

        $paymentData=$this->getRequest()->getParams('payment');
        // print_r($paymentData);
        $paymentObj = Mage::getSingleton('sales/quote')->addPayment($paymentData);
        Mage::getSingleton('sales/quote')->addPayId($paymentObj->getId());

        Mage::getSingleton('sales/quote')->convert();
        
        
    }

    // public function saveAction(){

    //     $customerId=Mage::getSingleton('core/session')->get('logged_in_customer_id');
    //     // echo $customerId;
    //     $quoteModel = Mage::getSingleton('sales/quote');
    //     $quoteModel->initQuote();
    //     $quote=$quoteModel->getId();
    //     // echo $quote;
    //     $data=$this->getRequest()->getParams('quoteC');
    //     print_r($data);
    //     $data['quote_id']=$quote;
    //     $data['customer_id']=$customerId;
    //     print_r($data);
    //     $placeAddressModel=Mage::getModel('sales/quote_customer');
    //     $placeAddressModel->setData($data);
    //     $placeAddressModel->setData($data)->save();

    //     $order=$this->getRequest()->getParams('order');
    //     //print_r($data);
    //     print_r($order);
    //     $order['quote_id']=$quote;
    //     print_r($order);
    //      $checkMethodModel=Mage::getModel('sales/quote');
    //     $checkMethodModel->setData($order);
    //     //print_r($checkoutModel);
    //     $checkMethodModel->setData($order)->save();
        
    // }



 
}

?>