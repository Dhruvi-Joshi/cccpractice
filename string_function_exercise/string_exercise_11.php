<?php
function bubble($arr){
    $n=count($arr);
for($i=0;$i<$n;$i++){
    for($j=0;$j<$n-$i-1;$j++){
        if($arr[$j]>$arr[$j+1]){
        $temp=$arr[$j];
        $arr[$j]=$arr[$j+1];
        $arr[$j+1]=$temp;
      
    }
    
}
}for($i=0;$i<$n;$i++){
    echo "<br>";
    echo $arr[$i];
}echo"<br>";
}

$arry=array(6,7,2,5,6);
$n=count($arry);
$ans=bubble($arry);
?>