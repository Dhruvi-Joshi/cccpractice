<?php
function fibo($n){
    $a1=0;
    $a2=1;
    echo "$a1"."\n";
    echo "$a2"."\n";
    for($i=3;$i<=$n;$i++){
        $ans=$a1+$a2;
        $a1=$a2;
        $a2=$ans;
        echo $ans;echo"\n";
    }

}
$n=15;
fibo($n);
?>