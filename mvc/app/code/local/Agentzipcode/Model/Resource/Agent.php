<?php
class Agentzipcode_Model_Resource_Agent extends Core_Model_Resource_Abstract{
    public function init(){
        // echo get_class();
        $this->_tableName="ccc_agent";
        $this->_primaryKey= "agent_id";
    }
}
?>