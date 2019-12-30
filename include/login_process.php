<?php
session_start();

include "dbh.inc.php";
$conn = connect_database();

$user_name = $_POST['user_name'];
$password = $_POST['password'];
$current_login_time = date("Y-m-d H:i:s");

if($user_name == null){
    echo "<script>alert('UserName cannot leave blank!');
        location.href='../index.php';</script>";
}
if($password == null){
    echo "<script>alert('Password cannot leave blank!');
        location.href='../index.php';</script>";
}

//$sql = "SELECT * FROM user WHERE uid=? and upwd=?";
$sql = "SELECT * FROM user WHERE uid=?";
$stmt = mysqli_stmt_init($conn);
if(mysqli_stmt_prepare($stmt,$sql)){
    echo "?";
    // mysqli_stmt_bind_param($stmt, "ss", $user_name, $password);
    mysqli_stmt_bind_param($stmt, "s", $user_name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = $result->fetch_assoc();
    //if(password_verify($password, $row['upwd'])){
    if(true){
        disconnect($conn);
        $_SESSION['username'] = $user_name;
        echo "<script>location.href='../dashboard.php';</script>";
    }
    else{
        disconnect($conn);
        echo "<script>
                alert('Invalid username or password, try again!');
                location.href='../index.php';
              </script>";
    }
    // if(mysqli_num_rows($result) == 0){
    //     disconnect($conn);
    //     echo "<script>
    //             alert('Invalid username or password, try again!');
    //             location.href='../index.php';
    //           </script>";
    // }
    // else{
    //     disconnect($conn);
    //     $_SESSION['username'] = $user_name;
    //     echo "<script>location.href='../dashboard.php';</script>";
    // }
}
?>
