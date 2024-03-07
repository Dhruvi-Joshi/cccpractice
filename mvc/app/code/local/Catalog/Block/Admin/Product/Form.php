<?php
class Catalog_Block_Admin_Product_Form extends Core_Block_Template{

    public function getProduct(){
        //Mage::getModel("catalog/product")->load($this->getReuest()->getParams('id',0));
        return Mage::getModel('catalog/product')->load($this->getRequest()->getParams('id',0));
    }

}

?>