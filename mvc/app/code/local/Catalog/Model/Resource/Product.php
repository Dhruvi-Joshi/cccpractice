<?php
class Catalog_Model_Resource_Product extends Core_Model_Resource_Abstract{

    // protected $_tableName = null;
    // protected $_primaryKey= null;

    // public function __construct(){
    //     $this->init();
    // }

    // //above all code movr to resource abstract

    

    // public function getPrimaryKey(){
    //     return $this->_primaryKey;
    // }

    // public function getTablename(){
    //     return $this->_tableName;
    // }

    // public function getAdapter(){
    //     return new Core_Model_DB_Adapter();
    // }

    // public function load($id,$columns=null){
    //     $sql="SELECT * FROM {$this->_tableName} 
    //     WHERE {$this->_primaryKey}= {$id} LIMIT 1";
    //     return $this->getAdapter()->fetchRow($sql);
    //     //echo "SELECT * FROM {$this->_tableName} WHERE {$this->_primaryKey}= {$id} LIMIT 1";
    // }

    // public function save(Catalog_Model_Product $product){
    //     //echo 123;
    //     // $data=$product->getData();
      

    //     // if(isset($data[$this->getPrimaryKey()])) {
    //     //     unset($data[$this->getPrimaryKey()]);
    //     // }
    //     // //echo $this->insertSql($this->getTablename(),$data);

    //     // $sql=$this->insertSql($this->getTablename(),$data);
    //     // //echo $this->getAdapter()->insert($sql);
    //     // $id=$this->getAdapter()->insert($sql);
    //     // $product->setId($id);
    //     // print_r($product);
    //     // print_r($id);
    //     // //print_r ($product->getData());

    //     $_data = $product->getData();
    //     if (isset($_data[$this->getPrimaryKey()])) {
    //         unset($_data[$this->getPrimaryKey()]);
    //         $sql = $this->updateSql($this->getTableName(), $_data, ["product_id" => $this->getPrimaryKey()->$product->getId()]);
    //         $id = $this->getAdapter()->update($sql);
    //         // $product->setId($id);
    //         // echo $sql;
    //     } else {
    //         $sql = $this->insertSql($this->getTableName(), $_data);
    //         $id = $this->getAdapter()->insert($sql);
    //         $product->setId($id);
    //     }
    // }

    // public function delete($id){
    //     $sql=$this->deleteSql($this->getTablename(),['product_id'=>$id]);
    
    // }

    // public function insertSql($table,$data){
    //     $columns=$values=[];
    //     foreach($data as $_field => $_value){
    //             $columns[]="{$_field}";
    //             $values[]="'".addslashes($_value)."'";
    //     }
    //     $columns = implode(",",$columns);
    //     $values=implode(",",$values);
    //    // echo "INSERT INTO {$table} ({$columns}) VALUES ({$values});";echo"<br>";
    //     return "INSERT INTO {$table} ({$columns}) VALUES ({$values});";
    // }

    // function updateSql($table,$data,$condition){
    //     $columns=$condit=[];
    //     foreach($data as $_field => $_values){
    //         $columns[]="`{$_field}`="."'".addslashes($_values)."'";
    //     }
    //     $columns=implode(",",$columns);
    //     foreach($condition as $_field=> $_values){
    //         $condit[]="`{$_field}`=".addslashes($_values);
    //     }
    //     $condit=implode(" AND ",$condit);
    //     // echo "UPDATE {$table} SET {$columns} WHERE {$condit};";echo"<br>";
    //         return "UPDATE {$table} SET {$columns} WHERE {$condit};";
    // }

    // function deleteSql($table,$condition){
    //     $condit=[];
    //     foreach($condition as $_field => $_values){
    //         $condit[]="`{$_field}`="."'".`{$_values}`."'";
    //     }
    //     $condit=implode(" AND ",$condit);
    //     return "DELETE FROM {$table} WHERE {$condit};";
           
    //     }
    // Above all code move to core resourse abstract

    public function init(){
        $this->_tableName="catalog_product";
        $this->_primaryKey="product_id";
    }

}

?>