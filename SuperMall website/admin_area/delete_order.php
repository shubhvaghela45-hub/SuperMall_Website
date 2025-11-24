<?php

if (isset($_GET['delete_order'])) {
    $order_id = (int)$_GET['delete_order'];
    $delete_query = "DELETE FROM user_orders WHERE order_id = $order_id";
    $delete_result = mysqli_query($con, $delete_query);
    if ($delete_result) {
        echo "<script>alert('Order deleted successfully!'); window.location.href='index.php?list_orders';</script>";
    } else {
        echo "<script>alert('Failed to delete order'); window.location.href='index.php?list_orders';</script>";
    }
}


?>