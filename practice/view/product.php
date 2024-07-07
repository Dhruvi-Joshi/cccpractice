<?php
class view_product{
    public function __constract(){
    //  echo "i m in block";
    }

    public function createform(){
        $value=array('simple'=>'simple','bundle'=>'bundle');
        $option=array('college'=>'college','pg'=>'pg','hostel'=>'hostel');
        $status=array('enabled'=>'Enabled','disabled'=>'Disabled');
        $form= '<form action="" method="POST">';
        $form .='<div>';
        $form .= $this->createtextfield('pdata[product_name]','Product Name:');
        $form .='</div>';
        $form .='<div>';
        $form .= $this->createtextfield('pdata[sku]','SKU:');
        $form .='</div>';
        $form .='<div>';
        $form .= $this->creatradiobutton('pdata[product_type]','Product Type:',$value,'simple');
        $form .='</div>';
        $form .='<div>';
        $form .= $this->createselect('pdata[category]','Category:',$option);
        $form .='</div>';
        $form .='<div>';
        $form .= $this->createtextfield('pdata[manu_cost]','Manufacturer Cost:');
        $form .='</div>';
        $form .='<div>';
        $form .= $this->createtextfield('pdata[ship_cost]','Shipping Cost:');
        $form .='</div>';
        $form .='<div>';
        $form .= $this->createtextfield('pdata[total_cost]','Total Cost:');
        $form .='</div>';
        $form .='<div>';
        $form .= $this->createtextfield('pdata[price]','Price:');
        $form .='</div>';
        $form .='<div>';
        $form .= $this->createselect('pdata[status]','Status:',$status);
        $form .='</div>';
        $form .='<div>';
        $form .= $this->createdate('pdata[create_at]','Date:');
        $form .='</div>';
        $form .='<div>';
        $form .= $this->createsubmitbutton('submit');
        $form .='</div>';
        $form .= '</form>';
        return $form;
        // echo $form;
        
    }

    public function createtextfield($name,$title,$value='',$id='') {
        return '<span>'. $title .'</span><input id="'.$id.'" type="text" name="'.$name.'" value="'.$value.'">';
    }

    public function creatradiobutton($name,$title,$option='',$selected=''){
        $radio= '<span>'. $title .'</span>';
          foreach($option as $value=>$label){
            $checked = ($value == $selected) ? 'checked' : '';
            $radio .= '<input type="radio" name="' . $name . '" value="' . $value . '" ' . $checked . '>';
            $radio .= '<label>' . $label . '</label>';
            
        }
        return $radio;
    }   

    public function createselect($name,$title,$option){
        $droupdown='<span>'.$title.'<span>';
        $droupdown .='<select name="'.$name.'">';
        foreach($option as $value=>$label){
            $droupdown .='<option value="'.$value.'">'.$label.'</option>'; 
        }
        $droupdown.='</select>';
        return $droupdown;
    }

    public function createdate($name,$title){
        return '<span>'.$title.'</span><input type="date" name="'.$name.'">';
    }
    public function createsubmitbutton($title) {
        return '<input type="submit" name="submit">';
    }

    public function tohtml(){
       //echo 123;
       return $this->createform();
       
    }
}
?>
