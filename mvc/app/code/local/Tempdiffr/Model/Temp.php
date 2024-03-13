<?php

class Tempdiffr_Model_Temp extends Core_Model_Abstract{

    

    public function init(){
        $this->modelClass='Tempdiffr/Temp';
        $this->resourceClass='Tempdiffr_Model_Resource_Temp';
        $this->collectionClass= 'Tempdiffr_Model_Resource_Collection_Temp';
    }

    public function operation($value1,$opration,$value2){
        //echo '////'.$value1.'////'.$opration.'/////'.$value2.'////';
        if($opration=='add'){
            $result=$value1+$value2;
            //echo $result;
             return $result;
        }
        else{
            $result=$value1-$value2;
            //echo $result;
             return $result;
        }

    }

   
    
}

?>