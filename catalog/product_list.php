<?php
error_reporting(E_ERROR | E_PARSE);
require('connection.php');
require('functions.php');

$select=select('ccc_product');
//delete('ccc_product',['product_id'=>]);
$result=$conn -> query($select);
if($result){
    
    //echo "<script>alert('Data show successfully');</script>";
    echo '<table style="margin:50px;">';

    echo"<tr>";
    $row=$result->fetch_assoc();
        foreach($row as $_field=>$_values){
            echo "<th>" . $_field . "</th>";
          //  echo "Update";
           // echo "Delete";
        }
        echo "<th>"."Update"."</th>";
        echo "<th>"."Delete"."</th>";
    echo"</tr>";
    
    $result->data_seek(0);
    while ($row = $result->fetch_assoc()) {
        echo"<tr>";
            foreach($row as $_field => $_values){
                echo "<td style='padding: 10px;'>" . $_values . "</td>";
                
            }
            echo "<td style='padding: 10px;'><a href='product.php?no=" . $row['product_id'] . "'>Edit</a></td>";
        echo "<td style='padding: 10px;'><a href='functions.php?id=" . $row['product_id'] . "'>Delete</a></td>";
       
        
        echo"</tr>";
    }
    
       
    echo "</table>";
    //print_r($arr);
}
    

else{             
    echo "Error: " . $select . "<br>" . mysqli_error($conn);
}


?>
