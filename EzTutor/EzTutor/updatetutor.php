<?php
require_once("php/dbconfig.php");
session_start();

$userid = $_SESSION['userid'];
$tname = mysqli_real_escape_string($conn, $_POST['tname']);
$temail = mysqli_real_escape_string($conn, $_POST['temail']);
$tpass = mysqli_real_escape_string($conn, $_POST['tpass']);
$tstate = mysqli_real_escape_string($conn, $_POST['tstate']);
$tcity = mysqli_real_escape_string($conn, $_POST['tcity']);
$tphno = mysqli_real_escape_string($conn, $_POST['tphno']);

	
$sql = "UPDATE tutor SET tname = '$tname', temail = '$temail', tpass = '$tpass', tstate = '$tstate', tcity = '$tcity', tphno = '$tphno' WHERE tID = '$userid'";
	
if ($conn->query($sql) === TRUE){
	
	header('Location: std.php');
}
else{
	echo"error";
}

?>