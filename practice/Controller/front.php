<?php

class Controller_front{
    public function init(){
        $requestmodel=new model_request();
        $uri=$requestmodel->getRequestUri();
        //echo $requestmodel->getRequestUri();
        //echo $requestmodel;

        $layout="View_";
        $classname=str_replace("/","_",$uri);
        $layout=$layout.$classname;
        echo $layout;
        $obj=new $layout;
        $obj->tohtml();

    }
}
?>