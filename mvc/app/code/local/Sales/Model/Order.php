<?php
class Sales_Model_Order extends Core_Model_Abstract{
    
    public function init(){
        $this->resourceClass="Sales_Model_Resource_Order";
        $this->collectionClass="Sales_Model_Resource_Collection_Order";
        $this->modelClass="Sales/Order";
    }

}
?>