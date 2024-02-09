
<?php
error_reporting(E_ERROR | E_PARSE);
require('connection.php');
require('query_builder.php');


class executer{
    public function execute($conn,$query){
        $result=mysqli_query($conn,$query);
        if($result){
            return "query executed";
        }
        else{
            return "not executrd".mysqli_error($conn);
        }
    }

    public function fetch($conn,$query){
        $result=$conn -> query($query);
        if($result){
            echo '<table style="margin:50px;">';

            echo"<tr>";
            $row=$result->fetch_assoc();
                foreach($row as $_field=>$_values){
                    echo "<th>" . $_field . "</th>";
                }
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

        }
        else{
            return "not executrd".mysqli_error($conn);
        }

        
    }
}
$operation=new sqloperation();
$execute=new executer();

// $table = "ccc_product";
// $column = ["`product_id`", "`product_name`", "`sku`"];
// $condition = "ORDER BY product_id DESC LIMIT 20;";
// $query = $operation->select($table, $column, $condition);
// echo $query;
//$query="DELETE FROM ccc_product WHERE `product_id`='10';";

// $executer=$execute->execute($query);
// echo $executer;
// $exe=$execute->execute($conn,$query);
// echo $exe;
// $exe=$execute->fetch($conn,$query);
// echo $exe;
?>