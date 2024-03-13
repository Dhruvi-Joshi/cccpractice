<?php

class Tempdiffr_Controller_Temp extends Core_Controller_Front_Action{

    public function formAction(){
        $layout=$this->getLayout();
        $child=$layout->getChild("content");

        $form=$layout->createBlock('tempdiffr/temp');

        $child->addChild('form',$form);
        $layout->toHtml();

    }

    public function saveAction(){
        
        $data=$this->getRequest()->getParams('temp');
        
        //print_r($data);
        $tempModel=Mage::getModel('tempdiffr/temp');
        //echo $data['temprature_one'];
        if((!is_numeric($data['temprature_one']))||(!is_numeric($data['temprature_two']))){
            echo 'enter correct no';
        }
        
        else{
            if(!($data['unit_one']==$data['unit_two'])){
                $unit=$data['unit_one'];
                $unit_two=$data['unit_two'];
                $temp_one=$data['temprature_one'];
                $temp_two=$data['temprature_two'];
                
               
                
                switch($unit){
                    case 'c':
                        echo 'c';
                        //echo $unit_two;
                                switch($unit_two){
                                        case 'f':
                                            $value_two=(5/9*$temp_two)-32;
                                            //echo 'f';
                                            break;
                                        
                                        case 'k':
                                            $value_two=$temp_two-273.15;
                                            //echo 'k';
                                            break;

                                    default:
                                    echo 'not selected';
                                    break;

                                }
                        break;

                    case 'f':
                        
                        //echo $unit_two;
                                switch($unit_two){
                                        case 'c':
                                            $value_two=(9/5*$temp_two)+32;
                                            //echo 'c';
                                            break;
                                        
                                        case 'k':
                                            $value_two=($temp_two-273.15) * 9/5 + 32;
                                            echo 'k';
                                            break;

                                    default:
                                    echo 'not selected';
                                    break;
                                }

                        break;

                    case 'k':
                        
                        //echo $unit_two;
                            switch($unit_two){
                                    case 'c':
                                        $value_two=$temp_two+273.15;
                                        //echo 'c';
                                        break;
                                    
                                    case 'f':
                                        $value_two=5/9*($temp_two-32)+273.15;
                                        //echo 'f';
                                        break;

                                default:
                                echo 'not selected';
                                break;
                            }
                        break;

                    default:
                        echo 'not selected';
                        break;
                    
                    }
                    // $temp_one=$data['temprature_one'];
                    // echo '<br>';echo $temp_one;
                    
                    $result=$tempModel->operation($data['temprature_one'],$data['opration'],$value_two);
                    
                    $data['result'] = $result; 

            }
            else{
                //echo 'same';
                $result=$tempModel->operation($data['temprature_one'],$data['opration'],$data['temprature_two']);
                echo $result;
                 $data['result'] = $result; 
                
            }
            
            // echo "<pre>";
            
            print_r($data);
            $obj=$tempModel->setData($data)->save();
            $session=$obj->getId();
        Mage::getSingleton('core/session')->set('session_id', $session);
        $id=Mage::getSingleton('core/session')->get('session_id');
        echo $id;
        $temp=Mage::getModel('tempdiffr/temp') ->setData(['id'=>$obj->getId(),'session_id'=>$id])->save();
       

                
            
        }
    }


    public function listAction(){
        $layout=$this->getLayout();
        $layout->getChild("head")->addCss('../../skin/css/header.css');
        $layout->getChild("head")->addCss('../../skin/css/footer.css');
        
        $child= $layout->getChild("content");

        $list=$layout->createBlock("tempdiffr/list");
        $child->addChild("list",$list);

        $layout->toHtml();

    }

}
?>