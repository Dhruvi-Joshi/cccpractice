<?php
class Agentzipcode_Model_Resource_Zipcode extends Core_Model_Resource_Abstract{
    public function init(){
        // echo get_class();
        $this->_tableName="ccc_zipcode";
        $this->_primaryKey= "id";
    }
}
?>