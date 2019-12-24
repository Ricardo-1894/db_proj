<?php
session_start();
include 'dbh.inc.php';

$conn = connect_database();
$user_id = $_SESSION['username'];
$add_id = $_POST['add_id'];

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];

    switch($action) {
        case "fetch" : echo fetch_friend(); break;
        default: break;
    }
}

function fetch_friend(){
    global $conn, $user_id;

    $sql = "create or replace view f_id (fid) as(
	            select uid2 as fid from friend_relation 
	                where uid1=?
                union 
                select uid1 as fid from friend_relation 
                    where uid2=? )";
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt,$sql)){
        mysqli_stmt_bind_param($stmt, "ss", $user_id, $user_id);
        mysqli_stmt_execute($stmt);
    }

    $fetch_sql = "select user_profile.uid as uid, unickname, block_name from f_id, user natural join user_profile natural join block 
                    where f_id.fid = user.uid";
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt,$fetch_sql)){
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }

    $dbdata = array();
    while ($row = $result->fetch_assoc())  {
        $dbdata[]=$row;
    }
    return json_encode($dbdata);
}
