<?php
include 'dbh.inc.php';

session_start();
$conn = connect_database();
$user_id = $_SESSION['username'];

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];

    switch($action) {
        case "fetch" : fetch_previous_user_profile(); break;
        case "update" : update_profile(); break;
    }
}

function fetch_previous_user_profile() {
    global $user_id, $conn;
    $sql = "
        SELECT unickname, self_introduction, family_introduction, photo_link
        FROM user_profile
        WHERE uid = ?
    ";

    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $user_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }

    $data = json_encode(mysqli_fetch_assoc($result));
    echo ($data);
}

function update_profile() {
    $sql = "
        UPDATE user_profile 
        SET unickname = ?, self_introduction = ?, family_introduction = ?
        WHERE uid = ?
    ";

    global $user_id, $conn;

    $unickname = $_POST['unickname'];
    $self_introduction = $_POST['self_introduction'];
    $family_introduction = $_POST['family_introduction'];
//    $photo_link = $POST['photo_link'];

    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 'ssss', $unickname, $self_introduction, $family_introduction, $user_id);
        var_dump($stmt);
        if(mysqli_stmt_execute($stmt))
            echo "yes";
        else
            echo "no";
    }
}