<?php
class Mage{

    public static $registry=[];
    public static $baseDir='C:/xampp/htdocs/cyber/mvc';
    public static function init(){
       // $requestModel=new Core_Model_Request;
       // echo $requestModel->getRequestUri();
        //$requestModel=Mage::getModel("core/request");
        //echo (get_class($requestModel));
        $frontController=new Core_Controller_Front();
        $frontController->init();
    }

    public static function getModel($className){
        $className=str_replace('/','_Model_',$className);
        $className=ucwords(str_replace("/","_",$className),'_');
        return new $className();
        // $class=explode('/',$modelName);
        // $className=ucfirst($class[0]).'_'."Model"."_".ucfirst($class[1]);
        // return new $className();
        //echo $className;
    }

    public static function getBlock($className){
        $className=str_replace("/","_Block_",$className);
        $className=ucwords(str_replace("/","_",$className),"_");
        return new $className();
    }

    public static function getSingleton($className){

    }

    public static function register($key,$value){

    }

    public static function registry($key){

    }

    public static function getBaseDir($subDir=null){
        if($subDir){
            return self::$baseDir.'/'.$subDir;
        }
        return self::$baseDir;
    }

    



}
?>