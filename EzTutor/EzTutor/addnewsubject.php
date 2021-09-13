<?php
require_once("php/dbconfig.php");
session_start();

$tID = $_SESSION['userid'];
$lID = mysqli_real_escape_string($conn, $_POST['level-list']);
$sID = mysqli_real_escape_string($conn, $_POST['subject-list']);
$cprice = mysqli_real_escape_string($conn, $_POST['cprice']);

$sqla = "INSERT INTO course (tID,lID,sID,cprice) VALUES ('$tID','$lID','$sID','$cprice')";
	
if ($conn->query($sqla) === TRUE){
	
	$sqlb ="SELECT * FROM course WHERE tID = '$tID' AND lID = '$lID' AND sID = '$sID' AND cprice = '$cprice'";
	$resultb = $conn->query($sqlb);
				
	while ($gg = $resultb->fetch_assoc()){			
	$cID=$gg['cID'];
	}
	$bstatus = "0";
	
	foreach($_POST["Days"] as $a){
		$sqlc = "INSERT INTO booking (cID,bstatus,tableID,tID,lID,sID,cprice) VALUES ('$cID','$bstatus','$a','$tID','$lID','$sID','$cprice')";
		$resultc = $conn->query($sqlc);
		header('Location: index.php');
	}
}
else{
	echo"error";
}

?>