<?php
class lib_connection{

    private $_conn;

    public function __construct()
    {
        $this->connect();
        
    }

    public function connect()
    {
        if (is_null($this->_conn)) {
            $this->_conn = mysqli_connect("localhost", "root", "", "ccc_practice");
            if ($this->_conn === false) {
                die("<h3 style='color: red;'>ERROR: Could not connect. "
                    . mysqli_connect_error() . "</h3>");
            }
            else {
                echo "Connected successfully!";
            }
        }
        return $this->_conn;
        

    }

    public function exec($query)
    {
        

        try {
            $result = $this->connect()->query($query);
             //var_dump($this->connect()->error);
    	} catch(Exception $e) {

    		var_dump($e->getMessage());
    	}
        
    
    }

    public function fetch($query){
        $datas=[];
        $result=mysqli_query($this->connect(),$query);

        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $datas[]=$row;
            }
        }
        return $datas;
    }
}
?>