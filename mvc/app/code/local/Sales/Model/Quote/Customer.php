<?php
class Sales_Model_Quote_Customer extends Core_Model_Abstract{

    public function init(){
        $this->resourceClass="Sales_Model_Resource_Quote_Customer";
        $this->collectionClass="Sales_Model_Resource_Collection_Quote_Customer";
        $this->modelClass="Sales/Quote_Customer";
    }
}