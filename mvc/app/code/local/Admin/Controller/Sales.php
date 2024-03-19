<?php
class Admin_Controller_Sales extends Core_Controller_Front_Action{

    public function listAction(){
        $layout=$this->getLayout();
        $layout->getChild("head")->addCss('../../skin/css/header.css');
        $layout->getChild("head")->addCss('../../skin/css/footer.css');
        
        
        $child= $layout->getChild("content");
        // $abc=$layout->createBlock("catalog/admin_product_form");
        // echo $abc;
        $list=$layout->createBlock("sales/admin_list");//->setTemplate("banner/admin/form.phtml");
        $child->addChild("list",$list);
        

        $layout->toHtml();
    }

}