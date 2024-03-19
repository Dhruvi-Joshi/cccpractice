<?php
class Sales_Model_Order_Payment extends Core_Model_Abstract{

    public function init(){
        $this->resourceClass="Sales_Model_Resource_Order_Payment";
        $this->collectionClass="Sales_Model_Resource_Collection_Order_Payment";
        $this->modelClass="Sales/Order_Payment";
    }
}