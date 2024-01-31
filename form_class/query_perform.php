<?php
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
            return "UPDATE {$table} SET {$columns} WHERE {$condit};";echo"<br>";
    }

    function delete($table,$condition){
        $condit=[];
        foreach($condition as $_field => $_values){
            $condit[]="`{$_field}`="."'".addslashes($_values)."'";
        }
        $condit=implode(" AND ",$condit);
        //echo "DELETE FROM {$table} WHERE {$condit};";echo"<br>";
        return "DELETE FROM {$table} WHERE {$condit};";echo"<br>";
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
        $result=mysqli_query($conn,$query);
        if($result){
            echo '<table style="margin:50px;">';

            echo"<tr>";
            $row=$result->fetch_assoc();
                foreach($row as $_field=>$_values){
                    echo "<th>" . $_field . "</th>";
                }
            echo"</tr>";
            
            $result->data_seek(0);
            while ($row = $result->fetch_assoc()) {
                echo"<tr>";
                    foreach($row as $_field => $_values){
                        echo "<td style='padding: 10px;'>" . $_values . "</td>";
                        
                    }
                echo"</tr>";
            }
            echo "</table>";

        }
        else{
            return "not executrd".mysqli_error($conn);
        }
    }
}


$operation=new sqloperation();
$execute=new executer();


$table = "ccc_product";
$column = ["`product_id`", "`product_name`", "`sku`"];
$condition = "ORDER BY product_id DESC LIMIT 20;";
$query = $operation->select($table, $column, $condition);
echo $query;

// $table1="ccc_category";
// $column1=["*"];
// $condition1=";";
// $query2=$operation->select($table1, $column1, $condition1);
// echo $query2;

// $table="ccc_product";
// $value=array('id'=>1,'name'=>"pen",'price'=>10);
// $query3=$operation->insert($table,$value);
// echo $query3;

// $table4="ccc_category";
// $value4=array('no'=>2,'name'=>"PG");
// $query4=$operation->insert($table4,$value4);
// echo $query4;

// $no=10;
// $table5="ccc_product";
// $value5=array('id'=>1,'name'=>"pen",'price'=>10);
// $condition5 = ['product_id'=>$no];
// $query5=$operation->update($table5,$value5,$condition5);
// echo $query5;

// $no=146;
// $table6="ccc_product";
// $condition6 = ['product_id'=>$no];
// $query6=$operation->delete($table6,$condition6);
// echo $query6;
// $exe=$execute->execute($conn,$query6);
// echo $exe;
$exe=$execute->execute($conn,$query);
echo $exe;
$exe2=$execute->fetch($conn,$query);
echo $exe2;


?>