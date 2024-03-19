<?php
class Sales_Model_Order_Customer extends Core_Model_Abstract{

    public function init(){
        $this->resourceClass="Sales_Model_Resource_Order_Customer";
        $this->collectionClass="Sales_Model_Resource_Collection_Order_Customer";
        $this->modelClass="Sales/Order_Customer";
    }
}