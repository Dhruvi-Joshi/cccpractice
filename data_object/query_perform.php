<pre><?php
error_reporting(E_ERROR | E_PARSE);
require('connection.php');

class sqloperation{

   
    
    function select($table,$columns,$condition){
    $col=[];
    foreach($columns as $_field){
            $col[]="{$_field}";
    }
    $cols = implode(",",$col);
    return "SELECT {$cols} FROM {$table} $condition";
    }



    function insert($table,$data){
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

    function update($table,$data,$condition){
        $columns=$condit=[];
        foreach($data as $_field => $_values){
            $columns[]="`{$_field}`="."'".addslashes($_values)."'";
        }
        $columns=implode(",",$columns);
        foreach($condition as $_field=> $_values){
            $condit[]="`{$_field}`=".addslashes($_values);
        }
        $condit=implode(" AND ",$condit);
        // echo "UPDATE {$table} SET {$columns} WHERE {$condit};";echo"<br>";
            return "UPDATE {$table} SET {$columns} WHERE {$condit};";
    }

    function delete($table,$condition){
        $condit=[];
        foreach($condition as $_field => $_values){
            $condit[]="`{$_field}`="."'".addslashes($_values)."'";
        }
        $condit=implode(" AND ",$condit);
        //echo "DELETE FROM {$table} WHERE {$condit};";echo"<br>";
        return "DELETE FROM {$table} WHERE {$condit};";
    }

}

class executer{

    
    public function execute($conn,$query){
        $result=mysqli_query($conn,$query);
        if($result){
            return "query executed";
        }
        else{
            return "not executrd".mysqli_error($conn);
        }
    }

    public function fetch($conn,$query){
        $datas=[];
        $result=mysqli_query($conn,$query);

        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $datas[]=$row;
            }
        }
        return $datas;

        


      
    }
}
class Data_Collection_Object {
    protected $_data = [];
    public function addData($row){
            $this->_data[] = new Data_Object($row);
    }

    public function getData() {
        return $this->_data;
    }
}
class Data_Object {
    public $_row = [];
    public function __construct($row){
        $this->_row = $row;
    }
    public function __call($name, $args) {
        $name = strtolower(substr($name, 3));
        echo $name;

        if (isset($this->_row[$name])) {
            return $this->_row[$name];
        } else {
            echo "Column not found: {$name}<br>";
            return $args[0]; // Return the default value
        }
        return isset($this->_row[$name])
            ? $this->_row[$name]
            : $args[0];

        print_r($name);
        
        echo "<br/>";
        print_r($args);
    }
}


$operation=new sqloperation();
$execute=new executer();


$table = "ccc_product";
$column = ["`product_id`", "`product_name`", "`sku`"];
$condition = "ORDER BY product_id DESC LIMIT 4;";
$query = $operation->select($table, $column, $condition);
echo $query;



$exe=$execute->execute($conn,$query);
echo $exe;
$exe2=$execute->fetch($conn,$query);
echo $exe2;
//print_r($exe2);
$temp=[$exe2];

$newObj = new Data_Collection_Object();
// $temp = [
//     ['id' => 2, 'name' => 'nanme 2','sku'=>12],
//     ['id' => 3, 'name' => 'nanme 0'],
//     // ['id' => 4, 'name' => 'nanme 8'],
//     // ['id' => 5, 'name' => 'nanme 0'],
//     // ['id' => 6, 'name' => 'nanme 88'],
// ];
print_r($temp);
foreach($temp as $_temp) {
    $newObj->addData($_temp);
    
}
echo '<table>';
foreach($newObj->getData() as $_mmdata) {
    
    
    foreach($_mmdata->_row as $row){

        
        // echo $row['product_id'] . "<br>";
        // echo $row['product_name'] . "<br>";
        // echo $row['sku'] . "<br>";
        

    echo"<tr>";
        echo "<td style='margin: 10px;'>" . $row['product_id'] . "</td>";
        echo "<td style='padding: 10px;'>" . $row['product_name'] . "</td>";
        echo "<td style='padding: 10px;'>" . $row['sku'] . "</td>";
        //echo "<br>";
       // $_mmdata->getSku('Default Name');
    }
    //echo "<br>";
   

    echo"</tr>";
    

    
    
    
    //print_r($_mmdata->getsku('0'));
    
    //echo "<br>";
    //print_r($_mmdata->getproduct_Name());
}
echo '</table>';

?>