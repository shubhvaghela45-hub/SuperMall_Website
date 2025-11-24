<?php

if (isset($_GET['delete_payment'])) {
    $payment_id = (int)$_GET['delete_payment'];
    $delete_query = "DELETE FROM payments_table WHERE payment_id = $payment_id";
    $delete_result = mysqli_query($con, $delete_query);
    if ($delete_result) {
        echo "<script>alert('Payment deleted successfully!'); window.location.href='index.php?list_payments';</script>";
    } else {
        echo "<script>alert('Failed to delete payment'); window.location.href='index.php?list_payments';</script>";
    }
}


?>