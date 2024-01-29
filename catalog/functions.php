<?php
error_reporting(E_ERROR | E_PARSE);
require('connection.php');




function selectproduct($table){
    return "SELECT `product_id`,`product_name`, `sku`, `category` FROM {$table} ORDER BY update_at DESC LIMIT 20;";echo"<br>";
    //return "SELECT * FROM {$table};";
}

function select($table){
       return "SELECT * FROM {$table};";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data=$_POST['data'];
        $cat=$_POST['cat'];
            
    
        function insert($table,$data){
            $columns=$values=[];
            foreach($data as $_field => $_value){
                    $columns[]="{$_field}";
                    $values[]="'".addslashes($_value)."'";
            }
            $columns = implode(",",$columns);
            $values=implode(",",$values);
            //echo "INSERT INTO {$table} ({$columns}) VALUES ({$values});";echo"<br>";
            return "INSERT INTO {$table} ({$columns}) VALUES ({$values});";
        }

            if (isset($_POST['submit'])){
                $insert=insert('ccc_product',$data);
                if($conn->query($insert)=== TRUE){
                    echo "<script>alert('Data inserted successfully');</script>";
                }
                else{             
                    echo "Error: " . $insert . "<br>" . mysqli_error($conn);
                }

            }
  
            if (isset($_POST['cat_submit'])){
                $cat_insert=insert('ccc_category',$cat);
                if($conn->query($cat_insert)=== TRUE){
                    echo "<script>alert('Category Data inserted successfully');</script>";
                }
                else{             
                    echo "Error: " . $cat_insert . "<br>" . mysqli_error($conn);
                }
            }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])){
    $no = $_POST['no'];
    $data=$_POST['data'];
                function update($table,$data,$condition){
                    $columns=$condit=[];
                    foreach($data as $_field => $_values){
                        $columns[]="`{$_field}`="."'".addslashes($_values)."'";
                    }
                    $columns=implode(",",$columns);
                    foreach($condition as $_field=> $_values){
                        $condit[]="`{$_field}`=".addslashes($_values);
                    }
                    $condit=implode(" AND ",$condit);
                    // echo "UPDATE {$table} SET {$columns} WHERE {$condit};";echo"<br>";
                        return "UPDATE {$table} SET {$columns} WHERE {$condit};";echo"<br>";
                }

                $update=update('ccc_product',$data,['product_id'=>$no]);
                if($conn->query($update)=== TRUE){
                    echo "<script>alert('Data update successfully');</script>";
                }
                else{             
                    echo "Error: " . $update . "<br>" . mysqli_error($conn);
                }
    }
}
if(isset($_GET['id'])) {
        
        $id = $_GET['id'];

        function delete($table,$condition){
            $condit=[];
            foreach($condition as $_field => $_values){
                $condit[]="`{$_field}`="."'".addslashes($_values)."'";
            }
            $condit=implode(" AND ",$condit);
            //echo "DELETE FROM {$table} WHERE {$condit};";echo"<br>";
            return "DELETE FROM {$table} WHERE {$condit};";echo"<br>";
        }

        $delete=delete('ccc_product',['product_id'=>$id]);
        if($conn->query($delete)=== TRUE){
            echo "<script>alert('Data delete successfully');</script>";   
        }
        else{             
            echo "Error: " . $delete . "<br>" . mysqli_error($conn);
        }
}




?>