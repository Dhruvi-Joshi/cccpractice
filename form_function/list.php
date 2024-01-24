<?php
error_reporting(E_ERROR | E_PARSE);
require('sql_connection.php');

$show="SELECT * FROM ccc_product";
$result=$conn -> query($show);
$arr=[];
while($row=$result->fetch_assoc()){
    $arr[]=$row;
    foreach($arr as $_field => $_values){
       
    }
    
}
print_r($arr);
?>