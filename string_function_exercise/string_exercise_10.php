<?php

function fact($n){
    $a=1;
    for($i=1;$i<=$n;$i++){
       
        $a=$a*$i;
    } 
    return $a;  
}
$n=10;
$ans=fact($n);
echo "$ans";
?>
