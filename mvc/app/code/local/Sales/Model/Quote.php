<?php
class Sales_Model_Quote extends Core_Model_Abstract{

    public function init(){
        $this->resourceClass="Sales_Model_Resource_Quote";
        $this->collectionClass="Sales_Model_Resource_Collection_Quote";
        $this->modelClass="Sales/Quote";
    }

    protected function _beforeSave(){
        $grandTotal = 0 ;
        foreach($this->getItemCollection()->getData() as $_item){
            $grandTotal += $_item->getRowTotal();
            // var_dump($_item->getRowTotal());
        };
        $this->addData('grand_total',$grandTotal);
    }

    public function initQuote(){
        $quoteId=Mage::getSingleton('core/session')->get('quote_id');
       // print_r($quoteId);
        $quoteId=(!$quoteId)?0:$quoteId;
        // echo $quoteId;
        $this->load($quoteId);
        //echo $this->getId();
        if(!$this->getId()){
            //echo 123;
            $quote=Mage::getModel('sales/quote')
            ->setData([
                'tax_percent'=>0,
                'grand_total'=>0
            ])
            ->save();
            Mage::getSingleton('core/session')->set('quote_id',$quote->getId());
            $this->load($quote->getId());
            // print_r($quote);
        }
        
    }

    public function addProduct($product){
        $this->initQuote();
        //print_r($this->getId());
        if($this->getId()){
            Mage::getModel('sales/quote_item')->addItem($this,$product['product_id'],$product['qty']);
            $this->save();
        }
    }

    public function getItemCollection(){
        return Mage::getModel('sales/quote_item')->getCollection()
                    ->addFieldToFilter('quote_id',$this->getId());
    }

}


?>