<!-- connect file -->
<?php
include('../includes/connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperMall website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-info">
     <!-- first child -->
  <div class="container-fluid p-0">
    <a class="navbar-brand" href="#">SuperMall</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
         <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<!-- calling cart () -->

<!-- second child -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
     <ul class="navbar-nav me-auto">
        <?php 
         if(!isset($_SESSION['username'])){
          echo " <li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li>";
     }else{
       echo "<li class='nav-item'>
   <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
 </li>";
     }
            if(!isset($_SESSION['username'])){
                 echo "<li class='nav-item'>
          <a class='nav-link' href='./user_login.php'>Login</a>
        </li>";
            }else{
              echo "<li class='nav-item'>
          <a class='nav-link' href='logout.php'>Logout</a>
        </li>"; 
            }
        ?>
     </ul>
 </nav>

 <!-- third child -->
  <div class="bg-light">
    <h3 class="text-center">Premium Products</h3>
    <p class="text-center">
        Here you will get your all Premium products in your Budget
    </p>
  </div>

  <!-- fourth clild -->
   <div class="row px-2">
     <div class="col-md-12">
        <!-- products -->
         <div class="row">
            <?php
             if(!isset($_SESSION['username'])){
                 include('user_login.php');
             }else{
                include('payment.php');
             }
             ?>
   </div>
<!-- column end -->
</div>

</div>





<!-- last child -->
 <!-- <div class="bg-info p-3 text-center"> -->
    <!-- <p>All rights reserved @- Designed by new tech-2024</p> -->
     <?php include ("../includes/footer.php") ?>
  <!-- </div> -->
</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>