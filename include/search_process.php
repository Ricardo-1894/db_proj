<?php
include 'dbh.inc.php';
session_start();
$conn = connect_database();

//$user_id = $_POST['username'];
//$keyword = "%".$_POST['keyword']."%";

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
    $sql = "SELECT unickname, textbody, timestamp, msg_id
            FROM user NATURAL JOIN thread_users NATURAL JOIN thread NATURAL JOIN thread_msgs NATURAL JOIN msg, user_profile
            WHERE user.uid = ? AND thread_type = 0 AND textbody LIKE ? AND user_profile.uid = author";
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt,$sql)){
    mysqli_stmt_bind_param($stmt, "ss", $user_id);
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
    mysqli_stmt_bind_param($stmt, "ss", $user_id);
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