<?php
include 'dbh.inc.php';

$user_id = $_SESSION['username'];

function fetch_previous_user_profile() {
    $sql = "
        SELECT unickname, self_introduction, family_introduction, photo_link
        FROM user_profile
        WHERE uid = ?
    ";
    $conn = connect_database();

    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $user_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }

    $data = mysqli_fetch_assoc($result);

    return $data;
}

function update_profile() {
    $sql = "
        UPDATE user_profile 
        SET unickname = ? --, self_introduction = ?, family_introduction = ?, photo_link = ?
        WHERE uid = ?
    ";

    global $user_id;
    $conn = connect_database();

    $unickname = $_POST['unickname'];
//    $self_introduction = $_POST['self_introduction'];
//    $family_introduction = $_POST['family_introduction'];
//    $photo_link = $POST['photo_link'];

    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt, $sql)) {
//        mysqli_stmt_bind_param($stmt, 'sssss', $user_, $self_introduction, $family_introduction, $photo_link, $user_id);
        mysqli_stmt_bind_param($stmt, "s", $unickname, $user_id);
        // TODO: judge if execute success
        mysqli_stmt_execute($stmt);
    }

    disconnect($conn);
}