<?php
require_once("php/dbconfig.php");
session_start();

$tID = $_SESSION['userid'];
$cID = mysqli_real_escape_string($conn,$_GET['cID']);
$cprice = mysqli_real_escape_string($conn, $_POST['cprice']);


$sqla = "UPDATE course SET cprice = '$cprice' WHERE cID = '$cID'";
$sqlb = "UPDATE booking SET cprice = '$cprice' WHERE cID = '$cID'";


if ($conn->query($sqla) === TRUE && $conn->query($sqlb) === TRUE){
	
	header('Location: index.php');
}
else{
	echo"error";
}
?>