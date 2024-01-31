<?php
error_reporting(E_ERROR | E_PARSE);
require('connection.php');
require('query_executer.php');


$table = "ccc_product";
$column = ["`product_id`", "`product_name`", "`sku`"];
$condition = "ORDER BY product_id DESC LIMIT 20;";
$query = $operation->select($table, $column, $condition);
echo $query;

$exepro=$execute->execute($conn,$query);
echo $exepro;
$exepro=$execute->fetch($conn,$query);
echo $exepro;




?>
