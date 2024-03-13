<?php
class Cart_Model_Cart extends Core_Model_Abstract{

    public function init(){
        $this->resourceClass="Cart_Model_Resource_Cart";
        $this->collectionClass="Cart_Model_Resource_Collection_Cart";
        $this->modelClass="Cart/Cart";
    }
}
?>