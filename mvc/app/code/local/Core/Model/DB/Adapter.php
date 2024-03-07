<?php
class Core_Model_DB_Adapter{
    public $config=[
        "host"=>"localhost",
        "user"=> "root",
        "password"=> "",
        "db"=> "tables",

    ];
  // public $conn=mysqli_connect($host, $user, $password,$db);
    public $connect=null;

    public function connect(){
        if(is_null($this->connect)){
            $this->connect = mysqli_connect(
        $this->config["host"],
         $this->config["user"],
        $this->config["password"],
        $this->config["db"]
            );
 
        }
       
        return $this->connect;
    }

    public function fetchAll($query){
        $row = [];
        $sql = mysqli_query($this->connect(),$query);
        while($_row = mysqli_fetch_assoc($sql))
        {
            $row[] =$_row;
        }
        return $row;

    }

    public function fetchPairs($query){

    }

    public function fetchOne($query){

    }

    public function fetchRow($query){
        $row=[];
        $data=mysqli_query($this->connect(),$query);
        while ($_row=mysqli_fetch_assoc($data)){
            $row=$_row;
        }
        //print_r($row);
        return $row;

    }

    public function insert($query){
        
        if(mysqli_query($this->connect(),$query)){
           // return true;
            return mysqli_insert_id($this->connect());
        }else{
           
            return false;
        }

    }

    public function update($query){
        if(mysqli_query($this->connect(),$query)){
           
             return true;
         }else{
          
             return false;
         }

    }

    public function delete($query){
        
        if(mysqli_query($this->connect(),$query)){
            // return true;
             return true;
         }else{
            
             return false;
         }

    }

    public function query($query){

    }
}
?>