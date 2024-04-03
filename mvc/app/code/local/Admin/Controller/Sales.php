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

    public function saveAction(){
        $data=$this->getRequest()->getParams('status');
        print_r($data);
        $historyModel = Mage::getModel('Sales/Order_Status_History'); 
        
        $historyModel->setData($data)->save();
        echo $historyModel->getTo_Status();
       
        $order=Mage::getModel('sales/order')->addData('order_id',$historyModel->getOrder_Id())
             ->addData('status',$historyModel->getTo_Status())->save();
        $this->setRedirect("admin/sales/list");
        
    }

    public function viewAction(){
        $layout=$this->getLayout();
        $layout->getChild("head")->addCss('../../skin/css/header.css');
        $layout->getChild("head")->addCss('../../skin/css/footer.css');
        
        
        $child= $layout->getChild("content");
   
        $list=$layout->createBlock("sales/admin_view");
        $child->addChild("list",$list);
        

        $layout->toHtml();
    }

}