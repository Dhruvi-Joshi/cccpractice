<?php
class Sales_Model_Order_Item extends Core_Model_Abstract{

    public function init(){
        $this->resourceClass="Sales_Model_Resource_Order_Item";
        $this->collectionClass="Sales_Model_Resource_Collection_Order_Item";
        $this->modelClass="Sales/Order_Item";
    }
    
}
?>