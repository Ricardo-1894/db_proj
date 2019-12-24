<?php
session_start();
include 'dbh.inc.php';

if(isset($_POST['action']) && !empty($_POST['action'])){
    $action = $_POST['action'];
    switch ($action){
        case "friend_request": echo friend_request(); break;
        case "agree_friend": agree_friend(); break;
        case "fetch_friend_request": echo fetch_friend_request(); break;
//        case "block_request": echo
        default: break;
    }
}

function friend_request(){
    $res = array(
        'status' => 0,
        'data' => array(),
        'message' => 'Success'
    );

    $conn = connect_database();
    $user_id = $_SESSION['username'];
    $target_id = $_POST['target_id'];

    $stmt = mysqli_stmt_init($conn);
    $check_pending_sql = "SELECT uid2 from friend_application WHERE uid1 = ? and uid2 = ?";
    if(mysqli_stmt_prepare($stmt,$check_pending_sql)){
        mysqli_stmt_bind_param($stmt, "ss", $user_id, $target_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }
    $dbdata = array();
    while($row = $result -> fetch_assoc())
        $dbdata[] = $row;
    if(count($dbdata) != 0){
        $res['status'] = 1;
        $res['message'] = "Application pending";
        return json_encode($res);
    }
    mysqli_stmt_close($stmt);

    $stmt = mysqli_stmt_init($conn);
    $check_friend_sql = "SELECT uid1, uid2 FROM friend_relation WHERE (uid1=? AND uid2=?) OR (uid2=? AND uid1=?)";
    if(mysqli_stmt_prepare($stmt, $check_friend_sql)){
        mysqli_stmt_bind_param($stmt, "ssss", $user_id, $target_id, $user_id, $target_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }
    $dbdata = array();
    while($row = $result -> fetch_assoc())
        $dbdata[] = $row;
    if(count($dbdata) != 0){
        $res['status'] = 2;
        $res['message'] = "Already friends";
        return json_encode($res);
    }
    mysqli_stmt_close($stmt);

    $stmt = mysqli_stmt_init($conn);
    $insert_sql = "INSERT INTO friend_application VALUES (?,?)";
    if(mysqli_stmt_prepare($stmt, $insert_sql)){
        mysqli_stmt_bind_param($stmt, "ss", $user_id, $target_id);
        mysqli_stmt_execute($stmt);
    }

    $dbdata = array();
    while ( $row = $result->fetch_assoc())  {
        $dbdata[]=$row;
    }
    return json_encode($dbdata);
}

function fetch_friend_request(){
    $conn = connect_database();
    $user_id = $_SESSION['username'];

    $sql = "select uid, unickname, block_name from user natural join user_profile natural join block, friend_application fa where uid = fa.uid1 and fa.uid2=?;";
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt,$sql)){
        mysqli_stmt_bind_param($stmt, "s", $user_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }
//    echo $user_id;
    $dbdata = array();
    while ( $row = $result->fetch_assoc())  {
        $dbdata[]=$row;
    }
    return json_encode($dbdata);
}

function agree_friend(){
    $conn = connect_database();
    $user_id = $_SESSION['username'];
    $target_id = $_POST['target_id'];

    $insert_relation_sql = "INSERT INTO friend_relation VALUES (?,?)";
    $stmt = mysqli_stmt_init($conn);

    if(mysqli_stmt_prepare($stmt,$insert_relation_sql)){
        mysqli_stmt_bind_param($stmt, "ss", $user_id, $target_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }
    mysqli_stmt_close($stmt);

    $delete_application_sql = "DELETE FROM friend_application WHERE uid1=? and uid2=?";
    $stmt = mysqli_stmt_init($conn);

    if(mysqli_stmt_prepare($stmt,$delete_application_sql)){
        mysqli_stmt_bind_param($stmt, "ss", $target_id, $user_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }
    mysqli_stmt_close($stmt);
}

function block_request(){
    $conn = connect_database();

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

//function agree_block(){
//    global $conn, $user_id, $ap_uid;
//    $sql = "UPDATE block_application SET apr_num=apr_num+1 WHERE uid=? and bid = (
//                select bid from user where uid = ?)";
//    $stmt = mysqli_stmt_init($conn);
//    if(mysqli_stmt_prepare($stmt,$sql)){
//        mysqli_stmt_bind_param($stmt, "ss", $ap_id, $user_id);
//        mysqli_stmt_execute($stmt);
//        $result = mysqli_stmt_get_result($stmt);
//    }
//
//    $sql = "SELECT bid, apr_num
//            from block_application
//            where uid = ? and bid = (select bid from user where uid = ?)";
//    $stmt = mysqli_stmt_init($conn);
//    if(mysqli_stmt_prepare($stmt,$sql)){
//        mysqli_stmt_bind_param($stmt, "ss", $ap_id, $user_id);
//        mysqli_stmt_execute($stmt);
//        $result = mysqli_stmt_get_result($stmt);
//    }
//    $row = $result->fetch_assoc();
//    if($row['apr_num']>=3){
//        $sql = "UPDATE user SET bid = ? WHERE uid = ?";
//        $stmt = mysqli_stmt_init($conn);
//        if(mysqli_stmt_prepare($stmt,$sql)){
//            mysqli_stmt_bind_param($stmt, "ss", $row['bid'], $ap_uid);
//            mysqli_stmt_execute($stmt);
//            $result = mysqli_stmt_get_result($stmt);
//        }
//    }
//
//}