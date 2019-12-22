<?php
/**
 * @author     (Haopeng Zhao <hz2151@nyu.edu>)
 * send message to one person (one friend or neighbor)
 */

include 'dbh.inc.php';

class send_single_msg {
    private $author;
    private $timestamp;
    private $textbody;
    private $threadid;

    public function doExecution(){
        $conn = connect_database();
        $dbg = "";

        $this->author = $_SESSION['username'];
        $this->timestamp = date('Y-m-d H:i:s');
        $this->textbody = $_POST['textbody'];
        $this->threadid = $_POST['thread_id'];

        $this->checkValid();

        //insert msg
        $insert_msg_sql = "INSERT into msg (author, timestamp, textbody) VALUES (?, ?, ?)";
        $insert_msg_stmt = mysqli_stmt_init($conn);
        if(mysqli_stmt_prepare($insert_msg_stmt, $insert_msg_sql)){
            mysqli_stmt_bind_param($insert_msg_stmt, "sss", $this->author, $this->timestamp, $this->textbody);
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
        $row =  mysqli_fetch_assoc($result);
        mysqli_stmt_close($query_last_msgid_stmt);

        $insert_thread_msg_sql = "INSERT into thread_msgs values(?,?)";
        $insert_thread_msg_stmt = mysqli_stmt_init($conn);
        if(mysqli_stmt_prepare($insert_thread_msg_stmt, $insert_thread_msg_sql)){
            mysqli_stmt_bind_param($insert_thread_msg_stmt, "ss", $this->threadid, $row);
            mysqli_stmt_execute($insert_thread_msg_stmt);
        }
        mysqli_stmt_close($insert_thread_msg_stmt);

        $update_thread_user_sql = "UPDATE thread_users SET last_review_time = ? where thread_id=? and uid = ?";
        $update_thread_user_stmt = mysqli_stmt_init($conn);
        if(mysqli_stmt_prepare($update_thread_user_stmt, $update_thread_user_sql)){
            mysqli_stmt_bind_param($update_thread_user_stmt, "sss", $this->timestamp, $this->threadid, $this->author);
            mysqli_stmt_execute($update_thread_user_stmt);
        }
        mysqli_stmt_close($update_thread_user_stmt);
        return "OK";
    }

    private function checkValid(){
        if(!$this->author) {
            throw new Exception("Message must send by someone!");
        }
        if(!$this->textbody) {
            throw new Exception("Message cannot be NULL!");
        }
        if(!$this->threadid) {
            throw new Exception("System error!");
        }
    }
}

session_start();

$res = array(
    'status' => 0,
    'data' => array(),
    'message' => 'Success'
);

try {
    $thisClass = new send_single_msg();
    $res['data'] = $thisClass->doExecution();
}
catch (Exception $e){
    $res['status'] = $e->getCode() ? $e->getCode() : -1;
    $res['message'] = $e->getMessage();
} finally{
    echo json_encode($this['data']);
}
