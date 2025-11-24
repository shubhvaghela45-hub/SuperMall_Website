<?php include('../includes/connect.php'); 
include('../functions/common_function.php');
 @session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user-login</title>
    <!-- faunt aussem -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
</head>
    <style>
    body{
        overflow-x:hidden;
        }
    </style>
<body>
     <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                     <div class="form-outline mb-4">
                         <!-- user filed -->
                         <lable for="user_username" class="form-lable">Username</lable>
                         <input type="text" id="user_username" class="form-control" placeholder="Enter your UserName" autocomplete="off" required="required" name="user_username"/>
                      </div>

                     <!-- password field --> 
                     <div class="form-outline mb-4">
                           <lable for="user_password" class="form-lable">Password</lable>
                         <input type="password" id="user_password" class="form-control" placeholder="Enter your Password" autocomplete="off" required="required" name="user_password"/>
                     </div>

                     <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
                        <p class="fw-bold mg-2 pt-1">Don't have an account ?<a href="user_registration.php" class="text-danger"> Register</a></p>
                      </div>
                </form>
            </div>
        </div>
     </div>
</body>
</html>

<?php 
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    
    $select_query="select * from user_table where username='$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();
    // cart item
    $select_query_cart="select * from cart_details where ip_address='$user_ip'";
    $select_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);
    if($row_count>0){
      $_SESSION['username']=$user_username;
      if(password_verify($user_password,$row_data['user_password'])){
        // echo "<script>alert('Login Successful')</script>";
        if($row_count==1 and  $row_count_cart==0){
          $_SESSION['username']=$user_username;
          echo "<script>alert('Login Successful')</script>";
          echo "<script>window.open('profile.php','_self')</script>";
        }else{
          $_SESSION['username']=$user_username;
          echo "<script>alert('Login Successful')</script>";
          echo "<script>window.open('payment.php','_self')</script>";
        }
      }else{
        echo "<script>alert('Invalid Credentials')</script>";
      }
    }else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
}

?>