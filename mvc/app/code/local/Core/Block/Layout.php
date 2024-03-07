<?php

class Core_Block_Layout extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate('core/1column.phtml');
        $this->prepareChildren();
        
    }

    public function prepareChildren(){

        //print("<pre>");
        $head=$this->createBlock('page/head');
        //print_r($head);
        $this->addChild('head', $head);
        //print("<pre>");

        //print("<pre>");
        $header=$this->createBlock('page/header');
        //print_r($header);
        $this->addChild('header', $header);
        //print("<pre>");
        
        //print("<pre>");
        $content=$this->createBlock('page/content');
        //print_r($content);
        $this->addChild('content', $content);
        //print("<pre>");

        //print("<pre>");
        $footer=$this->createBlock('page/footer');
        //print_r($footer);
        $this->addChild('footer', $footer);
        //print("<pre>");
    }

    public function createBlock($className){
        // $ab= Mage::getBlock($className);
        // print_r($ab);
        return Mage::getBlock($className);
        //->setLayout($this)
    }

    public function getRequest(){
        return Mage::getModel("core/request");
    }
}
?>