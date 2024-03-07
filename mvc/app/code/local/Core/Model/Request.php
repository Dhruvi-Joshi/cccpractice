<?php

class Core_Model_Request{

    protected $_moduleName;
    protected $_controllerName;
    protected $_actionName;
    public function __construct(){
        //echo 123;
        $uri=$this->getRequestUri();
        
        //var_dump($uri);
        ////
        $uri=array_filter(explode("?",$uri));
        //var_dump($uri);
        $uri=$uri[0];
        ////
        //$uri=explode("/",$uri);
        $uri=array_filter(explode("/",$uri));
        //var_dump($uri);
        $this->_moduleName=isset($uri[1])?$uri[1]:'page';
        $this->_controllerName=isset($uri[2])?$uri[2]:'index';
        $this->_actionName=isset($uri[3])?$uri[3]:'index';

    }
    public function getParams($key= '',$arg =null){
        //return $_REQUEST;
        return ($key =='')
        ?$_REQUEST
          :(isset($_REQUEST[$key])
             ?$_REQUEST[$key]
               :((!is_null($arg))?$arg:'')
            );
    }

    public function getPostData($key= ''){
        return ($key =='')
        ?$_POST
          :(isset($_POST[$key])
             ?$_POST[$key]
               :''
            );
        //return $_POST;
    }

    public function getQueryData($key= ''){
        return ($key =='')
        ?$_GET
          :(isset($_GET[$key])
             ?$_GET[$key]
               :''
            );
        //return $_GET;
    }


    public function isPost(){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            return true;
        }
        return false;
    }

    public function getRequestUri(){
        $uri=$_SERVER['REQUEST_URI'];
        //print_r($uri);
        $uri=str_replace("cyber/mvc/","",$uri);
        //print_r($uri);
        // if(strpos($uri,'?')!== false){
        //     $pos=strpos($uri,'?');
        //     print_r($pos);
        //     $temp_uri=substr($uri,$pos);
        //     $uri=str_replace($temp_uri,'',$uri);
        //     //echo $uri;
        //     return $uri;
        // }
        return $uri;

        // $request=$_SERVER['REQUEST_URI'];
        // return $request;
        // $req=str_replace("/cyber/practice/","",$request);
        // return $req;
        
    }

    public function getUrl($path){
   // return 'http:localhost'.$_SERVER['SCRIPT_NAME']."/".$path;
        //return $this->getRequestUri()."/".$path;

        return 'http://localhost/cyber/mvc/'.$path;
    }

    public function getControllerClass(){
         $strClass=$this->_moduleName.'_Controller_'.$this->_controllerName;
        $strClass=ucwords($strClass,"_");
        return $strClass;
    }

   

    public function getActionName(){
        return $this->_actionName;
    }

    public function getControllerName(){
        return $this->_controllerName;
    }

    public function getModulename(){
        return $this->_moduleName;
    }

    public function getFullControllerClass(){
        $strClass=$this->_moduleName.'_controller_'.$this->_controllerName;
        //echo $strClass=ucwords($strClass,"_");
        return $strClass;
    }

} 
?>