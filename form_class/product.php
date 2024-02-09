<?php
error_reporting(E_ERROR | E_PARSE);
require('connection.php');
require('query_executer.php');

if(isset($_POST['submit'])){
    $table='ccc_product';
    $data=$_POST['data'];
    echo $data;
    $query = $operation->insert($table,$data);
    echo $query;

$execatinsert=$execute->execute($conn,$query);
if($execatinsert){
    echo "<script>alert('Data inserted successfully');</script>";
                    header("location: product_list.php");
}
echo $execatinsert;
}

if(isset($_POST['update'])){
    $table='ccc_product';
    $data=$_POST['data'];
    $no=$_POST['no'];
    $condition = ['product_id'=>$no];
    echo $data;
    $query = $operation->update($table,$data,$condition);
    echo $query;

$execatinsert=$execute->execute($conn,$query);
if($execatinsert){
    echo "<script>alert('Data inserted successfully');</script>";
                    header("location: product_list.php");
}
echo $execatinsert;
}

if(isset($_GET['no'])) {
    $no = $_GET['no'];
    echo $no;
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
                <input type="text" name="data[product_name]" placeholder="Enter product name" required><br><br>
                
                <label>SKU:</label>
                <input type="text" name="data[sku]" placeholder="Enter product Stock Keeping Unit"><br><br>
        
                <label>Product Type:</label>
                <input id="but" type="radio" name="data[product_type]" value="simple" selected>Simple
                <input id="but" type="radio" name="data[product_type]" value="bundle">bundle<br><br>
        
                <label>Category:</label>
                <select name="data[Category]">
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
                <input type="text" name="data[manu_cost]" placeholder="enter manufacturer cost" ><br><br>
        
                <label>Shipping Cost:</label>
                <input type="text" name="data[ship_cost]" placeholder="enter shipping cost" ><br><br>
        
                <label>Total Cost:</label>
                <input type="text" name="data[total_cost]" placeholder="enter total cost" ><br><br>
        
                <label>Price:</label>
                <input type="text" name="data[price]" placeholder="enter price" ><br><br>
        
                <label>Status</label>
                <select name="data[status]">
                    <option value="enabled">Enabled</option>
                    <option value="disabled">Disabled</option>
                </select><br><br>
        
                <label>date</label>
                <input type="date" name="data[create_at]" >
                <br><br><br>
        
                <input type="submit" name="submit" value="submit"style="color:blue; font-size:150%;border-radius:80px;">
               <!-- <a href="functions.php?edit=?php echo $no;?" >edit</a>-->

               <?php if(isset($no)) { ?>
                <input type="hidden" name="no" value="<?php echo $no; ?>">
               <!-- <a href="functions.php?edit= echo $no; ?>">Edit</a>-->
                <input type="submit" name="update" value="update"style="color:blue; font-size:150%;border-radius:80px;">
                <!--<button onclick="">Edit</button>-->
                <?php } ?>

                
            </form>
</body>
</html>
