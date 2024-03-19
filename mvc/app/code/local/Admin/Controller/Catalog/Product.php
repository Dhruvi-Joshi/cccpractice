<?php

class Admin_Controller_Catalog_Product extends Core_Controller_Admin_Action{

    public function formAction(){
        $layout=$this->getLayout();
        // $layout->getChild("head")->addJs('js/page.js');
        // $layout->getChild("head")->addJs('js/head.js');
        // $layout->getChild("head")->addCss('css/page.css');
        // $layout->getChild("head")->addCss('css/head.css');
        $layout->getChild("head")->addCss('../../skin/css/header.css');
        $layout->getChild("head")->addCss('../../skin/css/footer.css');
        
        
        $child= $layout->getChild("content");
        // $abc=$layout->createBlock("catalog/admin_product_form");
        // echo $abc;
        $form=$layout->createBlock("catalog/admin_product_form")->setTemplate("catalog/admin/product/form.phtml");
        $child->addChild("form",$form);
        

        $layout->toHtml();
    }

    public function saveAction(){
        try{

        if(!$this->getRequest()->isPost()){
            throw new Exception("request is not Valid");
        }
        // echo "<pre>";
        $data=$this->getRequest()->getParams('data');
        print_r($data);
        echo "<pre>";
        print_r($_FILES);
        //echo "<br>";$abc= $_FILES['data']['name']['image_link'];echo $abc;echo "<br>";
        $data['image_link'] = $_FILES['data']['name']['image_link'];
        print_r($data);
        if (isset($_FILES['data']['name']['image_link'])) {
            $product_image = $_FILES['data']['name']['image_link'];
             $product_image_tmp_name = $_FILES['data']['tmp_name']['image_link'];
            $product_image_folder=Mage::getBaseDir('media') .'/product/'.$product_image;
            if (move_uploaded_file($product_image_tmp_name, $product_image_folder)) {
                echo "Image uploaded successfully!";
            } 


            $productModel=Mage::getModel('catalog/product');
            $productModel->setData($data)->save();
            print_r($productModel);
            $this->setRedirect('admin/catalog_product/list');
        }
        // $productModel=Mage::getModel('catalog/product');
        //  $productModel->setData($data);
         //print_r($productModel);
        //  $productModel->setData($data)->save();

        // print_r($productModel);
        // $this->setRedirect("admin/catalog_product/form?id={$productModel->getId()}");
        }
        catch(Exception $e){
            // var_dump($e->getMessage());
        }
    }

    
    
    public function deleteAction(){

       
        Mage::getModel('catalog/product')
        ->load($this->getRequest()->getParams('id',0))->delete();
    
    
        // if(isset($_GET['id'])){
        //     echo $no = $_GET['id'];
        //     $productModel=Mage::getModel('catalog/product');
        //     $productModel->delete($no);     
        // }

         
    }

    public function listAction(){
        $layout=$this->getLayout();
        // $layout->getChild("head")->addJs('js/page.js');
        // $layout->getChild("head")->addJs('js/head.js');
        // $layout->getChild("head")->addCss('css/page.css');
        // $layout->getChild("head")->addCss('css/head.css');
        $layout->getChild("head")->addCss('../../skin/css/header.css');
        $layout->getChild("head")->addCss('../../skin/css/footer.css');
        
        $child= $layout->getChild("content");

        $list=$layout->createBlock("catalog/admin_product_list")->setTemplate("catalog/admin/product/list.phtml");
        $child->addChild("list",$list);

        $layout->toHtml();

    }

    // public function saveAction(){
    //     echo "<pre>";
    //     $data=$this->getRequest()->getParams('data');
    //     //echo "data";
    //     print_r($data);
    //     $productModel=Mage::getModel('catalog/product');
    //      $productModel->setData($data);
    //      //print_r($productModel);
    //     $productModel->setData($data)->save();
    //     //print_r($productModel);
    // }
}

?>