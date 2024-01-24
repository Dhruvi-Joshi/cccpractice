<?php
error_reporting(E_ERROR | E_PARSE);
if(isset($_POST["submit"])){
    $host = "localhost";
         $user = "root";
         $pass ="";
         $dbName ="ccc_practice";
         $conn = mysqli_connect($host, $user, $pass,$dbName);
         if($conn){
            //echo"connection sucess!";
            $name=$_POST["pro_name"];
            $sku=$_POST["pro_sku"];
            $types=$_POST["types"];
            $category=$_POST["pro_cate"];
            $manu=$_POST["manu_cost"];
            $shipping=$_POST["ship_cost"];
            $total=$_POST["total_cost"];
            $price=$_POST["price"];
            $status=$_POST["status"];
            $create=$_POST["create"];
            $sql="INSERT INTO ccc_product(product_name,sku,product_type,category,manu_cost,ship_cost,total_cost,price,status,create_at)values('$name','$sku','$types','$category','$manu','$shipping','$total','$price','$status','$create')";
             if($conn->query($sql)=== TRUE)
             {
                 //echo"data insert successfully<br>";
                 echo "<script>alert('Data inserted successfully');</script>";
              }
              else{
               
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                
              }
         }
}
?>
<html>
<head>
    <title>PRODUCT BILL</title>
</head>
<style>
     body {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: pink; 
        }

     form {
            width: 50%;
            text-align: center;
           
        }

    
        label {
            color:blue;
            display: inline-block;
            width: 150px;
            margin-right: 10px;
            text-align: left;
        }
        input, select {
            width: 200px;
        }
        #but{
            width: 15px;
            margin-left: 35px;
            
        }



</style>
<body>
    <form method="POST">
    <h1 style= "color:blue; font-size:200%;">BILL</h1>
        <label>Product Name:</label>
        <input type="text" name="pro_name" placeholder="Enter product name" required><br><br>
        
        <label>SKU:</label>
        <input type="text" name="pro_sku" placeholder="Enter product Stock Keeping Unit"required><br><br>

        <label>Product Type:</label>
        <input id="but" type="radio" name="types" value="simple" selected>Simple
        <input id="but" type="radio" name="types" value="bundle">bundle<br><br>

        <label>Category:</label>
        <select name="pro_cate">
            <option value="bar & game room">bar & game room</option>
            <option value="bedroom">bedroom</option>
            <option value="decor">decor</option>
            <option value="dining & kitchen">dining & kitchen</option>
            <option value="lighting">lighting</option>
            <option value="living room">living room</option>
            <option value="mattresses">mattresses</option>
            <option value="office">office</option>
            <option value="outdoor">outdoor</option>
        </select><br><br>

        <label>Manufacturer Cost:</label>
        <input type="text" name="manu_cost" placeholder="enter manufacturer cost" required><br><br>

        <label>Shipping Cost:</label>
        <input type="text" name="ship_cost" placeholder="enter shipping cost" required><br><br>

        <label>Total Cost:</label>
        <input type="text" name="total_cost" placeholder="enter total cost" required><br><br>

        <label>Price:</label>
        <input type="text" name="price" placeholder="enter price" required><br><br>

        <label>Status</label>
        <select name="status">
            <option value="enabled">Enabled</option>
            <option value="disabled">Disabled</option>
        </select><br><br>

        <label>date</label>
        <input type="date" name="create" required>
        <br><br><br>

        <input type="submit" name="submit" value="submit"style="color:blue; font-size:150%;border-radius:80px;">
    </form>
</body>
</html>
