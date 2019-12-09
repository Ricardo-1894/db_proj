<?php
//$conn = null;
//function connect_database(){
$dbServername = "127.0.0.1";
$dbUsername = "root";
$dbPassword = "Qq.123456";
$dbname = "project";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbname);


//function disconnect(){
//	global $conn;
//	if($conn){
//		mysqli_close($conn);
//	}
//}
?>
