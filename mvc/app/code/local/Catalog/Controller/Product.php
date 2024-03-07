<?php
class Catalog_Controller_Product extends Core_Controller_Front_Action{

    public function viewAction(){
        //product details,quantity box & addToCart Button except cost
        $layout=$this->getLayout();
        $layout->getChild("head")->addCss('../../skin/css/header.css');
        $layout->getChild("head")->addCss('../../skin/css/footer.css');
        
        $child= $layout->getChild("content");

        $view=$layout->createBlock("catalog/admin_product")
                        ->setTemplate("catalog/admin/product/view.phtml");
        $child->addChild("view",$view);
        
        $layout->toHtml();
    }
    
    
        public function listAction(){
            echo 123;
        }
    
        public function showAction(){
            echo 345;
        }


    // public function formAction(){
        //     $layout=$this->getLayout();
        //     $layout->getChild("head")->addJs('js/page.js');
    //     $layout->getChild("head")->addJs('js/head.js');
    //     $layout->getChild("head")->addCss('css/page.css');
    //     $layout->getChild("head")->addCss('css/head.css');
        
    //     $child= $layout->getChild("content");
    //     $form=$layout->createBlock("core/template")->setTemplate("product/form.phtml");
    //     $child->addChild("form",$form);

    //     $layout->toHtml();
    // }

    // public function saveAction(){
    //     echo "<pre>";
    //     $data=$this->getRequest()->getParams('data');
    //     //echo "data";
    //     print_r($data);
    //     $productModel=Mage::getModel('catalog/product');
    //      $productModel->setData($data);
    //      print_r($productModel);
    //     $productModel->setData($data)->save();
    //     print_r($productModel);
    // }


    

}
?>