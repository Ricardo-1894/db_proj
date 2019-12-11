<?php
include 'dbh.inc.php';

$total = 0;
$conn = connect_database();
$user_id = $_SESSION['username'];

$sql = "
    SELECT count(*) as f_num
    FROM user natural join thread_users natural join thread join msg
    WHERE uid = ? and thread_type = 0
    and thread.last_msg_id = msg.msg_id
    and msg.timestamp > user.last_logout_time";
$stmt = mysqli_stmt_init($conn);
if(mysqli_stmt_prepare($stmt,$sql)){
    mysqli_stmt_bind_param($stmt, "s", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
}
$data = mysqli_fetch_assoc($result);
$f_num = $data['f_num'];

$sql = "
    SELECT count(*) as n_num
    FROM user natural join thread_users natural join thread join msg
    WHERE uid = ? and thread_type = 1
    and thread.last_msg_id = msg.msg_id
    and msg.timestamp > user.last_logout_time";
$stmt = mysqli_stmt_init($conn);
if(mysqli_stmt_prepare($stmt,$sql)){
    mysqli_stmt_bind_param($stmt, "s", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
}
$data = mysqli_fetch_assoc($result);
$n_num = $data['n_num'];

$sql = "
    SELECT count(*) as b_num
    FROM user natural join thread_users natural join thread join msg
    WHERE uid = ? and thread_type = 2
    and thread.last_msg_id = msg.msg_id
    and msg.timestamp > user.last_logout_time";
$stmt = mysqli_stmt_init($conn);
if(mysqli_stmt_prepare($stmt,$sql)){
    mysqli_stmt_bind_param($stmt, "s", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
}
$data = mysqli_fetch_assoc($result);
$b_num = $data['b_num'];

$sql = "
    SELECT count(*) as h_num
    FROM user natural join thread_users natural join thread join msg
    WHERE uid = ? and thread_type = 3
    and thread.last_msg_id = msg.msg_id
    and msg.timestamp > user.last_logout_time";
$stmt = mysqli_stmt_init($conn);
if(mysqli_stmt_prepare($stmt,$sql)){
    mysqli_stmt_bind_param($stmt, "s", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
}
$data = mysqli_fetch_assoc($result);
$h_num = $data['h_num'];

$total_num = $f_num + $n_num + $b_num + $h_num;

disconnect($conn);

function unread_f_msg_count(){
    global $f_num;
    echo $f_num." unread messages from your friends.";
}

function unread_n_msg_count(){
    global $n_num;
    echo $n_num." unread messages from your neighbors.";
}

function unread_b_msg_count(){
    global $b_num;
    echo $b_num." unread messages from your block.";
}

function unread_h_msg_count(){
    global $h_num;
    echo $h_num." unread messages from your hood.";
}

function total_unread_msg_count(){
    global $total_num;
    if($total_num <= 99){
        echo $total_num;
    }
    else{
        echo "99+";
    }
}
    