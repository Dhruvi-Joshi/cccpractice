<?php

class Core_Block_Template extends Core_Block_Abstract{
    public $template;
    protected $_child=[];
    public function toHtml(){
        $this->render();
    }

    public function addChild($key,$value){
        $this->_child[$key]=$value;
    }

    public function removeChild($key){

    }

    
    public function getChild($key){
        return $this->_child[$key];
    }

    public function setTemplate($template){
        $this->template = $template;
        //echo 45;
       //print_r($this);
        return $this;//class object=>Core_Block_Layout Object ( [template] => core/1column.phtml [_child:protected] => Array ( ) [data] => Array ( ) )
    }

    public function getTemplate(){
        return $this->template;
    }

    // public function getChildHtml($key){
    //     $html='';
    //     if($key==''&&count($this->_child)){
    //         foreach($this->_child as $_child){
    //             $html.= $_child->toHtml();
    //         }
    // }
    //     else{
    //     return $this->_child[$key]->toHtml();
    // }
    // return $html;
    // }

    public function getChildHtml($key)
    {
        $html = '';
        if ($key == '' && count($this->_child)) {
            foreach ($this->_child as $_child) {
                $html .= $_child->toHtml();
            }
        } else {
            $html = $this->_child[$key]->toHtml();
        }
        return $html;
        // return $this->_child[$key]->toHtml();
    }

    public function getUrl($path){
        // echo 1203;
        // echo $this->getRequest()->getUrl($path);
        return $this->getRequest()->getUrl($path);
    }
}

?>