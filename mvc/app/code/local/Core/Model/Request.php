<?php

class Core_Model_Request{
    public function __constract(){

    }
    public function getParams($key= ''){
        //return $_REQUEST;
        return ($key =='')
        ?$_REQUEST
          :(isset($_REQUEST[$key])
             ?$_REQUEST[$key]
               :''
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
        $request=$_SERVER['REQUEST_URI'];
        //return $request;
        $req=str_replace("/cyber/practice/","",$request);
        return $req;
        
    }

} 
?>