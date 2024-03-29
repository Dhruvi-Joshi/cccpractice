<?php
class Agentzipcode_Model_Agent extends Core_Model_Abstract{
    
    public function init(){
         //echo get_class();
        $this->resourceClass="Agentzipcode_Model_Resource_Agent";
        $this->collectionClass="Agentzipcode_Model_Resource_Collection_Agent";
        $this->modelClass="Agentzipcode/Agent";
    }

}
?>