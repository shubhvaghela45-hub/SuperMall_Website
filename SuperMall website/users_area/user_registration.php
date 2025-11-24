<?php include('../includes/connect.php'); 
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user-registration</title>
    <!-- faunt aussem -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
</head>
<body>
     <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                     <div class="form-outline mb-4">
                         <!-- user filed -->
                         <lable for="user_username" class="form-lable">Username</lable>
                         <input type="text" id="user_username" class="form-control" placeholder="Enter your UserName" autocomplete="off" required="required" name="user_username"/>
                      </div>

                           <!-- email field --> 
                           <div class="form-outline mb-4">
                           <lable for="user_email" class="form-lable">Email</lable>
                         <input type="email" id="user_email" class="form-control" placeholder="Enter your Email" autocomplete="off" required="required" name="user_email"/>
                     </div>

                      <!-- image field --> 
                      <div class="form-outline mb-4">
                           <lable for="user_image" class="form-lable">User Image</lable>
                         <input type="file" id="user_image" class="form-control" required="required" name="user_image"/>
                     </div>

                     <!-- password field --> 
                     <div class="form-outline mb-4">
                           <lable for="user_password" class="form-lable">Password</lable>
                         <input type="password" id="user_password" class="form-control" placeholder="Enter your Password" autocomplete="off" required="required" name="user_password"/>
                     </div>

                      <!-- conform password field --> 
                      <div class="form-outline mb-4">
                           <lable for="conf_user_password" class="form-lable">Confirm Password</lable>
                         <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm your Password" autocomplete="off" required="required" name="conf_user_password"/>
                     </div>

                      <!-- address field -->
                     <div class="form-outline mb-4">
                         <lable for="user_address" class="form-lable">Address</lable>
                         <input type="text" id="user_address" class="form-control" placeholder="Enter your Address" autocomplete="off" required="required" name="user_address"/>
                      </div>

                       <!-- contact field -->
                     <div class="form-outline mb-4">
                         <lable for="user_contact" class="form-lable">Contact</lable>
                         <input type="text" id="user_contact" class="form-control" placeholder="Enter your Mobile Number" autocomplete="off" required="required" name="user_contact"/>
                      </div>
                      <div class="text-center">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
                        <p class="fw-bold mg-2 pt-1">Already have an account ?<a href="user_login.php" class="text-danger"> Login</a></p>
                      </div>
                </form>
            </div>
        </div>
     </div>
</body>
</html>

<!-- php code -->
 <?php 
if(isset($_POST['user_register'])){
   $user_username=$_POST['user_username'];
   $user_email=$_POST['user_email'];
   $user_password=$_POST['user_password'];
   $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
   $conf_user_password=$_POST['conf_user_password'];
   $user_address=$_POST['user_address'];
   $user_contact=$_POST['user_contact'];
   $user_image=$_FILES['user_image']['name'];
   $user_image_tmp=$_FILES['user_image']['tmp_name'];
   $user_ip=getIPAddress();


  //  select query

  $select_query="select * from user_table where username='$user_username' or user_email='$user_email'";
  $result=mysqli_query($con,$select_query);
  $rows_count=mysqli_num_rows($result);
  if($rows_count>0){
    echo "<script>alert('UserName and Email already exist!')</script>";
  }else if($user_password!=$conf_user_password){
    echo "<script>alert('Passwords do not match')</script>";
  }
  
  
  else{
  //  insert query database
  move_uploaded_file($user_image_tmp,"./user_images/$user_image");
  $insert_query="insert into user_table (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) 
  values ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
  $sql_execute=mysqli_query($con,$insert_query);
  if($sql_execute){
    echo "<script>alert('Data inserted sucessfully')</script>";
  }else{
    die(mysqli_error($con));
  }
}

// selecting cart items
$select_cart_items="select * from cart_details where ip_address='$user_ip'";
$result_cart=mysqli_query($con,$select_cart_items);
$rows_count=mysqli_num_rows($result_cart);
if($rows_count>0){
  $_SESSION['username']=$user_username;
  echo "<script>alert('You have items in your cart')</script>";
  echo "<script>window.open('checkout.php','_self')</script>";
}else{
  echo "<script>window.open('../index.php','_self')</script>";
}
}


?>