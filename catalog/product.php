<?php
error_reporting(E_ERROR | E_PARSE);
require('connection.php');
require('functions.php');


$no=isset($_GET['no'])?$_GET['no']:0;
// if(isset($_GET['no'])) {
//     $no = $_GET['no'];
    echo $no;
// } 
$productData = [];
if ($no != 0) {
        $column=array("*");
        $condition="WHERE product_id=$no;";
        $select=sel('ccc_product',$column,$condition);
        //echo $select;

$result=$conn -> query($select);
if($result){
    $row = $result->fetch_assoc();
    $productData = $row;
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
    <form method="POST" action="functions.php" name="product">

            <h1 style= "color:blue; font-size:200%;">BILL</h1>
                <label>Product Name:</label>
                <input type="text" name="data[product_name]" value="<?php echo isset($productData['product_name']) ? $productData['product_name'] : ''; ?>" placeholder="Enter product name" required><br><br>
                
                <label>SKU:</label>
                <input type="text" name="data[sku]" value="<?php echo isset($productData['sku']) ? $productData['sku'] : ''; ?>"placeholder="Enter product Stock Keeping Unit"><br><br>
        
                <label>Product Type:</label>
                <input id="but" type="radio" name="data[product_type]" value="simple" <?php echo isset($productData['product_type']) && $productData['product_type'] == 'simple' ? 'checked' : ''; ?>>Simple
                <input id="but" type="radio" name="data[product_type]" value="bundle" <?php echo isset($productData['product_type']) && $productData['product_type'] == 'bundle' ? 'checked' : ''; ?>>bundle<br><br>
        
                <label>Category:</label>
                <select name="data[Category]">
                <option value="<?php echo $productData['category']; ?>"><?php echo $productData['category']?></option>
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
                <input type="text" name="data[manu_cost]"value="<?php echo isset($productData['manu_cost']) ? $productData['manu_cost'] : ''; ?>" placeholder="enter manufacturer cost" ><br><br>
        
                <label>Shipping Cost:</label>
                <input type="text" name="data[ship_cost]" value="<?php echo isset($productData['ship_cost']) ? $productData['ship_cost'] : ''; ?>" placeholder="enter shipping cost" ><br><br>
        
                <label>Total Cost:</label>
                <input type="text" name="data[total_cost]" value="<?php echo isset($productData['total_cost']) ? $productData['total_cost'] : ''; ?>" placeholder="enter total cost" ><br><br>
        
                <label>Price:</label>
                <input type="text" name="data[price]" value="<?php echo isset($productData['price']) ? $productData['price'] : ''; ?>" placeholder="enter price" ><br><br>
        
                <label>Status</label>
                <select name="data[status]">
                <option value="<?php echo $productData['status']; ?>"><?php echo $productData['status']?></option>
                    <option value="enabled">Enabled</option>
                    <option value="disabled">Disabled</option>
                </select><br><br>
        
                <label>date</label>
                <input type="date" name="data[create_at]" value="<?php echo isset($productData['create_at']) ? $productData['create_at'] : ''; ?>" >
                <br><br><br>
        

                <!-- <input type="submit" name="submit" value="submit"style="color:blue; font-size:150%;border-radius:80px;"> -->
               <!-- <a href="functions.php?edit=?php echo $no;?" >edit</a>-->

               <?php if($no != 0) { ?>
                <input type="hidden" name="no" value="<?php echo $no; ?>">
               <!-- <a href="functions.php?edit= echo $no; ?>">Edit</a>-->
                <input type="submit" name="update" value="update"style="color:blue; font-size:150%;border-radius:80px;">
                <!--<button onclick="">Edit</button>-->
                <?php } 
                else{ ?>
                <input type="submit" name="submit" value="submit"style="color:blue; font-size:150%;border-radius:80px;">
                <?php }?>
                

                
            </form>
</body>
</html>
