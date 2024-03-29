<?php

class Agentzipcode_Block_Agent extends Core_Block_Template{

    public function __construct(){
        // echo get_class();
        $this->setTemplate("agentzipcode/form.phtml");
    }

    public function zipData(){
        return Mage::getModel('agentzipcode/zipcode')->getCollection();
    }

    public function cityData(){
        return Mage::getModel('agentzipcode/agent')->getCollection();
    }

    // public function selectCity(){
    //     $data=$this->getRequest()->getParams('agent');
    //     print_r($data);
    // }

}

?>