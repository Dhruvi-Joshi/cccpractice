<?php
class Status_Model_Status extends Core_Model_Abstract{

    const DEFAULT_ORDER_STATUS =1;
    const DEFAULT_ORDER_STATUS_TEXT ='pending';
    public function option(){
        $option=['shipping'=>'shipping',
                'shipped'=>'shipped',
                'Arrived'=>'Arrived',
                'collected'=>'collected'
            ];

        return $option;
    }
}

?>