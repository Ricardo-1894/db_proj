<?php
session_start();
include 'dbh.inc.php';

$conn = connect_database();
$user_id = $_SESSION['username'];
fetch_neighbor_thread();

function fetch_neighbor_thread(){
    global $conn, $user_id;
    $sql = "SELECT unickname, textbody, timestamp
            from user natural join thread_users natural join thread natural join thread_msgs natural join msg, user_profile 
            where user.uid = ? and thread_type = 1 and user_profile.uid = author";
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
function fetch_friend_thread(){
    global $conn, $user_id;
    $sql = "SELECT unickname, textbody, timestamp
            FROM user natural join thread_users natural join thread natural join thread_msgs natural join msg, user_profile
            WHERE user.uid=? and thread_type=0 and user_profile.uid=author";
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
function fetch_block_thread(){
    global $conn, $user_id;
    $sql = "SELECT thread_id, thread_name, textbody, timestamp
            FROM user natural join thread_users natural join thread natural join thread_msgs natural join msg, user_profile
            WHERE user.uid=? and thread_type=2 and user_profile.uid=author";
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

    for($x = 0; $x < count($dbdata); $x++){
        if($x == 0 || $dbdata[$x]['thread_name'] != $dbdata[$x-1]['thread_name']){
            $dbdata_mod[$dbdata[$x]['thread_name']][] = array_slice($dbdata[$x], 2,3);
        }
        else{
            array_push($dbdata_mod[$dbdata[$x]['thread_name']], array_slice($dbdata[$x], 2,3));
        }
    }

    $db_encode = json_encode($dbdata_mod);
    echo $db_encode;
}
function fetch_hood_thread(){
    global $conn, $user_id;
    $sql = "SELECT thread_id, thread_name, textbody, timestamp
            FROM user natural join thread_users natural join thread natural join thread_msgs natural join msg, user_profile
            WHERE user.uid=123 and thread_type=3 and user_profile.uid=author";
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
    for($x = 0; $x < count($dbdata); $x++){
        if($x == 0 || $dbdata[$x]['thread_name'] != $dbdata[$x-1]['thread_name']){
            $dbdata_mod[$dbdata[$x]['thread_name']][] = array_slice($dbdata[$x], 2,3);
        }
        else{
            array_push($dbdata_mod[$dbdata[$x]['thread_name']], array_slice($dbdata[$x], 2,3));
        }
    }

    $db_encode = json_encode($dbdata_mod);
    echo $db_encode;
}