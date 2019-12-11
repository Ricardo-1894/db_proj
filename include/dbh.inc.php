<?php
function connect_database(){
    $dbServername = "127.0.0.1";
    $dbUsername = "root";
    $dbPassword = "Qq.123456";
    $dbname = "project";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbname);
    return $conn;
}

function disconnect($conn){
	if($conn){
		mysqli_close($conn);
	}
}
?>
