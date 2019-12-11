<?php
include 'dbh.inc.php';
$conn = connect_database();
$user_id = $_POST['user_id'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if($user_id == null){
    disconnect($conn);
    echo "<script>alert('UserName cannot leave blank!');
        location.href='../index.php';</script>";
}
if($password == null){
    disconnect($conn);
    echo "<script>alert('Password cannot leave blank!');
        location.href='../index.php';</script>";
}
if($password != $confirm_password){
    disconnect($conn);
    echo "<script>alert('Password is not the same as confirm password!');
        location.href='../index.php';</script>";
}

function check_exist_username(){
    global $conn, $user_id;
    $check_exist_sql = "SELECT * FROM user WHERE uid=?";
    $check_exist_stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($check_exist_stmt,$check_exist_sql)){
        mysqli_stmt_bind_param($check_exist_stmt, "s", $user_id);
        mysqli_stmt_execute($check_exist_stmt);
        $result = mysqli_stmt_get_result($check_exist_stmt);
    }
    return $result;
}

    //function password_hash($, PASSWORD_DEFAULT)

if(mysqli_num_rows(check_exist_username()) == 1){
    disconnect($conn);
    echo "<script>alert('Phone Number already registered. Try log in?');
        location.href='../index.php';</script>";
}

//create new user, insert into 'user' table, create new user_profile, insert into 'user_profile' table;
$register_sql = "INSERT into user VALUES(?, ?, null, null)";
$register_stmt = mysqli_stmt_init($conn);

if(mysqli_stmt_prepare($register_stmt,$register_sql)){
    mysqli_stmt_bind_param($register_stmt, "ss", $user_id, $password);
    mysqli_stmt_execute($register_stmt);

    if(mysqli_num_rows(check_exist_username()) == 1){
        $sql = "INSERT into user_profile VALUES(?, null, null, null, null)";
        $stmt = mysqli_stmt_init($conn);
        if(mysqli_stmt_prepare($stmt,$sql)){
            mysqli_stmt_bind_param($stmt, "s", $user_id);
            mysqli_stmt_execute($stmt);
        }
        disconnect($conn);
        echo "<script>alert('Successfully registered! You can log in NOW!');
            location.href='../index.php';</script>";
    }
}

?>
