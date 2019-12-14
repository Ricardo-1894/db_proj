<?php
include 'dbh.inc.php';

$res = array(
	'block' => array(),
	'hood' => array(),
	'thread' => array(),
);

try {
	$res['data'] = getWeatherStations();
} catch (Exception $e) {
	$res['status'] = -1;
	$res['message'] = $e->getMessage();
} finally {
	echo json_encode($res);
}

function get_block(){
    ##
}
function get_friend(){
    ##
}
function get_thread(){
    ##
}

session_start();
$conn = connect_database();
$user_id = $_SESSION['username'];

$splited = array(explode('#', $_POST['search_string']);
if($splited[1] == 'block'){
    $sql = "
    SELECT * as f_num
    FROM user natural join thread_users natural join thread join msg
    WHERE uid = ? and thread_type = 0
    and thread.last_msg_id = msg.msg_id
    and msg.timestamp > user.last_logout_time";
}
else if($splited[1] == 'hood'){
    ##
}
else{
    
}



$sql = "
    SELECT count(*) as f_num
    FROM user natural join thread_users natural join thread join msg
    WHERE uid = ? and thread_type = 0
    and thread.last_msg_id = msg.msg_id
    and msg.timestamp > user.last_logout_time";
$stmt = mysqli_stmt_init($conn);
if(mysqli_stmt_prepare($stmt,$sql)){
    mysqli_stmt_bind_param($stmt, "s", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
}
$data = mysqli_fetch_assoc($result);
$f_num = $data['f_num'];