<?php

class Page_Controller_Index extends Core_Controller_Front_Action{
    public function indexAction(){
       // echo '<input type="text" name="test" value="as">';
        $layout=$this->getLayout();
        $layout->getChild("head")->addJs('js/page.js');
        $layout->getChild("head")->addJs('js/head.js');
        $layout->getChild("head")->addCss('css/page.css');
        $layout->getChild("head")->addCss('css/head.css');
        $layout->toHtml();
        // echo dirname(__FILE__);
    }

    public function testAction(){
        //echo "123";
        $layout=$this->getLayout();
    }

    public function saveAction(){
        echo "save data";
    }
}
?>