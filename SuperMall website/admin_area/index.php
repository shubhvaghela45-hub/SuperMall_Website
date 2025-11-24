<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_name'])) {
    echo "<script>
            alert('Please login first to access the admin page!');
            window.location.href = 'admin_login.php'; // path to your admin login
          </script>";
    exit();
}

include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../style1.css" />
    <style>
        .admin_image {
            width: 100px;
            object-fit: contain;
        }
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        body {
            overflow-x: hidden;
        }
        .product_img {
            width: 150px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <h1>SuperMall</h1>
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Welcome <?php echo htmlspecialchars($_SESSION['admin_name']); ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="adminLogout.php">Logout</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- Second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- Third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3 text-center">
                    <a href="#"><img src="../img/lens1_logo.jpg" alt="Admin" class="admin_image" /></a>
                    <p class="text-light mt-2"><?php echo htmlspecialchars($_SESSION['admin_name']); ?></p>
                </div>
                <div class="button text-center flex-grow-1">
                    <button class="my-3 mx-1">
                        <a href="insert_product.php" class="nav-link text-light bg-info my-1 px-3">Insert Products</a>
                    </button>
                    <button class="mx-1">
                        <a href="index.php?view_products" class="nav-link text-light bg-info my-1 px-3">View Products</a>
                    </button>
                    <button class="mx-1">
                        <a href="index.php?insert_categories" class="nav-link text-light bg-info my-1 px-3">Insert Categories</a>
                    </button>
                    <button class="mx-1">
                        <a href="index.php?view_categories" class="nav-link text-light bg-info my-1 px-3">View Categories</a>
                    </button>
                    <button class="mx-1">
                        <a href="index.php?insert_brand" class="nav-link text-light bg-info my-1 px-3">Insert Brands</a>
                    </button>
                    <button class="mx-1">
                        <a href="index.php?view_brands" class="nav-link text-light bg-info my-1 px-3">View Brands</a>
                    </button>
                    <button class="mx-1">
                        <a href="index.php?list_orders" class="nav-link text-light bg-info my-1 px-3">All Orders</a>
                    </button>
                    <button class="mx-1">
                        <a href="index.php?list_payments" class="nav-link text-light bg-info my-1 px-3">All Payments</a>
                    </button>
                    <button class="mx-1">
                        <a href="index.php?list_users" class="nav-link text-light bg-info my-1 px-3">List Users</a>
                    </button>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="container my-3">
            <?php
            // Include modules on request
            if (isset($_GET['insert_categories'])) {
                include('insert_categories.php');
            }
            if (isset($_GET['insert_brand'])) {
                include('insert_brands.php');
            }
            if (isset($_GET['view_products'])) {
                include('view_products.php');
            }
            if (isset($_GET['edit_products'])) {
                include('edit_products.php');
            }
            if (isset($_GET['delete_products'])) {
                include('delete_products.php');
            }
            if (isset($_GET['view_categories'])) {
                include('view_categories.php');
            }
            if (isset($_GET['view_brands'])) {
                include('view_brands.php');
            }
            if (isset($_GET['edit_categories'])) {
                include('edit_categories.php');
            }
            if (isset($_GET['edit_brands'])) {
                include('edit_brands.php');
            }
            if (isset($_GET['delete_categories'])) {
                include('delete_categories.php');
            }
            if (isset($_GET['delete_brand'])) {
                include('delete_brand.php');
            }
            if (isset($_GET['list_orders'])) {
                include('list_orders.php');
            }
            if (isset($_GET['list_payments'])) {
                include('list_payments.php');
            }
            if (isset($_GET['delete_order'])) {
                include('delete_order.php');
            }
            if (isset($_GET['list_users'])) {
                include('list_users.php');
            }
            if (isset($_GET['delete_payment'])) {
                include('delete_payment.php');
            }
            
            ?>
        </div>

        <!-- Footer -->
        <?php include ("../includes/footer.php") ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
