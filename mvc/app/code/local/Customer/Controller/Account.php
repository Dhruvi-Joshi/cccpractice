<?php

class Customer_Controller_Account extends Core_Controller_Front_Action{

    protected $_loginRequiredActions=['dashboard'];

    public function __construct(){
        $this->init();
    }

    public function init(){
        $action= $this->getRequest()->getActionName();
        if(in_array($action,$this->_loginRequiredActions)){
            $customerId=Mage::getSingleton('core/session')->get('logged_in_customer_id');
            if(!$customerId){
                $this->setRedirect('customer/account/login');
                exit();
            }
        }
    }

    public function registerAction(){
        $layout=$this->getLayout();
        $layout->getChild("head")->addJs('js/page.js');
        $layout->getChild("head")->addJs('js/head.js');
        $layout->getChild("head")->addCss('css/page.css');
        $layout->getChild("head")->addCss('css/head.css');
        $layout->getChild("head")->addCss('../../skin/css/header.css');
        $layout->getChild("head")->addCss('../../skin/css/footer.css');
        
        
        $child= $layout->getChild("content");
        $form=$layout->createBlock("core/template")->setTemplate("customer/form.phtml");
        $child->addChild("form",$form);

        $layout->toHtml();
    }

    public function loginAction()
    {
        if (!$this->getRequest()->isPost()) {
        $layout=$this->getLayout();
        // $layout->getChild("head")->addJs('js/page.js');
        // $layout->getChild("head")->addJs('js/head.js');
        // $layout->getChild("head")->addCss('css/page.css');
        // $layout->getChild("head")->addCss('css/head.css');
        $layout->getChild("head")->addCss('../../skin/css/header.css');
        $layout->getChild("head")->addCss('../../skin/css/footer.css');
        
        
        $child= $layout->getChild("content");
        // $layout->getChild('head')->addJs('skin/js/jquery-3.7.1.min.js');
       // $login=$layout->createBlock("core/template")->setTemplate("customer/login.phtml");
       $login= $layout->createBlock('customer/login');
        $child->addChild("login",$login);

        $layout->toHtml();
        } else {
            try {
                $loginData =$this->getRequest()->getParams('login');
                // print_r($loginData);
                // die;
                $message=[];
                $email = $loginData['customer_email'];
                // print_r($email);
                $password = $loginData['password'];
                $data = Mage::getModel('customer/customer')->getCollection()
                    ->addFieldToFilter('customer_email', $email)
                    // ->addFieldToFilter('customer_email', ['in' => $email])
                    ->addFieldToFilter('password', $password);
                $count = 0;
                $customerID = 0;
                foreach ($data->getData() as $data) {
                    $count++;
                    $customerID = $data->getcustomer_id();
                }

                if ($count) {
                    Mage::getSingleton('core/session')->set('logged_in_customer_id', $customerID);
                    // echo "Log In Successfull";
                    $message = [
                        'type'=>'sucess',
                        'message'=>'successful'
                    ];
                     //$this->setRedirect('customer/account/dashboard');
                } else {
                    // echo "Wrong Credentials ! ";
                    $message = [
                        'type'=>'error',
                        'message'=> 'wrong'
                    ];
                    Mage::getSingleton('core/session')->remove('logged_in_customer_id');
                }
            } catch (Exception $e) {
                //var_dump($e->getMessage());
                $message = [
                    'type'=>'error',
                    'message'=> $e->getMessage()
                ];
            }
            echo json_encode($message);
        }
    }


    public function forgotPasswordAction(){
        $layout=$this->getLayout();
        $layout->getChild("head")->addJs('js/page.js');
        $layout->getChild("head")->addJs('js/head.js');
        $layout->getChild("head")->addCss('css/page.css');
        $layout->getChild("head")->addCss('css/head.css');
        $layout->getChild("head")->addCss('../../skin/css/header.css');
        $layout->getChild("head")->addCss('../../skin/css/footer.css');
        
        
        $child= $layout->getChild("content");
        $form=$layout->createBlock("core/template")->setTemplate("customer/forgotPassword.phtml");
        $child->addChild("form",$form);

        $layout->toHtml();
    }

    public function dashboardAction(){
        $layout=$this->getLayout();
        $layout->getChild("head")->addJs('js/page.js');
        $layout->getChild("head")->addJs('js/head.js');
        $layout->getChild("head")->addCss('css/page.css');
        $layout->getChild("head")->addCss('css/head.css');
        $layout->getChild("head")->addCss('../../skin/css/header.css');
        $layout->getChild("head")->addCss('../../skin/css/footer.css');
        
        
        $child= $layout->getChild("content");
        $form=$layout->createBlock("core/template")->setTemplate("customer/dashboard.phtml");
        $child->addChild("form",$form);

        $layout->toHtml();
    }

    public function saveAction(){
        $data=$this->getRequest()->getParams('data');
        print_r($data);
        $productModel=Mage::getModel('customer/customer');
        //  $productModel->setData($data);
         //print_r($productModel);
        $productModel->setData($data)->save();
        print_r($productModel);
    }


    //not work for dashbord show only when login
        // public function loginAction(){

    //     if(!$this->getRequest()->isPost())
    //     {
    //     $layout=$this->getLayout();
    //     $layout->getChild("head")->addJs('js/page.js');
    //     $layout->getChild("head")->addJs('js/head.js');
    //     $layout->getChild("head")->addCss('css/page.css');
    //     $layout->getChild("head")->addCss('css/head.css');
    //     $layout->getChild("head")->addCss('../../skin/css/header.css');
    //     $layout->getChild("head")->addCss('../../skin/css/footer.css');
        
        
    //     $child= $layout->getChild("content");
    //     $form=$layout->createBlock("core/template")->setTemplate("customer/login.phtml");
    //     $child->addChild("form",$form);

    //     $layout->toHtml();

    //     }else{
    //         try{
    //             $data=$this->getRequest()->getParams('login');
    //             // print_r($data);
    //             $message=[];

    //             $custmerModel = Mage::getSingleton("customer/customer")->getCollection()
    //             ->addFieldToFilter('customer_email',$data['customer_email'])
    //             ->addFieldToFilter('password',$data['password']);
    //             $dataModel=$custmerModel->getData();
    //             print_r($dataModel);

    //             if(sizeof($dataModel)== 0){
    //                 throw new Exception('email and password is not match');
    //         }else{
    //             //echo "Login Successful";  
    //             foreach($dataModel as $data)
    //             {
    //             //print_r($dataModel);
    //             Mage::getSingleton('core/session')->set('logged_in_customer_id',$data->getcustomer_id());
    //             echo $data->getcustomer_id();
    //             $message = [
    //                 'type'=>'success',
    //                 'message'=> 'Successful'
    //             ];

    //             $this->setRedirect('customer/account/dashboard');
                
    //         }
    //         }
           
    //         // print_r($data);

    //         }
    //         catch(Exception $e){
    //             $message = [
    //                 'type'=>'error',
    //                 'message'=> $e->getMessage()
    //             ];
    //         }

    //     }
    // }

}

?>