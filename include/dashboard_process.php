<?php
    function unread_f_msg_count(){
        include 'dbh.inc.php';
        $conn = connect_database();
        $user_id = $_SESSION['username'];

        //friend
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
        // echo mysqli_num_rows($result);
        $data = mysqli_fetch_assoc($result);
        echo $data['f_num']." unread messages.";
        //block
        $sql = "
            SELECT count(*) 
            FROM user natural join block_thread natural join thread join msg
            WHERE uid=? and thread.last_msg_id = msg.msg_id
            and msg.timestamp > user.last_logout_time";
        $stmt = mysqli_stmt_init($conn);
        if(mysqli_stmt_prepare($stmt,$sql)){
            mysqli_stmt_bind_param($stmt, "s", $user_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
        }
        echo $result;

        

        //neighbor
        $sql = "
            SELECT count(*) 
            FROM user natural join thread_users natural join thread
            WHERE uid = ? and thread_type = 0
            and thread.last_msg_id = msg.msg_id
            and msg.timestamp > user.last_logout_time";
        $stmt = mysqli_stmt_init($conn);
        if(mysqli_stmt_prepare($stmt,$sql)){
            mysqli_stmt_bind_param($stmt, "s", $user_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
        }

        //hood
        $sql = "
            SELECT count(*) 
            FROM user natural join block natural join hood natural join hood_thread natural join thread join msg
            WHERE uid=? and 
            and thread.last_msg_id = msg.msg_id
            and msg.timestamp > user.last_logout_time";
        $stmt = mysqli_stmt_init($conn);
        if(mysqli_stmt_prepare($stmt,$sql)){
            mysqli_stmt_bind_param($stmt, "s", $user_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
        }

    }