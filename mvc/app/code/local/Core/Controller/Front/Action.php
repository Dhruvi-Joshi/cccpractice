<?php
class Core_Controller_Front_Action{

    public function __construct(){
        $this->init();
    }

    public function init(){
        return $this;
    }
    protected $_layout=null;
    public function getLayout(){
        if(is_null($this->_layout)){
            $this->_layout = Mage::getBlock('core/layout');
            //echo get_class($layout);
        }
        return $this->_layout;
    }

    public function getRequest(){
        return Mage::getModel('core/request');
    }

    public function setRedirect($url)
    {
        $url = Mage::getBaseUrl().$url;
        header("Location:". $url);
    }

    
}
?>