<?php
class Shipping_Model_Shipping extends Core_Model_Abstract{

    public function option(){
        $option=['express'=>'Express',
                'freight'=>'Freight'];

        return $option;
    }
}

?>