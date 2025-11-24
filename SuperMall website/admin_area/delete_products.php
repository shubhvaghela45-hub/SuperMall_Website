<?php

if(isset($_GET['delete_products'])){
    $delete_id=$_GET['delete_products'];
    // echo "$delete_id";
    // delete query

    $delete_products="Delete from products where product_id=$delete_id";
    $result_products=mysqli_query($con, $delete_products);
    if($result_products){
         echo "<script>alert('Product Deleted')</script>"; 
           echo "<script>window.open('./index.php','_self')</script>"; 
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Products</title>
</head>
<body>
    
</body>
</html>