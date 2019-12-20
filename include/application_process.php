<?php
session_start();
include 'dbh.inc.php';

$conn = connect_database();
$user_id = $_SESSION['username'];
$ap_uid = $_POST['ap_uid'];

function friend_request(){
    global $conn, $user_id;
    $sql = "SELECT user_profile.uid as uid, unickname
            from user, friend_application, user_profile
            where user.uid = ? and uid2 = user.uid and user_profile.uid = uid1";
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt,$sql)){
        mysqli_stmt_bind_param($stmt, "s", $user_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }
    $dbdata = array();
    while ( $row = $result->fetch_assoc())  {
        $dbdata[]=$row;
    }
    $db_encode = json_encode($dbdata);
    echo $db_encode;
}

function block_request(){
    global $conn, $user_id;
    $sql = "SELECT user_profile.uid, unickname, apr_num
            from user, block_application as ba, user_profile
            where user.uid = ? and ba.bid = user.bid and user_profile.uid = ba.uid and apr_num < 3";
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt,$sql)){
        mysqli_stmt_bind_param($stmt, "s", $user_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }
    $dbdata = array();
    while ( $row = $result->fetch_assoc())  {
        $dbdata[]=$row;
    }
}
function agree_friend(){
    global $conn, $user_id, $ap_uid;
    $sql = "INSERT INTO `friend_relation` VALUES (?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt,$sql)){
        mysqli_stmt_bind_param($stmt, "ss", $user_id, $ap_uid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }
}
function agree_block(){
    global $conn, $user_id, $ap_uid;
    $sql = "UPDATE block_application SET apr_num=apr_num+1 WHERE uid=? and bid = (
                select bid from user where uid = ?)";
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt,$sql)){
        mysqli_stmt_bind_param($stmt, "ss", $ap_id, $user_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }

    $sql = "SELECT bid, apr_num
            from block_application 
            where uid = ? and bid = (select bid from user where uid = ?)";
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt,$sql)){
        mysqli_stmt_bind_param($stmt, "ss", $ap_id, $user_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }
    $row = $result->fetch_assoc();
    if($row['apr_num']>=3){
        $sql = "UPDATE user SET bid = ? WHERE uid = ?";
        $stmt = mysqli_stmt_init($conn);
        if(mysqli_stmt_prepare($stmt,$sql)){
            mysqli_stmt_bind_param($stmt, "ss", $row['bid'], $ap_uid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
        }
    }

}