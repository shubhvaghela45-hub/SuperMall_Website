<?php
if (isset($_GET['delete_user'])) {
    $user_id = (int)$_GET['delete_user']; // Sanitize input
    $delete_query = "DELETE FROM user_table WHERE user_id = $user_id"; // Correct table and column name according to your DB
    $delete_result = mysqli_query($con, $delete_query);

    if ($delete_result) {
        echo "<script>alert('User deleted successfully!'); window.location.href='index.php?list_users';</script>";
    } else {
        echo "<script>alert('Failed to delete user'); window.location.href='index.php?list_users';</script>";
    }
}
?>
