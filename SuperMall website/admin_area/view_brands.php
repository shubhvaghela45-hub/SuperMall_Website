<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>View Brands</title>
    <!-- Bootstrap 4 CSS & FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body>
    <div class="container mt-4">
        <h3 class="text-center text-success mb-4">All Brands</h3>
        <table class="table table-bordered text-center">
            <thead class="thead-light">
                <tr>
                    <th>SNo</th>
                    <th>Brand Title</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Assume $con is your mysqli connection object
                $select_brands = "SELECT * FROM brands";
                $result = mysqli_query($con, $select_brands);
                $number = 0;
                while ($row = mysqli_fetch_assoc($result)):
                    $brand_id = $row['brand_id'];
                    $brand_title = $row['brand_title'];
                    $number++;
                ?>
                <tr>
                    <td><?php echo $number; ?></td>
                    <td><?php echo htmlspecialchars($brand_title); ?></td>
                    <td>
                        <a href="index.php?edit_brands=<?php echo $brand_id ?>">
                            <i class="fa-solid fa-pen-to-square text-primary"></i>
                        </a>
                    </td>
                    <td>
                        <!-- Delete trigger -->
                        <a href="#" data-toggle="modal" data-target="#deleteModal<?php echo $brand_id ?>">
                            <i class="fa-solid fa-trash text-danger"></i>
                        </a>
                    </td>
                </tr>

                <!-- Delete confirmation modal -->
                <div class="modal fade" id="deleteModal<?php echo $brand_id ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?php echo $brand_id ?>" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title text-danger" id="deleteModalLabel<?php echo $brand_id ?>">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Are you sure you want to delete this brand?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <a href="index.php?delete_brand=<?php echo $brand_id ?>" class="btn btn-danger">Yes, Delete</a>
                      </div>
                    </div>
                  </div>
                </div>

                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap 4 JS dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>
