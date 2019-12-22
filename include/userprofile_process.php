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
        case "uploadAvatar": upload_avatar(); break;
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
        if(mysqli_stmt_execute($stmt))
            echo "yes";
        else
            echo "no";
    }
}

function upload_avatar () {
    global $user_id, $conn;
    $uploadOk = 1;
    $target_dir = "../pic/";
    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);

    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["avatar"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else if (!move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
        echo "Sorry, there was an error uploading your file.";
    }

    // file name
    $fileName = 'pic/' . basename($_FILES["avatar"]["name"]);

    // update db
    $sql = "
        UPDATE user_profile 
        SET photo_link = ?
        WHERE uid = ?
    ";

    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)){
        mysqli_stmt_bind_param($stmt, "ss", $fileName, $user_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }
}