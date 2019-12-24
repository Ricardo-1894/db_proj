<?php
/**
 * @author     (Haopeng Zhao <hz2151@nyu.edu>)
 * fetch all friends' or all neighbors' threads
 */
session_start();
include 'dbh.inc.php';

$user_id = $_SESSION['username'];

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];

    switch($action) {
        case "fetch_friend":
            echo fetch_all_kind($user_id, "0");
            break;
        case "fetch_neighbor":
            echo fetch_all_kind($user_id, "1");
            break;
        case "fetch_block":
            echo fetch_all_kind($user_id, "2");
            break;
        case "fetch_hood":
            echo fetch_all_kind($user_id, "3");
            break;
        default:
            return "";
            break;
    }
}

function fetch_all_kind($user_id, $thread_type){
    $res = array(
        'status' => 0,
        'data' => array(),
    );

    $conn = connect_database();

    $fetch_thread_msg_sql =
       "select t.thread_id, t.thread_name, m.msg_id, m.author, up.unickname, up.photo_link, m.timestamp, m.textbody
            from thread_users tu, thread t, thread_msgs tm, msg m, user_profile up
            where tu.uid = ? and thread_type = ? and tu.thread_id = t.thread_id and t.thread_id = tm.thread_id and tm.msg_id = m.msg_id and author = up.uid
            order by t.thread_id, m.timestamp";
    $fetch_thread_msg_stmt = mysqli_stmt_init($conn);

    if(mysqli_stmt_prepare($fetch_thread_msg_stmt, $fetch_thread_msg_sql)){
        mysqli_stmt_bind_param($fetch_thread_msg_stmt, "ss", $user_id, $thread_type);
        mysqli_stmt_execute($fetch_thread_msg_stmt);
        $stmt_result = mysqli_stmt_get_result($fetch_thread_msg_stmt);
    }

    $data = array();
    while($row = $stmt_result->fetch_assoc()){
        $data[] = $row;
    }
//    echo json_encode($data);

    $result = array();
    $length = 0;
    foreach($data as $key => $value) {
        if($key > 0 && $value['thread_id'] <> $data[$key - 1]['thread_id'] || $key == 0){
            $new_temp_row = array();
            $new_temp_row['thread_id'] = $value['thread_id'];
            $new_temp_row['thread_name'] = $value['thread_name'];
            $new_temp_row['msgs'] = array();
            array_push($result, $new_temp_row);
            $length = count($result) - 1;
        }
        $add_to_same_thread = array();
        $add_to_same_thread['msg_id'] = $value['msg_id'];
        $add_to_same_thread['author'] = $value['author'];
        $add_to_same_thread['photo_link'] = $value['photo_link'];
        $add_to_same_thread['unickname'] = $value['unickname'];
        $add_to_same_thread['timestamp'] = $value['timestamp'];
        $add_to_same_thread['textbody'] = $value['textbody'];
        array_push($result[$length]['msgs'], $add_to_same_thread);
    }

    $res['data'] = $result;
    return json_encode($res);
}
