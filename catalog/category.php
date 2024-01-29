<?php

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
    <form method="POST" name="category" action="functions.php">
    <h1 style= "color:blue; font-size:200%;">BILL</h1>
        <label>Category Name:</label>
        <input type="text" name="cat[name]" placeholder="Enter category name" required><br><br>

        <input type="submit" name="submit" value="submit"style="color:blue; font-size:150%;border-radius:80px;">
    </form>
</body>
</html>
