<?php
//$conn = null;
//function connect_database(){
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "project";

	$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbname);


//function disconnect(){
//	global $conn;
//	if($conn){
//		mysqli_close($conn);
//	}
//}
?>
