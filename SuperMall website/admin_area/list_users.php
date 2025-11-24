<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>All Users</title>
    <!-- Bootstrap 4 CSS & FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body>
    <div class="container mt-4">
        <h3 class="text-center text-success mb-4">All Users</h3>

        <?php
        // Assuming you have database connection in $con

        // Handle delete request
        if (isset($_GET['delete_user'])) {
            $delete_id = intval($_GET['delete_user']); // Sanitize input
            $delete_query = "DELETE FROM user_table WHERE user_id = $delete_id";
            $delete_result = mysqli_query($con, $delete_query);
            if ($delete_result) {
                echo "<div class='alert alert-success'>User deleted successfully.</div>";
                // Redirect to avoid resubmission and refresh list
                echo "<meta http-equiv='refresh' content='1;url=index.php?list_users'>";
            } else {
                echo "<div class='alert alert-danger'>Error deleting user: " . mysqli_error($con) . "</div>";
            }
        }

        $get_user = "SELECT * FROM user_table";
        $result = mysqli_query($con, $get_user);
        $row_count = mysqli_num_rows($result);

        if ($row_count == 0) {
            echo "<h2 class='text-danger text-center mt-5'>No Users Yet</h2>";
        } else {
        ?>

        <table class="table table-bordered text-center">
            <thead class="thead-light">
                <tr>
                    <th>SNO</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>User Image</th>
                    <th>User Address</th>
                    <th>User Mobile</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $number = 0;
                while ($row_data = mysqli_fetch_assoc($result)):
                    $user_id = $row_data['user_id'];
                    $username = htmlspecialchars($row_data['username']);
                    $user_email = htmlspecialchars($row_data['user_email']);
                    $user_image = $row_data['user_image'];
                    $user_address = htmlspecialchars($row_data['user_address']);
                    $user_mobile = htmlspecialchars($row_data['user_mobile']);
                    $number++;
                ?>
                <tr>
                    <td><?php echo $number; ?></td>
                    <td><?php echo $username; ?></td>
                    <td><?php echo $user_email; ?></td>
                    <td>
                        <img src="../users_area/user_images/<?php echo $user_image; ?>" 
                             alt="<?php echo $username; ?>" 
                             class="product_img" style="width:80px; height:auto;" />
                    </td>
                    <td><?php echo $user_address; ?></td>
                    <td><?php echo $user_mobile; ?></td>
                    <td>
                        <!-- Delete trigger -->
                        <a href="#" data-toggle="modal" data-target="#deleteUserModal<?php echo $user_id; ?>">
                            <i class="fa-solid fa-trash text-danger"></i>
                        </a>
                    </td>
                </tr>

                <!-- Delete Confirmation Modal for User -->
                <div class="modal fade" id="deleteUserModal<?php echo $user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel<?php echo $user_id; ?>" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title text-danger" id="deleteUserModalLabel<?php echo $user_id; ?>">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Are you sure you want to delete this user: <strong><?php echo $username; ?></strong>?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <a href="index.php?list_users&delete_user=<?php echo $user_id; ?>" class="btn btn-danger">Yes, Delete</a>
                      </div>
                    </div>
                  </div>
                </div>

                <?php endwhile; ?>
            </tbody>
        </table>

        <?php } ?>
    </div>

    <!-- JS Scripts for Bootstrap Modals -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" crossorigin="anonymous"></script>

</body>
</html>
