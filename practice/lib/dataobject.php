<?php
class lib_dataobject{
    private $_data = [];

  function DataCollectionObject() {
    return $this; 
   
  }
     //$_data = [];
     function addData($row){
            $this->_data[] = new DataObject($row);
    }

     function getData() {
        return $this->_data;
    }
}
  class DataObject {
     private $_row = [];
     
     public function __construct($row){
        $this->_row = $row;
    }

    public function getRow() {
        return $this->_row;
    }

     
    public function __call($name, $args) {
        $name = strtolower(substr($name, 3));
        echo $name;

        if (isset($this->_row[$name])) {
            return $this->_row[$name];
        } 
        else {
            echo "Column not found: {$name}<br>";
            return $args[0]; // Return the default value
        }
        return isset($this->_row[$name])
            ? $this->_row[$name]
            : $args[0];

        print_r($name);
        
        echo "<br/>";
        print_r($args);
    }
}


?>