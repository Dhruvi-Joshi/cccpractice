<?php

class view_product_list extends model_abstract{
   
    public function __construct(){
        
   }

    public function createlist(){
            $table = "ccc_product";
            $column = ["`product_id`", "`product_name`", "`sku`"];
            $condition = "ORDER BY product_id DESC LIMIT 20;";
            
            $query=$this->getquerybuilder()->select($table,$column,$condition);
            //echo $query;
            $exe=$this->getquerybuilder()->fetch($query);
            //print_r($exe);

            echo '<table border="1">';
            echo '<tr>';
            echo '<th>Product ID</th>';
            echo '<th>Product Name</th>';
            echo '<th>SKU</th>';
            echo '<th>Update</th>';
            echo '<th>Delete</th>';
            echo '</tr>';
            echo"<br>";
            //$objdataobject=new lib_dataobject();
            $list=$this->getdataobject()->DataCollectionObject();
            
            foreach($exe as $_temp) {
                
                //print_r($_temp);
                $list->addData($_temp);
            }
            
            foreach($list->getData() as $_mmdata) {
               ///

               echo '<tr>';

               $row = $_mmdata->getRow();  
       
               echo '<td>' . $row['product_id'] . '</td>';
               echo '<td>' . $row['product_name'] . '</td>';
               echo '<td>' . $row['sku'] . '</td>';
       
               $productId = $row['product_id'];
       
               echo "<td style='margin: 10px;'><a href='view_product.php?id=$productId'>Edit</a></td>";
               echo "<td style='margin: 10px;'><a href='model_product.php?id=$productId&action=delete' onclick='return confirm(\"Are you sure you want to delete this product?\");'>Delete</a></td>";
       
               echo '</tr>';
           }
       

               ///
            
               
            echo '</table>'; 
            echo "<a href='index.php?action=view_form'>form</a>";
    }

}
?>

<!-- echo"<tr>";
                
                foreach($_mmdata->getRow() as $row){
                    
                
            
                echo "<td style='margin: 100px;'>" . $row . "</td>";
                
                    // echo "<td style='margin: 10px;'>" . $row['product_id'] . "</td>";
                    // echo "<td style='padding: 10px;'>" . $row['product_name'] . "</td>";
                    // echo "<td style='padding: 10px;'>" . $row['sku'] . "</td>";
                    
                }
                $productId = $row['product_id'];
                //echo $productId;
                echo "<td style='margin: 10px;'><a href='product.php?id=$productId'>Edit</a></td>";echo $row['product_id'];
                echo "<td style='margin: 10px;'><a href='functions.php'>Delete</a></td>";
            
                echo"</tr>";

                // echo"</tr>";
                echo "<br>";
               // echo '</table>';




 -->
