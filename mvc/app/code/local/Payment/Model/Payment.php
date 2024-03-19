<?php
class Payment_Model_Payment extends Core_Model_Abstract{

    public function option(){
        $option=['credit'=>'Credit Card',
                'cash_on'=>'Cash On Delivery',
                'phone_order'=>'Phone Order'];
        
        return $option;
    }
}

?>