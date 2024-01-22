<?php
function prime($n){
    for($i=2;$i<$n-1;$i++)
    {
        if($n%$i==0){
            return 0;
        }
    }    
    return 1;
}
$n=13;
$flag=prime($n);
if($flag==1){
    echo "prime";
}
else{
    echo "non prime";
}
?>