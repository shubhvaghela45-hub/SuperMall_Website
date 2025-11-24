<?php
// Assuming you have already connected to the database using $con

// Initialize $brand_title to avoid undefined variable warning
$brand_title = "";

// Use consistent parameter name 'edit_brands' as in the URL
if(isset($_GET['edit_brands'])){
    $edit_brand = intval($_GET['edit_brands']); // sanitize input by casting to int

    // Fetch the brand details safely
    $get_brand = "SELECT * FROM brands WHERE brand_id = $edit_brand";
    $result = mysqli_query($con, $get_brand);

    if($result && mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $brand_title = $row['brand_title'];
    } else {
        echo "<script>alert('Brand not found.');</script>";
        // You may want to redirect or handle this scenario differently
    }
}

if(isset($_POST['edit_brands'])){
    // Sanitize the input to avoid SQL injection (better to use prepared statements)
    $brand_title = mysqli_real_escape_string($con, $_POST['brand_title']);

    $update_query = "UPDATE brands SET brand_title='$brand_title' WHERE brand_id=$edit_brand";
    
    $result_brand = mysqli_query($con, $update_query);

    if($result_brand){
        echo "<script>alert('Brand has been updated')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    } else {
        echo "<script>alert('Failed to update brand. Please try again.')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Brand</title>
</head>
<body>
    <div class="container mt-3">
        <h1 class="text-center text-success">Edit Branded Products</h1>
        <form action="" method="post" class="text-center">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="brand_title" class="form-label">Branded Products Title</label>
                <input 
                    type="text" 
                    name="brand_title" 
                    id="brand_title" 
                    class="form-control" 
                    value="<?php echo htmlspecialchars($brand_title); ?>" 
                    required 
                />
            </div>
            <input 
                type="submit" 
                value="Update Brand" 
                class="btn btn-info px-3 mb-3" 
                name="edit_brands" 
            />
        </form>
    </div>
</body>
</html>
