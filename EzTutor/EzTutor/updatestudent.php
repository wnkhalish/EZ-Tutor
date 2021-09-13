<?php
require_once("php/dbconfig.php");
session_start();

$userid = $_SESSION['userid'];
$uname = mysqli_real_escape_string($conn, $_POST['uname']);
$umail = mysqli_real_escape_string($conn, $_POST['umail']);
$upass = mysqli_real_escape_string($conn, $_POST['upass']);
$ucity = mysqli_real_escape_string($conn, $_POST['ucity']);
$ustate = mysqli_real_escape_string($conn, $_POST['ustate']);
$uzip = mysqli_real_escape_string($conn, $_POST['uzip']);

	
$sql = "UPDATE student SET uname = '$uname', umail = '$umail', upass = '$upass', ucity = '$ucity', ustate = '$ustate', uzip = '$uzip' WHERE uID = '$userid'";
	
if ($conn->query($sql) === TRUE){
	
	header('Location: std.php');
}
else{
	echo"error";
}

?>