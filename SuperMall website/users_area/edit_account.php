<?php 
// if(isset($_GET['edit_account'])){
//     $user_session_name=$_SESSION['username'];
//     $select_query="select * from user_table where username='$user_session_name'";
//     $result_query=mysqli_query($con,$select_query);
//     $row_fetch=mysqli_fetch_assoc($result_query);
//     $user_id=$row_fetch['user_id'];
//     $username=$row_fetch['username'];
//     $user_email=$row_fetch['user_email'];
//     $user_address=$row_fetch['user_address'];
//     $user_mobile=$row_fetch['user_mobile'];
//     $user_password=$row_fetch['user_password'];

//     if(isset($_POST['user_update'])){
//         $update_id=$user_id;
//         $username=$_POST['username'];
//         $user_email=$_POST['user_email'];
//         $user_address=$_POST['user_address'];
//         $user_mobile=$_POST['user_mobile'];
//         $user_password=$_POST['user_password'];
//         $user_image=$_FILES['user_image']['name'];
//         $user_image_tmp=$_FILES['user_image']['tmp_name'];
//         move_uploaded_file( $user_image_tmp,"./user_images/$user_image");

//        }   

//         $update_data="update user_table set username='$username',user_email='$user_email',user_image='$user_image',user_address='$user_address',user_mobile='$user_mobile',user_password='$user_password' where user_id=$update_id";
//         $result_query_update=mysqli_query($con,$update_data);
//         if($result_query_update){
//             echo "<script>alert('Data Updated Sucessfully')</script>";
//         }
//     }

if(isset($_GET['edit_account'])){
    $user_session_name = $_SESSION['username'];
    $select_query = "select * from user_table where username='$user_session_name'";
    $result_query = mysqli_query($con, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
    $username = $row_fetch['username'];
    $user_email = $row_fetch['user_email'];
    $user_address = $row_fetch['user_address'];
    $user_mobile = $row_fetch['user_mobile'];
    $user_password = $row_fetch['user_password'];
    $user_image = $row_fetch['user_image'];  // Add this to display current image
    
    if(isset($_POST['user_update'])){
        $update_id = $user_id;
        $username = $_POST['user_username'];  // corrected name attribute
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        $user_mobile = $_POST['user_mobile'];
        $user_password = $_POST['user_password'];
        
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];
        
        // If no new image selected, keep old one
        if (empty($user_image)) {
            $user_image = $row_fetch['user_image'];
        } else {
            move_uploaded_file($user_image_tmp, "./user_images/$user_image");
        }
        
        // Update query inside if block
        $update_data = "UPDATE user_table SET username='$username', user_email='$user_email', user_image='$user_image', user_address='$user_address', user_mobile='$user_mobile', user_password='$user_password' WHERE user_id=$update_id";
        $result_query_update = mysqli_query($con, $update_data);
        if($result_query_update){
            echo "<script>alert('Data Updated Successfully')</script>";
            echo "<script>window.open('profile.php','_self')</script>";  // Redirect after update
        } else {
            echo "Error updating: " . mysqli_error($con);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperMall</title>
</head>
<body>
    <h3 class="text-center text-success mb-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data" class="text-center">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $username ?>"name="user_username" placeholder="UserName">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" value="<?php echo $user_email ?>"name="user_email" placeholder="UserEmail">
        </div>
        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input type="file" class="form-control m-auto" name="user_image">
            <img src="./user_images/<?php echo $user_image?>" alt="" class="edit_image">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_address" value="<?php echo $user_address ?>" placeholder="Address">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_mobile" value="<?php echo $user_mobile ?> "placeholder="Mobile_Number">
        </div>
        <div class="form-outline mb-4">
            <input type="password" class="form-control w-50 m-auto" name="user_password" value="<?php echo $user_mobile ?> "placeholder="user_password">
        </div>
        
        <input type="submit" value="Update"class="bg-info py-2 px-3 border-0" name="user_update">
    </form>
</body>
</html>