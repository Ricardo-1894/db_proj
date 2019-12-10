<?php
    session_start();
    function friends_messages_num(){
        $count_num_sql = "SELECT * FROM user WHERE uid=?";
        $check_exist_stmt = mysqli_stmt_init($conn);
        if(mysqli_stmt_prepare($check_exist_stmt,$check_exist_sql)){
            mysqli_stmt_bind_param($check_exist_stmt, "s", $user_id);
            mysqli_stmt_execute($check_exist_stmt);
            $result = mysqli_stmt_get_result($check_exist_stmt);
        }
        return $result;

    }