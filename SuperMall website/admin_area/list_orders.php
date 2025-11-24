<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>View All Payments</title>
    <!-- Bootstrap 4 CSS & FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body>
    <div class="container mt-4">
        <h3 class="text-center text-success mb-4">All Orders</h3>

        <?php
        // Make sure you have a valid database connection in $con before here

        // Handle delete request
        if (isset($_GET['delete_order'])) {
            $delete_id = intval($_GET['delete_order']); // Sanitize input
            $delete_query = "DELETE FROM user_payments WHERE payment_id = $delete_id";
            $delete_result = mysqli_query($con, $delete_query);
            if ($delete_result) {
                echo "<div class='alert alert-success'>Payment record deleted successfully.</div>";
                echo "<meta http-equiv='refresh' content='1;url=index.php?list_orders'>";
            } else {
                echo "<div class='alert alert-danger'>Error deleting record: " . mysqli_error($con) . "</div>";
            }
        }

        // Fetch payments and join with orders to get order_status
        $get_payments = "
            SELECT p.*, o.order_status 
            FROM user_payments p 
            LEFT JOIN user_orders o ON p.order_id = o.order_id
            ORDER BY p.payment_id DESC
        ";

        $result = mysqli_query($con, $get_payments);
        $row_count = mysqli_num_rows($result);

        if ($row_count == 0) {
            echo "<h2 class='text-danger text-center mt-5'>No Order Yet</h2>";
        } else {
        ?>

        <table class="table table-bordered text-center">
            <thead class="thead-light">
                <tr>
                    <th>SNO</th>
                    <th>Invoice Number</th>
                    <th>Amount</th>
                    <th>Payment Mode</th>
                    <th>Order Status</th>
                    <th>Payment Date</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $number = 0;
                while ($row = mysqli_fetch_assoc($result)):
                    $payment_id = $row['payment_id'];
                    $invoice_number = $row['invoice_number'];
                    $amount = $row['amount'];
                    $payment_mode = $row['payment_mode'];
                    $order_status = $row['order_status'] ?? 'N/A'; // Use N/A if null
                    $date = $row['date'];
                    $number++;
                ?>
                <tr>
                    <td><?php echo $number; ?></td>
                    <td><?php echo htmlspecialchars($invoice_number); ?></td>
                    <td><?php echo htmlspecialchars($amount); ?></td>
                    <td><?php echo htmlspecialchars($payment_mode); ?></td>
                    <td><?php echo htmlspecialchars($order_status); ?></td>
                    <td><?php echo htmlspecialchars($date); ?></td>
                    <td>
                        <!-- Delete trigger -->
                        <a href="#" data-toggle="modal" data-target="#deletePaymentModal<?php echo $payment_id ?>">
                            <i class="fa-solid fa-trash text-danger"></i>
                        </a>
                    </td>
                </tr>

                <!-- Delete Confirmation Modal -->
                <div class="modal fade" id="deletePaymentModal<?php echo $payment_id ?>" tabindex="-1" role="dialog" aria-labelledby="deletePaymentModalLabel<?php echo $payment_id ?>" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title text-danger" id="deletePaymentModalLabel<?php echo $payment_id ?>">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Are you sure you want to delete this payment record?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <a href="index.php?list_orders&delete_order=<?php echo $payment_id ?>" class="btn btn-danger">Yes, Delete</a>
                      </div>
                    </div>
                  </div>
                </div>

                <?php endwhile; ?>
            </tbody>
        </table>

        <?php } ?>

    </div>

    <!-- Bootstrap 4 JS scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>
