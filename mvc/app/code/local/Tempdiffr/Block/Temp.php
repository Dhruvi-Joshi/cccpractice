<?php
class Tempdiffr_Block_Temp extends Core_Block_Template{
    public function __construct(){

        $this->setTemplate('tempdiffr/form.phtml');

    }

    public function option(){
        $option=['c'=>'celsius',
                'f'=>'fahrenheit',
                'k'=>'kelvin'];
                return $option;
    }
}
?>