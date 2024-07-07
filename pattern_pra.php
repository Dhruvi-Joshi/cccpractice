<?php

for($i=0;$i<=5;$i++){
    for($j=0;$j<=5;$j++){
        echo "*"." ";
    }
    echo"<br>";
}
echo"<br><br>";

for($i=1;$i<=5;$i++){
    for($j=1;$j<=5;$j++){
        echo $i." ";
    }
    echo"<br>";
}
echo"<br><br>";

for($i=1;$i<=5;$i++){
    for($j=1;$j<=5;$j++){
        echo $j." ";
    }
    echo"<br>";
}
echo"<br><br>";

for($i=5;$i>=1;$i--){
    for($j=1;$j<=5;$j++){
        echo $i." ";
    }
    echo"<br>";
}
echo"<br><br>";

for($i=1;$i<=5;$i++){
    for($j=5;$j>=1;$j--){
        echo $j." ";
    }
    echo"<br>";
}
echo"<br><br>";

for($i='A';$i<='E';$i++){
    for($j='A';$j<='E';$j++){
        echo $i." ";
    }
    echo "<br>";
}
echo"<br><br>";

for($i='A';$i<='E';$i++){
    for($j='A';$j<='E';$j++){
        echo $j." ";
    }
    echo "<br>";
}
echo"<br><br>";

for($i='A';$i>='E';$i++){
    for($j='E';$j>='A';$j--){
        echo $j." ";
    }
    echo "<br>";
}
echo "<br><br>";

for($i=1;$i<=5;$i++){
    for($j=5;$j>=1;$j--){
        if($i>=$j){
            echo "*";
        }
        else{
            echo " ";
        }
    }
    echo"<br>";
}
echo "<br><br>";
$n=5;
for($i=1;$i<=5;$i++){
    for($j=1;$j<=5;$j++){
        if($i<=$j){
            echo "*";
        }
    }
    echo"<br>";
}
echo"<br><br>";

$n=5;
for($i=1;$i<=5;$i++){
    for($j=1;$j<=5;$j++){
        if($i<=$j){
            echo "*";
        }
    }
    echo"<br>";
}
echo"<br><br>";

?>