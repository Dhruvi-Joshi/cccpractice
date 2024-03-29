<?php

class Agentzipcode_Controller_Agent extends Core_Controller_Front_Action{

    public function formAction(){
         //echo 123;
        // echo get_class();
        $layout=$this->getLayout();
        $layout->getChild("head")->addCss('../../skin/css/header.css');
        $layout->getChild("head")->addCss('../../skin/css/footer.css');
        $child= $layout->getChild("content");
        $try=$layout->createBlock("agentzipcode/agent");
        $child->addChild("try",$try);

        $layout->toHtml();
    }

    public function showAction(){
        echo 123;
        $data=$this->getRequest()->getParams('agent');
        print_r($data);
        

    }
}
?>