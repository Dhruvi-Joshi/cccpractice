<?php
error_reporting(E_ERROR | E_PARSE);
require('connection.php');
// require('functions.php');
require('query_executer.php');



$table = "ccc_category";
$column = ["*"];
$condition = ";";
$query = $operation->select($table, $column, $condition);
echo $query;

$execat=$execute->execute($conn,$query);
echo $execat;
$execat=$execute->fetch($conn,$query);
echo $execat;



?>
