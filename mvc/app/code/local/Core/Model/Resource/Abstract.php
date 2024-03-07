<?php

class Core_Model_Resource_Abstract{

    protected $_tableName = null;
    protected $_primaryKey= null;

    public function __construct(){
        $this->init();
    }

    //above all code movr to resource abstract

    

    public function getPrimaryKey(){
       
        //print_r($abc);
        return $this->_primaryKey;
    }

    public function getTablename(){
        return $this->_tableName;
    }

    public function getAdapter(){
        return new Core_Model_DB_Adapter();
    }

    public function load($id,$columns=null){
        $sql="SELECT * FROM {$this->_tableName} 
        WHERE {$this->_primaryKey}= {$id} LIMIT 1";
        //echo "SELECT * FROM {$this->_tableName} WHERE {$this->_primaryKey}= {$id} LIMIT 1";
   
        return $this->getAdapter()->fetchRow($sql);
    }

    
    // public function save(Catalog_Model_Product $product){
    
    public function save(Core_Model_Abstract $product){
        $_data = $product->getData();
        //echo 12;
        //print_r($_data);    
        if (isset($_data[$this->getPrimaryKey()]) && !empty($_data[$this->getPrimaryKey()])) {
            unset($_data[$this->getPrimaryKey()]);
            $sql = $this->updateSql($this->getTableName(), $_data, [$this->getPrimaryKey()=>$product->getId()]);
            //echo $sql;
            $id = $this->getAdapter()->update($sql);
            //print_r($id);
            // $product->setId($id);
             //echo $sql;
        } else {
            $sql = $this->insertSql($this->getTableName(), $_data);
            //echo $sql;
            $id = $this->getAdapter()->insert($sql);
            $product->setId($id);
        }

        //echo 123;
        // $data=$product->getData();
      

        // if(isset($data[$this->getPrimaryKey()])) {
        //     unset($data[$this->getPrimaryKey()]);
        // }
        // //echo $this->insertSql($this->getTablename(),$data);

        // $sql=$this->insertSql($this->getTablename(),$data);
        // //echo $this->getAdapter()->insert($sql);
        // $id=$this->getAdapter()->insert($sql);
        // $product->setId($id);
        // print_r($product);
        // print_r($id);
        // //print_r ($product->getData());
    }

  

    public function insertSql($table,$data){
        $columns=$values=[];
        foreach($data as $_field => $_value){
                $columns[]="{$_field}";
                $values[]="'".addslashes($_value)."'";
        }
        $columns = implode(",",$columns);
        $values=implode(",",$values);
       //echo "INSERT INTO {$table} ({$columns}) VALUES ({$values});";echo"<br>";
        return "INSERT INTO {$table} ({$columns}) VALUES ({$values});";
     }

    public function updateSql($table,$data,$condition){
        $columns=$condit=[];
        foreach($data as $_field => $_values){
            $columns[]="`{$_field}`="."'".addslashes($_values)."'";
        }
        $columns=implode(",",$columns);
        foreach($condition as $_field=> $_values){
            $condit[]="`{$_field}`=".addslashes($_values);
        }
        $condit=implode(" AND ",$condit);
         //echo "UPDATE {$table} SET {$columns} WHERE {$condit};";echo"<br>";
            return "UPDATE {$table} SET {$columns} WHERE {$condit};";
    }

    public function delete(Core_Model_Abstract $product)
    {
        $arr=[$this->getPrimaryKey()=>$product->getId()];
         //print_r($arr);
        //echo $product->getId();
        $query= $this->deleteSql($this->getTableName(), [$this->getPrimaryKey()=>$product->getId()]);
        $this->getAdapter()->delete($query);
        
    }


    public function deleteSql($table,$condition){
        $condit=[];
        foreach($condition as $_field => $_values){
            $condit[]="`{$_field}`="."'".addslashes($_values)."'";
        }
        $condit=implode(" AND ",$condit);
        //echo "DELETE FROM {$table} WHERE {$condit};";echo"<br>";
        return "DELETE FROM {$table} WHERE {$condit};";
    }

//     public function save(Catalog_Model_Product $product)
//     {
//         $_data = $product->getData();
//         if (isset($_data[$this->getPrimaryKey()])) {
//             unset($_data[$this->getPrimaryKey()]);
//             $sql = $this->updateSql($this->getTableName(), $_data, ["product_id" => $this->getPrimaryKey()->$product->getId()]);
//             $id = $this->getAdapter()->update($sql);
//             // $product->setId($id);
//             // echo $sql;
//         } else {
//             $sql = $this->insertSql($this->getTableName(), $_data);
//             $id = $this->getAdapter()->insert($sql);
//             $product->setId($id);
//         }
//         // echo $sql;
//     }


  // public function delete($id){
    //     $sql=$this->deleteSql($this->getTablename(),['product_id'=>$id]);
    
    // }
   

  

    // public function save(Catalog_Model_Product $product)
    //     {
    //         $_data = $product->getData();
    //         if (isset($_data[$this->getPrimaryKey()]) && !empty($_data[$this->getPrimaryKey()]))
    //         {
    //             unset($_data[$this->getPrimaryKey()]);
    //             $sql = $this->updateSql($this->getTableName(), $_data, [$this->getPrimaryKey()=>$product->getId()]);
    //             $id = $this->getAdapter()->update($sql);
    //             // $product->setId($id);
    //             // echo $sql;
    //         } else {
    //             $sql = $this->insertSql($this->getTableName(), $_data);
    //             $id = $this->getAdapter()->insert($sql);
    //             $product->setId($id);
    //         }
    //         // echo $sql;
    //     }

    
    // public function deleteSql($table,$condition){
    //     $condit=[];
    //     foreach($condition as $_field => $_values){
    //         $condit[]="`{$_field}`="."'".`$_values`."'";
    //     }
    //     $condit=implode(" AND ",$condit);
    //     echo "DELETE FROM {$table} WHERE {$condit};";
    //     return "DELETE FROM {$table} WHERE {$condit};";
           
    //     }
//     public function __construct(){
//         $this->init();
//     }

//     public function init(){ 

//     }

//     public function delete(Catalog_Model_Product $product)
//     {
//         return $this->deleteSql($this->getTablename(), $product->getId());
        
//     }

    

   

}

?>