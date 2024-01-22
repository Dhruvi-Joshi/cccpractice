<?php
$per=10;//in per
$b=100;//in per

//10% of b
$dec_per=($per/100);
echo $dec_per."<br>";
$num_per=($dec_per*$b);
echo $num_per."<br>";

//100% of b
$dec_b=($b/100);
echo $dec_b."<br>";
$num_b=($dec_b*$b);
echo $num_b."<br>";

//a number
$a=$num_per+$num_b;
echo $a."<br>";

//b is less than a so,
$ans=(($a-$b)/$a)*100;
echo $ans."%";
?>
