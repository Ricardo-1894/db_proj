<?php
include 'dbh.inc.php';
session_start();
$user_id = $_SESSION['username'];
$conn = connect_database();
$sql = "UPDATE user SET last_logout_time = now() WHERE uid = ?";
$stmt = mysqli_stmt_init($conn);
if(mysqli_stmt_prepare($stmt,$sql)){
    mysqli_stmt_bind_param($stmt, "s", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
}
session_unset();
session_destroy();

echo "<script>alert('You are logged out successfully.');
    location.href='../index.php';</script>";
?>
