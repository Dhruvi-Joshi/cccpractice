<?php
class Catalog_Controller_Category extends Core_Controller_Front_Action{

    public function viewAction(){
        //show all the product with category_id=1
        $layout=$this->getLayout();
        
        $layout->getChild("head")->addCss('../../skin/css/header.css');
        $layout->getChild("head")->addCss('../../skin/css/footer.css');
        
        $child= $layout->getChild("content");

        $list=$layout->createBlock("catalog/admin_category")->setTemplate("catalog/admin/view.phtml");
        $child->addChild("list",$list);

        $layout->toHtml();
    }

}
?>