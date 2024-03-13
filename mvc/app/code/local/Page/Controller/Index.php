<?php

class Page_Controller_Index extends Core_Controller_Front_Action{
    public function indexAction(){
       // echo '<input type="text" name="test" value="as">';
        $layout=$this->getLayout();
        $layout->getChild("head")->addJs('js/page.js');
        $layout->getChild("head")->addJs('js/head.js');
        $layout->getChild("head")->addCss('css/header.css');
        $layout->getChild("head")->addCss('css/footer.css');
        $layout->getChild("head")->addCss('css/banner.css');
        $child=$layout->getChild('content');
        $banner=$layout->createBlock('core/template')->setTemplate('page/banner.phtml');
        $child->addChild('banner', $banner);
        
        $layout->toHtml();
        // echo dirname(__FILE__);
    }

    public function testAction(){
        //echo "123";
        // echo "<pre>";
        //var_dump($_SESSION);
        $productModel=Mage::getSingleton('core/session');
        //->set('customerId',1);
        print_r($_SESSION);
        // $productModel=Mage::getModel('catalog/product')->setData(['asrgr','rwghj']);
        // print_r($productModel);
    }

    // public function saveAction(){
    //     echo "save data";
    // }
}
?>