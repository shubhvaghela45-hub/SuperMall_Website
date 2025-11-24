<?php 

if(isset($_GET['edit_products'])){
    $edit_id = $_GET['edit_products'];
    // echo $edit_id;
    $get_data = "SELECT * FROM products WHERE product_id=$edit_id";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);
    $product_title = $row['product_title'];
    // echo $product_title;
    $product_description = $row['product_description'];
    $Product_keywords = $row['Product_keywords'];
    $categories_id = $row['categories_id'];
    $brand_id = $row['brands_id'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $product_price = $row['product_price'];
    
    // fetching floor category name
    $select_categories = "SELECT * FROM categories WHERE categories_id=$categories_id";
    $result_categories = mysqli_query($con, $select_categories);
    $row_categories = mysqli_fetch_assoc($result_categories);
    $categories_title = $row_categories['categories_title'];
    // echo $categories_title;

    // fetching brands name
    $select_brand = "SELECT * FROM brands WHERE brand_id=$brand_id";
    $result_brand = mysqli_query($con, $select_brand);
    $row_brand = mysqli_fetch_assoc($result_brand);
    $brand_title = $row_brand['brand_title'];
    // echo $brand_title;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editing Page</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Edit Product</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" id="product_title" name="product_title" value="<?php echo htmlspecialchars($product_title) ?>" class="form-control" required />
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_desc" class="form-label">Product Description</label>
                <input type="text" id="product_desc" name="product_desc" value="<?php echo htmlspecialchars($product_description) ?>" class="form-control" required />
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" id="product_keywords" name="product_keywords" value="<?php echo htmlspecialchars($Product_keywords) ?>" class="form-control" required />
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_category" class="form-label">Floor Category</label>
                <select name="product_category" class="form-select">
                    <option value="<?php echo $categories_id ?>"><?php echo htmlspecialchars($categories_title) ?></option>
                    <?php  
                        $select_categories_all = "SELECT * FROM categories";
                        $result_categories_all = mysqli_query($con, $select_categories_all);
                        while ($row_categories_all = mysqli_fetch_assoc($result_categories_all)) {
                            $category_title_opt = $row_categories_all['categories_title'];
                            $category_id_opt = $row_categories_all['categories_id'];
                            echo "<option value='$category_id_opt'>$category_title_opt</option>";
                        }
                    ?>   
                </select>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_brands" class="form-label">Branded Category</label>
                <select name="product_brands" class="form-select">
                    <option value="<?php echo $brand_id ?>"><?php echo htmlspecialchars($brand_title) ?></option> 
                    <?php 
                        $select_brand_all = "SELECT * FROM brands";
                        $result_brand_all = mysqli_query($con, $select_brand_all);
                        while ($row_brand_all = mysqli_fetch_assoc($result_brand_all)) {
                            $brand_title_opt = $row_brand_all['brand_title'];
                            $brand_id_opt = $row_brand_all['brand_id'];
                            echo "<option value='$brand_id_opt'>$brand_title_opt</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image1" class="form-label">Product Image1</label>
                <div class="d-flex">
                    <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto" />
                    <img src="./product_images/<?php echo $product_image1 ?>" alt="" class="product_img" />
                </div>               
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image2" class="form-label">Product Image2</label>
                <div class="d-flex">
                    <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto" />
                    <img src="./product_images/<?php echo $product_image2 ?>" alt="" class="product_img" />
                </div>               
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image3" class="form-label">Product Image3</label>
                <div class="d-flex">
                    <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto" />
                    <img src="./product_images/<?php echo $product_image3 ?>" alt="" class="product_img" />
                </div>               
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" id="product_price" name="product_price" value="<?php echo htmlspecialchars($product_price) ?>" class="form-control" required />
            </div>
            <div class="text-center">
                <input type="submit" name="edit_product" value="Update product" class="btn btn-info px-3 mb-3" />
            </div>
        </form>
    </div>

<?php  

if(isset($_POST['edit_product'])){
    // Escape strings to prevent SQL injection
    $product_title = mysqli_real_escape_string($con, $_POST['product_title']);
    $product_desc = mysqli_real_escape_string($con, $_POST['product_desc']);
    $product_keywords = mysqli_real_escape_string($con, $_POST['product_keywords']);
    $product_category = (int)$_POST['product_category'];
    $product_brands = (int)$_POST['product_brands'];
    $product_price = mysqli_real_escape_string($con, $_POST['product_price']);

    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // checking for empty fields
    if ($product_title == '' or $product_desc == '' or $product_keywords == '' or $product_category == '' or $product_brands == '' or $product_price == '') {
        echo "<script>alert(' Please fill the incomplete fields ')</script>";
    } else {
        // Handle image uploads, only move if a new image was uploaded
        if ($product_image1 != '') {
            move_uploaded_file($temp_image1,"product_images/$product_image1");
        } else {
            $product_image1 = $product_image1;  // Keep old image if not updated
        }
        if ($product_image2 != '') {
            move_uploaded_file($temp_image2, "./product_images/$product_image2");
        } else {
            $product_image2 = $product_image2;
        }
        if ($product_image3 != '') {
            move_uploaded_file($temp_image3, "./product_images/$product_image3");
        } else {
            $product_image3 = $product_image3;
        }

        // Update products with proper quoting of string values
        $update_product = "UPDATE products SET 
        product_title='$product_title', 
        product_description='$product_desc', 
        product_keywords='$product_keywords',
        categories_id=$product_category, 
        brands_id=$product_brands,  -- changed here
        product_image1='$product_image1', 
        product_image2='$product_image2',
        product_image3='$product_image3', 
        product_price='$product_price', 
        date=NOW() 
        WHERE product_id=$edit_id";

        $result_update = mysqli_query($con, $update_product);

        if ($result_update) {
           echo "<script>alert('Product Updated')</script>"; 
           echo "<script>window.open('./view_products.php','_self')</script>"; 
        } else {
           echo "<script>alert('Update Failed: " . mysqli_error($con) . "')</script>";
        }
    }
}

?>
</body>
</html>
