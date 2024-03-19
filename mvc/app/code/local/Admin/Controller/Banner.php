<?php

class Admin_Controller_Banner extends Core_Controller_Front_Action{

    public function formAction(){
         echo 123;
        $layout=$this->getLayout();
        $layout->getChild("head")->addCss('../../skin/css/header.css');
        $layout->getChild("head")->addCss('../../skin/css/footer.css');
        
        
        $child= $layout->getChild("content");
        // $abc=$layout->createBlock("catalog/admin_product_form");
        // echo $abc;
        $form=$layout->createBlock("banner/banner")->setTemplate("banner/admin/form.phtml");
        $child->addChild("form",$form);
        

        $layout->toHtml();
    }

    public function saveAction(){
        
        //echo "<pre>";
        $data=$this->getRequest()->getParams('banner');
       // echo "<pre>";
        // print_r($_FILES);
        // echo "</pre>";  
        //echo $_FILES['banner']['name']['banner_image'];
        $data['banner_image'] = $_FILES['banner']['name']['banner_image']; 
        // print_r($data);
        if (isset($_FILES['banner']['name']['banner_image'])) {
            //echo print_r($_FILES['banner']['name']['banner_image']);echo"<br>";echo"<br>";
            $product_image = $_FILES['banner']['name']['banner_image'];
            //  print_r($product_image);
            $product_image_tmp_name = $_FILES['banner']['tmp_name']['banner_image'];
            // echo "<br>";print_r($product_image_tmp_name);echo "<br>";

            $product_image_folder=Mage::getBaseDir('media') .'/banner/'.$product_image;
            // echo $product_image_folder;

            if (move_uploaded_file($product_image_tmp_name, $product_image_folder)) {
                echo "Image uploaded successfully!";
            }   
            $bannerModel = Mage::getModel('banner/banner'); 
            $bannerModel->setData($data)->save();
            //print_r($bannerModel);
            

        }
        // print_r($data);
       
    }

    public function listAction(){
        $layout=$this->getLayout();
        $layout->getChild("head")->addCss('../../skin/css/header.css');
        $layout->getChild("head")->addCss('../../skin/css/footer.css');
        
        $child= $layout->getChild("content");

        $list=$layout->createBlock("banner/banner")->setTemplate("banner/admin/list.phtml");
        $child->addChild("list",$list);

        $layout->toHtml();

    }

    public function deleteAction(){
        Mage::getModel('banner/banner')
        ->load($this->getRequest()->getParams('id',0))->delete();
    
    }

}

?>