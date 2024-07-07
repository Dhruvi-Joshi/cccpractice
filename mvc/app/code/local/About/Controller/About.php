
<?php
class About_Controller_About extends Core_Controller_Front_Action{
    public function viewAction(){
        
        $layout = $this->getLayout();
        
        $child= $layout->getChild('content');
        $aboutView=$layout->createBlock('about/about');
        $child->addChild('aboutView',$aboutView);
        $layout->toHtml();

    }
    public function privacyAction(){
        
        $layout = $this->getLayout();
        
        $child= $layout->getChild('content');
        $privacyView=$layout->createBlock('about/privacy');
        $child->addChild('privacyView',$privacyView);
        $layout->toHtml();

    }
    public function policyAction(){
        
        $layout = $this->getLayout();
        
        $child= $layout->getChild('content');
        $policyView=$layout->createBlock('about/policy');
        $child->addChild('policyView',$policyView);
        $layout->toHtml();

    }
    public function contactusAction(){
        
        $layout = $this->getLayout();
        
        $child= $layout->getChild('content');
        $conatctView=$layout->createBlock('about/contactus');
        $child->addChild('policyView',$conatctView);
        $layout->toHtml();

    }
}