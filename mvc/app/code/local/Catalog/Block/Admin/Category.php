<?php

class Catalog_Block_Admin_Category extends Core_Block_Template{

    public function getView(){
        //Mage::getModel("catalog/product")->load($this->getReuest()->getParams('id',0));
        return Mage::getModel('catalog/product')->load($this->getRequest()->getParams('id',0));
        
    }
}
?>