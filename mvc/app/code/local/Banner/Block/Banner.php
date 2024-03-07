<?php
class Banner_Block_Banner extends Core_Block_Template{
    public function getBanner(){
        //Mage::getModel("catalog/product")->load($this->getReuest()->getParams('id',0));
        return Mage::getModel('banner/banner')->load($this->getRequest()->getParams('id',0));
    }

}
?>