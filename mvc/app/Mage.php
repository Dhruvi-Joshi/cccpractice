<?php
class Mage{
    public static function init(){
       // $requestModel=new Core_Model_Request;
       // echo $requestModel->getRequestUri();
        $requestModel=Mage::getModel("core/request");
        echo (get_class($requestModel));
    }

    public static function getModel($modelName){
        $class=explode('/',$modelName);
        $className=ucfirst($class[0]).'_'."Model"."_".ucfirst($class[1]);
        return new $className();
        //echo $className;
    }

    public static function getSingleton($className){

    }

    public static function register($key,$value){

    }

    public static function registry($key){

    }

    public static function getBaseDir($subDir=null){

    }



}
?>