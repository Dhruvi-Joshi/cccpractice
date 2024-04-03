<?php
class Catalog_Model_Product extends Core_Model_Abstract{
    public function init(){
        $this->resourceClass = "Catalog_Model_Resource_Product";
        $this->collectionClass = "Catalog_Model_Resource_Collection_Product";
    }

    public function getStatu() {
        $mapping = [0=>'Enabled',1=>'Disabled'];
        if(isset($this->_data['status'])){
            return $mapping[$this->_data['status']];

        }
    }

    public function getCategory() {
        $mapping = [1=>'sofas',2=>'living',3=>'bedroom',4=>'dining & kitchen',5=>'storage',6=>'study & office',7=>'kids room',8=>'decor',9=>'lamps & lighting',10=>'outdoor'];
        if(isset($this->_data['category_id'])){
            return $mapping[$this->_data['category_id']];

        }
    }

    

    protected function _beforeSave(){
        
    }
}

?>