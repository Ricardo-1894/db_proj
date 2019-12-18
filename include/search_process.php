<?php
include 'dbh.inc.php';
session_start();
$conn = connect_database();

$user_id = $_SESSION['username'];
$keyword = "%".$_POST['search_text']."%";

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];

    switch($action) {
        case "Thread" : search_thread(); break;
        case "Friend" : search_friend(); break;
        case "Block"  : search_block(); break;
    }
}

function search_block(){
    global $conn, $user_id, $keyword;

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

function search_friend(){
    global $conn, $user_id, $keyword;
    $sql = "SELECT unickname, block_name
            FROM user AS u1, friend_relation, user AS u2, user_profile, block
            WHERE u1.uid = ? AND u1.uid = uid1 AND u2.uid = uid2 AND user_profile.uid = u2.uid AND unickname LIKE ? AND block.bid = u2.bid
            UNION
            SELECT unickname, block_name
            FROM user AS u1, friend_relation, user AS u2, user_profile, block
            WHERE u1.uid = ? AND u1.uid = uid2 AND u2.uid = uid1 AND user_profile.uid = u2.uid AND unickname LIKE ? AND block.bid = u2.bid
            ";
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt,$sql)){
    mysqli_stmt_bind_param($stmt, "ssss", $user_id, $keyword, $user_id, $keyword);
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
function search_thread(){
    global $conn, $user_id, $keyword;
    $sql = "SELECT thread_name, author, textbody, timestamp
            FROM user NATURAL JOIN thread_users NATURAL JOIN thread NATURAL JOIN msg
            WHERE uid = ? and msg_id = last_msg_id and thread_name like ?";
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt,$sql)){
    mysqli_stmt_bind_param($stmt, "ss", $user_id, $keyword);
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
?>