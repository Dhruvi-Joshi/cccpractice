<?php
class Sales_Model_Order_Shipping extends Core_Model_Abstract{

    public function init(){
        $this->resourceClass="Sales_Model_Resource_Order_Shipping";
        $this->collectionClass="Sales_Model_Resource_Collection_Order_Shipping";
        $this->modelClass="Sales/Order_Shipping";
    }
}