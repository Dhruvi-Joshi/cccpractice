<?php
class Sales_Model_Order extends Core_Model_Abstract{
    
    public function init(){
        $this->resourceClass="Sales_Model_Resource_Order";
        $this->collectionClass="Sales_Model_Resource_Collection_Order";
        $this->modelClass="Sales/Order";
    }

    public function _beforeSave(){
        $prefix = 'ABC';
        // $id= Mage::getModel('sales/order')->getCollection()->addFieldToOrderBy(['order_id', 'ASC'])
        // ->getOrder_Id();
        // print_r($id);die;
        $sequentialNumber = sizeof(Mage::getModel('sales/order')->getCollection()->getData()) + 1;
        $this->addData('order_number', $prefix . $sequentialNumber);
    }

}
?>