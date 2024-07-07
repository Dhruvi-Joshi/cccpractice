<?php

/*for($i=1;$i<=5;$i++){
    for($j=1;$j<=5;$j++){
        echo $j."\n";
    }
    echo "<br>";
}
*/
// $n=10;
// for($i=$n;$i>=1;$i--){
//     for($j=1;$j<=$i;$j++){
//         echo $j."\n";
//     }
//     echo "<br>";
// }

// $n=10;
// for($i=1;$i<=10;$i++){
//     for($j=1;$j<=10;$j++){
//         if($i<=$j){
//             echo("$j"."\n");
//         }
//     }
//     echo "<br>";
// }

// $n=10;

// for($i=1;$i<=10;$i++){
//     for($j=1;$j<=10;$j++){
        
//         if($j <=($n+1)-$i){
//             echo("$j"."\n");
//         }
//     }
//     echo "<br>";
// }


 // left triangle pattern
//  $size = 5;
//  for($i = 1; $i <= $size; $i++) {
//      // print column
//      for($j = 1; $j <= $i; $j++) {
//          echo "*";
//      }
//      echo "<br>";
//  }

//  $size = 5;
//  for($i = 0; $i < $size; $i++) {
//      // print spaces
//      for($j = 1; $j < $size - $i; $j++) {
//          echo "&nbsp;&nbsp;";
//      }
//      // print stars
//      for($k = 0; $k <= $i; $k++) {
//          echo "*";
//      }
//      echo "<br>";
//  }

//   // downward triangle pattern
//   $size = 5;
//   for($i = 1; $i <= $size; $i++) {
//       // print stars
//       for($j = 1; $j <= $size - $i; $j++) {
//           echo "*";
//       }
//       echo "<br>";
//   }

$array=[45,78,67];
$n=count($array);
echo $n;
for($i=0;$i<$n;$i++){
    for($j=1;$j<$n;$j++){
        if($array[$i]>=$array[$j]){
            $temp=$array[$i];
            $array[$i]=$array[$j];
            $array[$j]=$temp;
        }
    }
    
}
print_r($array);

?>