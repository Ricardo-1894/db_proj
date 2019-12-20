<?php
include '../include/dbh.inc.php';
session_start();
$conn = connect_database();
$hashed = password_hash('123', PASSWORD_DEFAULT);
$sql = "UPDATE user
        SET upwd=?
        WHERE uid=123 or uid = 321 or uid = 666;";
    $stmt = mysqli_stmt_init($conn);

    if(mysqli_stmt_prepare($stmt,$sql)){
        mysqli_stmt_bind_param($stmt, "s",$hashed);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }
