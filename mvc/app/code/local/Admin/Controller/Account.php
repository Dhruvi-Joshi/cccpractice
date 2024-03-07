<?php
class Admin_Controller_Account extends Core_Controller_Front_Action{

    protected $_allowAction=['login'];

    public function testAction(){
        echo 123;
    }

    public function loginAction(){

        // var_dump(Admin_Model_User::USERNAME);
        // var_dump(Admin_Model_User::PASSWORD);
        if (!$this->getRequest()->isPost()) {
            $layout=$this->getLayout();
            $layout->getChild("head")->addCss('../../skin/css/header.css');
            $layout->getChild("head")->addCss('../../skin/css/footer.css');
            
            
            $child= $layout->getChild("content");
            $login=$layout->createBlock("core/template")->setTemplate("catalog/admin/login.phtml");
            $child->addChild("login",$login);
    
            $layout->toHtml();
            } else {
                try {
                    $loginData =$this->getRequest()->getParams('admin');
                    // print_r($loginData);
                    //var_dump(Admin_Model_User::USERNAME);
                    //var_dump(Admin_Model_User::PASSWORD);
                    $username= $loginData['username'];
                    $password = $loginData['password'];
                   if($username==Admin_Model_User::USERNAME && $password==Admin_Model_User::PASSWORD){
                    Mage::getSingleton('core/session')->set('logged_in_admin_username',$username);
                    echo"login success";
                    $this->setRedirect("admin/catalog_product/list");
                   }
                   else{
                    echo "wrong credentions";
                    Mage::getSingleton('core/session')->remove('logged_in_admin_username');
                   }
                } catch (Exception $e) {
                    var_dump($e->getMessage());
                }
            }
    }

}

?>