<?php
class Category_Model_Category extends Core_Model_Abstract{
    
    public function init(){
        $this->resourceClass="Category_Model_Resource_Category";
        $this->collectionClass="Category_Model_Resource_Collection_Category";
        $this->modelClass="Category/Category";
    }

}
?>