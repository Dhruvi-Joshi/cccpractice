<?php

$host = "localhost";
         $user = "root";
         $pass ="";
         $dbName ="ccc_practice";
         $conn = mysqli_connect($host, $user, $pass,$dbName);
         if($conn){
                echo "connect success";
         }
         else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }

?>