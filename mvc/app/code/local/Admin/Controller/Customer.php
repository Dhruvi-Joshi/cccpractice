<?php
class Admin_Controller_Customer extends Core_Controller_Admin_Action
{ 
    
    //order list admin side print karava
    public function listAction()
    {
        
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $customerList = $layout->createBlock('admin/customerlist');
        $child->addChild('bannerList', $customerList);
        $layout->toHtml();
    }
    
}