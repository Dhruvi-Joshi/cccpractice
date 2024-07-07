<?php
class model_request{
    public function __constract(){

    }
    public function getparams($key= ''){
        //return $_REQUEST;
        return ($key =='')
        ?$_REQUEST
          :(isset($_REQUEST[$key])
             ?$_REQUEST[$key]
               :''
            );
    }

    public function getpostdata($key= ''){
        return ($key =='')
        ?$_POST
          :(isset($_POST[$key])
             ?$_POST[$key]
               :''
            );
        //return $_POST;
    }

    public function getquerydata($key= ''){
        return ($key !='')
        ?$_GET
          :(isset($_GET[$key])
             ?$_GET[$key]
               :''
            );
        //return $_GET;
    }


    public function ispost(){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            return true;
        }
        return false;
    }

    public function isget(){
        if($_SERVER['REQUEST_METHOD']==='GET'){
            return true;
        }
        return false;
    }

    // public function getRequestUri(){
    //     $request=$_SERVER['REQUEST_URI'];
    //     //return $request;
    //     $req=str_replace("/cyber/practice/","",$request);
    //     return $req;
        
    // }

}
?>