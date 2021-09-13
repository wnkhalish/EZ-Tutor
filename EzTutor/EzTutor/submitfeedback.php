<?php
session_start();
require_once("php/dbconfig.php");


$uID = $_SESSION['userid'];
$tID = mysqli_real_escape_string($conn,$_GET['tID']);
$fcontent = mysqli_real_escape_string($conn, $_POST['content']);
$frating = mysqli_real_escape_string($conn, $_POST['rating']);


$sqla = "SELECT * FROM tutor WHERE tID ='$tID'";
$resulta = $conn->query($sqla);
while ($rs = $resulta->fetch_assoc()){
	$taveragerating=$rs['taveragerating'];
	$ttotalrating=$rs['ttotalrating'];
	$tamountrating=$rs['tamountrating'];
}

$newtotal = $ttotalrating + $frating;
$newamount = $tamountrating + '1';
$newaverage = $newtotal / $newamount;

$sqlb = "INSERT INTO feedback (uID,tID,fcontent,frating) VALUES ('$uID','$tID','$fcontent','$frating')";
$sqlc = "UPDATE tutor set taveragerating = '$newaverage', ttotalrating = '$newtotal', tamountrating = '$newamount' WHERE tID = '$tID'";

if ($conn->query($sqlb) === TRUE && $conn->query($sqlc) === TRUE){
	
	header('Location: index.php');
}
else{
	echo"error";
}


?>