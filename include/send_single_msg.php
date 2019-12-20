<?php

include 'dbh.inc.php';
session_start();
$conn = connect_database();

if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
        case "send" :
            send_msg();
            break;
    }
}

function send_msg(){

}

