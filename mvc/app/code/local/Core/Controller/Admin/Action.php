<?php

class Core_Controller_Admin_Action extends Core_Controller_Front_Action{
    protected $_allowAction=[];
    public function init(){
        $this->getLayout()->setTemplate('core/admin.phtml');
        if($this->getRequest()->getModuleName() == 'admin' &&
            !in_array($this->getRequest()->getActionName(), $this->_allowAction)
        ){
            $session = Mage::getSingleton('core/session')->get('logged_in_admin_username');
            if($session == false){
                $this->setRedirect('admin/account/login');
            }
        }
    }
}

?>