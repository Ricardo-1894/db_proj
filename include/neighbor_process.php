<?php
session_start();
include 'dbh.inc.php';

$conn = connect_database();
$user_id = $_SESSION['username'];
$add_id = $_POST['add_id'];

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];

    switch($action) {
        case "fetch" : fetch_neighbor(); break;
        default: break;
    }
}

function fetch_neighbor(){
    global $conn, $user_id;
    $sql = "SELECT uid, unickname, block_name 
            from user natural join user_profile natural join block natural join hood 
            where uid != ? and hid = (
                select hid 
                from user as u1 natural join block natural join hood 
                where u1.uid = ?)";
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt,$sql)){
        mysqli_stmt_bind_param($stmt, "ss", $user_id, $user_id);
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

//function add_friend(){
//    global $conn, $user_id, $add_id;
//
//    $sql = "INSERT INTO `friend_relation` VALUES (?,?)";
//    $stmt = mysqli_stmt_init($conn);
//    if(mysqli_stmt_prepare($stmt,$sql)){
//        mysqli_stmt_bind_param($stmt, "ss", $add_id, $user_id);
//        mysqli_stmt_execute($stmt);
//        $result = mysqli_stmt_get_result($stmt);
//    }
//}
