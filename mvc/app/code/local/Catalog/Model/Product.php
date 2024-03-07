<?php
class Catalog_Model_Product extends Core_Model_Abstract{
    public function init(){
        $this->resourceClass = "Catalog_Model_Resource_Product";
        $this->collectionClass = "Catalog_Model_Resource_Collection_Product";
    }

    public function getStatus() {
        $mapping = [0=>'Enabled',1=>'Disabled'];
        if(isset($this->_data['status'])){
            return $mapping[$this->_data['status']];

        }
    }

    public function getCategory() {
        $mapping = [1=>'bar & game room',2=>'bedroom',3=>'decor',4=>'dining & kitchen',5=>'lighting',6=>'living room',7=>'mattresses',8=>'office',9=>'outdoor'];
        if(isset($this->_data['category_id'])){
            return $mapping[$this->_data['category_id']];

        }
    }

    protected function _beforeSave(){
        
    }
}

?>