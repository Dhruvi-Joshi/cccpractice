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

    public function addAddress($address){
        //print_r($address);
        $this->initQuote();
        if($this->getId()){
            // echo 123;
            $customerId=Mage::getSingleton('core/session')->get('logged_in_customer_id');   
            $email = Mage::getModel('customer/customer')->load($customerId)->getCustomer_Email();
            // echo $email;
            Mage::getModel('sales/quote_customer')
                    ->setData($address)
                    ->addData('quote_id', $this->getId())
                    ->addData('customer_id', Mage::getSingleton('core/session')->get('logged_in_customer_id'))
                    ->addData('email', $email)
                    ->save();
        }
        return $this;

    }

    public function addShipping($shipping){
        $this->initQuote();
        if($this->getId()){
            return Mage::getModel('sales/quote_shipping')
                ->setData($shipping)
                ->addData('quote_id', $this->getId())
                ->save();
        }
    }

    public function addShipId($shipId)
    {
        //echo 123;
        $this->initQuote();
        if ($this->getId()) {
            $this->addData('shipping_id', $shipId)
                ->save();
        }
        return $shipId;
    }

    public function addPayment($payment)
    {
        $this->initQuote();
        if ($this->getId()) {
            return Mage::getModel('sales/quote_payment')
                ->setData($payment)
                ->addData('quote_id', $this->getId())
                ->save();
        }

    }

    public function addPayId($payId)
    {
        //echo 456;
        $this->initQuote();
        if ($this->getId()) {
            $this->addData('payment_id', $payId)
                ->save();
        }

        return $payId;
        
    }

    public function convert()
    {

        $this->initQuote();
        if ($this->getId()) {
            $order = $this->convertQuoteToOrder();
            $orderId = $order->getId();
            //echo $orderId;
            $address = $this->convertQuoteAddToOrderAdd($orderId);
            $item = $this->convertItemCollection($orderId);

            $payment = $this->convertPayment($orderId);
            $order_payment=Mage::getSingleton('sales/quote')->addShipId($payment->getId());
            echo $order_payment;


            $shipping = $this->convertShipping($orderId);
            $order_shipping=Mage::getSingleton('sales/quote')->addPayId($shipping->getId());
            echo $order_shipping;
            $order->addData('payment_id',$order_payment)->save();
            $order->addData('shipping_id',$order_shipping)->save();
            $this->addData('order_id', $order->getId())->save();
        }
    }

    public function convertQuoteToOrder(){
        // $abc= $this->getData();
        // print_r($abc);
        // // echo $this->getId();
        // $a= Mage::getModel('sales/order')
        //     ->setData($this->getData())   
        //     ->removeData('quote_id')
        //     ->removeData('order_id')
        //     ->removeData('payment_method')
        //     ->removeData('shipping_method')
        //     ->save();

        //     print_r($a);die;
        echo $this->order_payment();
        return Mage::getModel('sales/order')
            ->setData($this->getData())   
            ->removeData('quote_id')
            ->removeData('order_id')
            ->removeData('payment_id')
            ->removeData('shipping_id')
            ->save();
        
    }

    public function convertQuoteAddToOrderAdd($orderId){

        if ($this->getId()) {

            $data = Mage::getModel('sales/quote_customer')
                ->getCollection()
                ->addFieldToFilter('quote_id', $this->getId())
                ->getFirstItem();
            return Mage::getModel('sales/order_customer')
                ->setData($data->getData())
                ->removeData('quote_customer_id')
                ->removeData('quote_id')
                ->addData('order_id', $orderId)
                ->save();
        }
    }

    public function convertItemCollection($orderId){
        foreach ($this->getItemCollection()->getData() as $_item) {
            Mage::getModel('sales/order_item')
                ->setData($_item->getData())
                ->removeData('item_id')
                ->removeData('quote_id')
                ->addData('order_id', $orderId)
                ->save();
        }
        return $this;
    }

    public function convertPayment($orderId)
    {
        if ($this->getId()) {

            $data = Mage::getModel('sales/quote_payment')
                ->getCollection()
                ->addFieldToFilter('quote_id', $this->getId())
                ->getFirstItem();   
            return Mage::getModel('sales/order_payment')
                ->setData($data->getData())  
                ->removeData('payment_id')
                ->removeData('quote_id')
                ->addData('order_id', $orderId)
                ->save();
        }
    }

    public function convertShipping($orderId)
    {
        if ($this->getId()) {
        $data = Mage::getModel('sales/quote_shipping')
            ->getCollection()
            ->addFieldToFilter('quote_id', $this->getId())
            ->getFirstItem();
            // print_r($data->getData());
        return Mage::getModel('sales/order_shipping')
            ->setData($data->getData())  
            ->removeData('shipping_id')
            ->removeData('quote_id')
            ->addData('order_id', $orderId)
            ->save();
        }
    }

}


?>