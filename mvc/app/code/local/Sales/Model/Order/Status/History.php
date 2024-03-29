<?php
class Sales_Model_Order_Status_History extends Core_Model_Abstract{

    public function init(){
        $this->resourceClass="Sales_Model_Resource_Order_Status_History";
        $this->collectionClass="Sales_Model_Resource_Collection_Order_Status_History";
        $this->modelClass="Sales/Order_Status_History";
    }

    protected function _beforeSave(){
        //echo 123;
        $orderData=$this->getItemCollection();
        //echo "<pre>";print_r($orderData);
        $defultStatus=Status_Model_Status::DEFAULT_ORDER_STATUS;
        $defultText=Status_Model_Status::DEFAULT_ORDER_STATUS_TEXT;
        //$data=Mage::getModel('Sales/Order_Status_History')->getItemCollection();
        /* foreach($this->getItemCollection()->getData() as $_item){
            echo $_item->getTo_Status();
        } */
        if($orderData){
        //echo $orderData->getTo_Status();
        $to_status= $orderData->getTo_Status();
        $this->addData('from_status',$to_status);
        }
        else{
           // $defult='placeOrder';
            $this->addData('from_status',$defultText);
        }
        $this->addData('action_by',$defultStatus);
        
        

    
    } 
    public function getItemCollection(){
        // $abc= Mage::getModel('Sales/Order_Status_History')->getCollection()
        // ->addFieldToFilter('order_id',$this->getOrder_Id());
        // echo "<pre>";print_r($abc);
        return Mage::getModel('Sales/Order_Status_History')->getCollection()
                    ->addFieldToFilter('order_id',$this->getOrder_Id())
                    ->addFieldToOrderBy(['history_id'=>'DESC'])
                    ->getFirstItem();
    }  
}