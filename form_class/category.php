<?php
error_reporting(E_ERROR | E_PARSE);
require('connection.php');
require('query_executer.php');
if(isset($_POST["cat_submit"])){

    $table='ccc_category';
    $data=$_POST['cat'];
    $query = $operation->insert($table,$data);
    echo $query;

$execatinsert=$execute->execute($conn,$query);
echo $execatinsert;

if($execatinsert){
    echo "<script>alert('Category Data inserted successfully');</script>";
                    header("location: category_list.php");
}

}
?>
<html>
<head>
    <title>CATEGORY DETAILS</title>
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
        input {
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
        <label>Category Name:</label>
        <input type="text" name="cat[name]" placeholder="Enter category name" required><br><br>

        <input type="submit" name="cat_submit" value="submit"style="color:blue; font-size:150%;border-radius:80px;">
    </form>
</body>
</html>
