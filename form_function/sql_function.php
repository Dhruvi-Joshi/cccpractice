<?php
require('sql_connection.php');

$data=$_POST['data'];
print_r($data);

function insert($table,$data){
    $columns=$values=[];
  foreach($data as $_field => $_value){
        $columns[]="{$_field}";
        $values[]="'".addslashes($_value)."'";
  }
  $columns = implode(",",$columns);
  $values=implode(",",$values);
  echo "INSERT INTO {$table} ({$columns}) VALUES ({$values});";
  return "INSERT INTO {$table} ({$columns}) VALUES ({$values});";
}

function update($table,$data,$condition){
    $columns=$condit=[];
    foreach($data as $_field => $_values){
        $columns[]="`{$_field}`="."'".addslashes($_values)."'";
    }
    $columns=implode(",",$columns);
    foreach($condition as $_field=> $_values){
        $condit[]="`{$_field}`="."'".addslashes($_values)."'";
    }
   $condit=implode(" AND ",$condit);
    return "UPDATE {$table} SET {$columns} WHERE {$condit};";echo"<br>";
}

function delete($table,$condition){
    $condit=[];
    foreach($condition as $_field => $_values){
        $condit[]="`{$_field}`="."'".addslashes($_values)."'";
    }
    $condit=implode(" AND ",$condit);
    return "DELETE FROM {$table} WHERE {$condit};";echo"<br>";
}




$insert=insert('ccc_product',$data);
if($conn->query($insert)=== TRUE){
    echo "<script>alert('Data inserted successfully');</script>";
}
else{             
    echo "Error: " . $insert . "<br>" . mysqli_error($conn);
}

$update=update('ccc_product',$data,['sku'=>'2101']);
if($conn->query($update)=== TRUE){
    echo "<script>alert('Data update successfully');</script>";
}
else{             
    echo "Error: " . $update . "<br>" . mysqli_error($conn);
}



$delete=delete('ccc_product',['product_name'=>'']);
if($conn->query($delete)=== TRUE){
    echo "<script>alert('Data delete successfully');</script>";
}
else{             
    echo "Error: " . $delete . "<br>" . mysqli_error($conn);
}
/*update('abc',$data,['id'=>10,'name'=>"poi"]);
delete('abc',['id'=>10,'name'=>"poi"])*/

?>