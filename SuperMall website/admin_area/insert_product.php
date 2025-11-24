<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){

    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $product_Keywords=$_POST['product_Keywords'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_status='true';

    // access images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];


   //  accessing image name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

   //  checking empty condition
    if($product_title=='' or $description=='' or $product_Keywords=='' or $product_category=='' or $product_brands=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
      echo "<script>alert('Please Fill The Available Fields')</script>";
      exit();
    }else{
       move_uploaded_file($temp_image1,"./product_images/$product_image1");
       move_uploaded_file($temp_image2,"./product_images/$product_image2");
       move_uploaded_file($temp_image3,"./product_images/$product_image3");

      //  insert query
       $insert_products="insert into products (product_title,product_description,Product_keywords,categories_id,brands_id,product_image1,product_image2,product_image3,product_price,date,status) values ('$product_title','$description','$product_Keywords','$product_category','$product_brands','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
       $result_query=mysqli_query($con,$insert_products);
       if($result_query){
          echo "<script>alert('Successfully inserted the products')</script>";
          echo "<script>window.open('index.php','_self')</script>";
       }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin DashBoard</title>
     <!-- faunt awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- css file -->
     <link rel="stylesheet" href="../style1.css">
</head>
<body class="bg-light">
<div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!-- form -->
         <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
              <div class="form-outline mb-4 w-50 m-auto">
                 <lable for="product_title" class="form-lable">Product title</lable>
                 <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product title" autocomplete="off" required="required">
              </div>

               <!-- description -->
               <div class="form-outline mb-4 w-50 m-auto">
                 <lable for="description " class="form-lable">Product description </lable>
                 <input type="text" name="description" id="description" class="form-control" placeholder="Enter Product description" autocomplete="off" required="required">
              </div>

              <!-- Keywords -->
              <div class="form-outline mb-4 w-50 m-auto">
                 <lable for="product_Keywords" class="form-lable">Product Keywords  </lable>
                 <input type="text" name="product_Keywords" id="product_Keywords" class="form-control" placeholder="Enter Product Keywords" autocomplete="off" required="required">
              </div>

                  <!-- categories -->
                  <div class="form-outline mb-4 w-50 m-auto">
                 <select name="product_category" id="" class="form-select">
                   <option value="">Select Category</option>
                   <?php
                      $select_query="select * from categories";
                      $result_query=mysqli_query($con,$select_query);
                      while($row=mysqli_fetch_assoc($result_query)){
                        $category_title=$row['categories_title'];
                        $category_id=$row['categories_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                      }
                   ?>
                 </select>
              </div>

              <!-- Brands -->
              <div class="form-outline mb-4 w-50 m-auto">
                 <select name="product_brands" id="" class="form-select">
                   <option value="">Select Brands</option>
                   <?php
                      $select_query="select * from brands";
                      $result_query=mysqli_query($con,$select_query);
                      while($row=mysqli_fetch_assoc($result_query)){
                        $brand_title=$row['brand_title'];
                        $brand_id=$row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                      }
                   ?>
                 </select>
              </div>

                <!-- Image 1 -->
                <div class="form-outline mb-4 w-50 m-auto">
                 <lable for="product_image1" class="form-lable">Product Image 1</lable>
                 <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
              </div>

              <!-- Image 2 -->
              <div class="form-outline mb-4 w-50 m-auto">
                 <lable for="product_image2" class="form-lable">Product Image 2</lable>
                 <input type="file" name="product_image2" id="product_image2" class="form-control">
              </div>

              <!-- Image 3 -->
              <div class="form-outline mb-4 w-50 m-auto">
                 <lable for="product_image3" class="form-lable">Product Image 3</lable>
                 <input type="file" name="product_image3" id="product_image3" class="form-control">
              </div>

                <!-- Price -->
                <div class="form-outline mb-4 w-50 m-auto">
                 <lable for="product_price" class="form-lable">Product Price </lable>
                 <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required="required">
              </div>

              <!-- Price -->
              <div class="form-outline mb-4 w-50 m-auto">
                 <input type="Submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
              </div>

</body>
</html>