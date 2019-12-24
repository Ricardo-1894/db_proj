<?php
/**
 * @author     (Haopeng Zhao <hz2151@nyu.edu>)
 * send message to one person (one friend or neighbor)
 */
session_start();

include 'dbh.inc.php';

if(isset($_POST['textbody']) && isset($_POST['threadid']) && !empty($_POST['threadid'])) {
    echo "here";
    echo(doExecution());
}

function doExecution(){
    $conn = connect_database();
    $author = $_SESSION['username'];
    $timestamp = date('Y-m-d H:i:s');
    $textbody = $_POST['textbody'];
    $threadid = $_POST['threadid'];

    //insert msg
    $insert_msg_sql = "INSERT into msg (author, timestamp, textbody) VALUES (?, ?, ?)";
    $insert_msg_stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($insert_msg_stmt, $insert_msg_sql)){
        mysqli_stmt_bind_param($insert_msg_stmt, "sss", $author, $timestamp, $textbody);
        mysqli_stmt_execute($insert_msg_stmt);
    }
    mysqli_stmt_close($insert_msg_stmt);

    //fetch msg id
    $query_last_msgid_sql = "SELECT max(msg_id) as lastid from msg";
    $query_last_msgid_stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($query_last_msgid_stmt, $query_last_msgid_sql)){
        mysqli_stmt_execute($query_last_msgid_stmt);
        $result = mysqli_stmt_get_result($query_last_msgid_stmt);
    }

    $row = $result->fetch_assoc();
    $last_msg_id = $row['lastid'];
    mysqli_stmt_close($query_last_msgid_stmt);

    $insert_thread_msg_sql = "INSERT into thread_msgs values(?,?)";
    $insert_thread_msg_stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($insert_thread_msg_stmt, $insert_thread_msg_sql)){
        mysqli_stmt_bind_param($insert_thread_msg_stmt, "ss", $threadid, $last_msg_id);
        mysqli_stmt_execute($insert_thread_msg_stmt);
    }
    mysqli_stmt_close($insert_thread_msg_stmt);

    $update_thread_user_sql = "UPDATE thread_users SET last_review_time = ? where thread_id=? and uid = ?";
    $update_thread_user_stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($update_thread_user_stmt, $update_thread_user_sql)){
        mysqli_stmt_bind_param($update_thread_user_stmt, "sss", $timestamp, $threadid, $author);
        mysqli_stmt_execute($update_thread_user_stmt);
    }
    mysqli_stmt_close($update_thread_user_stmt);
    return "OK";
}

