<?php

class Core_Controller_Front{
    
    public function init(){
        $request=mage::getModel('core/request');
        get_class($request);
        $actionName=$request->getActionName().'Action';
        //var_dump($actionName);echo "<br>";
        $fullClassName=$request->getFullControllerClass();
        //echo"<br>";echo"<br>";var_dump($fullClassName);
        $controller=new $fullClassName();
        $controller->$actionName();
       // $action=$actionName.'Action';
        //echo $indexAction->$action()."<br>";
       // echo $fullClassName;
    }
}
?>