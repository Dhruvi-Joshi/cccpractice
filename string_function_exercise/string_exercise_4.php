<?php

$name="john";

#1
$left=str_pad($name,10,"_",STR_PAD_LEFT);

#2
$right=str_pad($name,8,"*",STR_PAD_RIGHT);

#3
echo $left;
echo "<br>";
echo $right;
?>