<?php
class model_product extends model_abstract{

    public $table='ccc_product';
    public function __construct(){
         //echo "i m hear";
        // echo get_class($this);
    }

    
    public function save($data){
        //echo "<pre>";
        $query=$this->getquerybuilder()->insert($this->table,$data);
        $this->getquerybuilder()->exec($query);
        //echo $query;echo"<br>";
    }

    public function delete($id){
        $cond=['product_id'=>$id];
        $query=$this->getquerybuilder()->delete($this->table,$cond);
        $this->getquerybuilder()->exec($query);
        //echo $query;echo"<br>";
    }

    
}
?>