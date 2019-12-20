<?php
include 'dbh.inc.php';
session_start();

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];

    switch($action) {
        case "fetch" : fetch_all_friend_threads(); break;
    }
}

function fetch_all_friend_threads(){
    $user_id = $_SESSION['username'];
    $conn = connect_database();

    $sql = "SELECT block_name, COUNT(uid)
            FROM block NATURAL JOIN user 
            WHERE block_name like ? and user.bid = block.bid
            GROUP BY block_name";
    $stmt = mysqli_stmt_init($conn);

    if(mysqli_stmt_prepare($stmt,$sql)){
        mysqli_stmt_bind_param($stmt, "s",$keyword);
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
