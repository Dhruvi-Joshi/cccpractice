<?php
include "lib/autoloader.php";


// class Ccc{
//     public function init(){
//         // echo $_SERVER['REQUEST_URI'];
//         // $frontcontroller=new Controller_front();
//         // $requestmodel=new model_request();
//         // echo $requestmodel->getRequestUri();

//         $requestmodel=new Controller_front();
//         echo $requestmodel->init();
        
//     }
// }
// $obj=new Ccc();
// $obj->init();

$request=new model_request();
$showlist=new view_product_list();
$action = isset($_GET['action']) ? $_GET['action'] : '';
// echo $showlist->createlist();

   
if ($action === 'view_form') {
   
    $product=new view_product();
    echo $product->tohtml();
}
elseif($request->ispost()){
            echo "<pre>";
            $product=new model_product();
            $product->save($request->getparams('pdata'));
}
elseif(!$request->isget()){
    echo "<pre>";
            $product=new model_product();
            $product->delete($request->getparams('id'));
        //    print_r($product);
}
else{
    $product=new view_product_list();
        echo $product->createlist();
}

    // if(!$request->ispost()){
    //     $product=new view_product();
    //     echo $product->tohtml();
    //     }
    //     else{
    //         echo "<pre>";
    //         $product=new model_product();
    //         $product->save($request->getparams('pdata'));
    //     // print_r($product);
    //     }



    // if(!$request->isget()){
    //     $product=new view_product_list();
    //     echo $product->createlist();
    //     }
    //     else{
    //         echo "<pre>";
    //         $product=new model_product();
    //         $product->delete($request->getparams('id'));
    //        // print_r($product);
    //     }
?>