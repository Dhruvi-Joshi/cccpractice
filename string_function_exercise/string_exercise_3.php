<?php

$sentence="The quick brown fox jumps over the lazy dog";

#1
echo strpos($sentence,"fox");
echo "<br>";

#2
echo strpos($sentence,"cat");
echo "<br>";


$word="cat";
if(str_contains($sentence,$word)){
    echo "yes"."<br>";
}else{
    echo "no"."<br>";
}


#3
echo substr($sentence,0,20);
?>