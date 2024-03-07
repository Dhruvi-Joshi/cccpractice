<?php

class Tempdiffr_Model_Temp extends Core_Model_Abstract{

    public function init(){
        $this->modelClass='Tempdiffr/Temp';
        $this->resourceClass='Tempdiffr_Model_Resource_Temp';
        $this->collectionClass= 'Tempdiffr_Model_Resource_Collection_Temp';
    }
    
}

?>