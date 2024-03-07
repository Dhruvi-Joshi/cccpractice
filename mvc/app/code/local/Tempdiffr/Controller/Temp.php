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
        print_r($data);
        //echo $data['temprature_one'];
        if((!is_numeric($data['temprature_one']))||(!is_numeric($data['temprature_two']))){
            echo 'enter correct no';
        }
        else{
            if(!($data['unit_one']==$data['unit_two'])){
                $unit=$data['unit_one'];
                $temp_two=$data['temprature_two'];
                $unitCheck=$data['unit_two'];
                
                switch($unit){
                    case 'celsius':
                        $unit_two =((9/5 * $temp_two)+32);
                        echo $unit_two;
                        break;

                    case 'fahrenheit':
                        $unit_two =((5/9 * $temp_two)-32);
                        echo $unit_two;
                        break;

                    case 'kelvin':
                        $unit_two =(5/9 * ($temp_two-32)+273.15);
                        echo $unit_two;
                        break;

                    default:
                        echo 'not selected';
                        break;
                    
                    }

            }
            else{

                $result=
            }

            $productModel=Mage::getModel('catalog/product');
        }
    }

}
?>