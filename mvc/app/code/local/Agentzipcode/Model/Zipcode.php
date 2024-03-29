<?php
class Agentzipcode_Model_Zipcode extends Core_Model_Abstract{
    
    public function init(){
        // echo get_class();
        $this->resourceClass="Agentzipcode_Model_Resource_Zipcode";
        $this->collectionClass="Agentzipcode_Model_Resource_Collection_Zipcode";
        $this->modelClass="Agentzipcode/Zipcode";
    }

    

}
?>