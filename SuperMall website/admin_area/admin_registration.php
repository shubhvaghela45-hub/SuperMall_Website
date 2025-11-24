<?php 
session_start();
include('../includes/connect.php'); 
include('../functions/common_function.php');

if(isset($_POST['admin_registration'])){
   $admin_name = $_POST['username'];
   $admin_email = $_POST['email'];
   $admin_password = $_POST['password'];
   $conf_admin_password = $_POST['confirm_password'];

   if ($admin_password !== $conf_admin_password) {
       echo "<script>alert('Passwords do not match');</script>";
   } else {
       $select_query = "SELECT * FROM admin_table WHERE admin_name='$admin_name' OR admin_email='$admin_email'";
       $result = mysqli_query($con, $select_query);
       $rows_count = mysqli_num_rows($result);
       if ($rows_count > 0) {
           echo "<script>alert('Admin Name or Email already exist!')</script>";
       } else {
           $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);
           $insert_query = "INSERT INTO admin_table (admin_name, admin_email, admin_password) VALUES ('$admin_name', '$admin_email', '$hash_password')";
           $sql_execute = mysqli_query($con, $insert_query);
           if ($sql_execute) {
               echo "<script>
                     alert('Registration Successful. Please login now!');
                     window.location.href = 'admin_login.php';
                     </script>";
               exit();
           } else {
               die("Database error: " . mysqli_error($con));
           }
       }
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Registration</title>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" />
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <style>
        body {
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../admin_area/login_images/download.jpeg" alt="Admin Registration" class="img-fluid" />
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">UserName</label>
                        <input type="text" name="username" id="username" placeholder="Enter Admin Name" required class="form-control" />
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" placeholder="Enter Admin Email" required class="form-control" />
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter Admin Password" required class="form-control" />
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Admin Password" required class="form-control" />
                    </div>
                    <div>
                        <input type="submit" class="btn btn-info px-4" name="admin_registration" value="Register" />
                        <p class="small fw-bold mt-3 pt-1">
                            Do you already have an account? 
                            <a href="admin_login.php" class="link-danger">Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
