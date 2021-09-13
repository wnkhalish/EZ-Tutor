<?php
require_once("php/header.php");
require_once("php/dbconfig.php");

$tID = $_SESSION['userid'];
$cID = mysqli_real_escape_string($conn,$_GET['cID']);
$bstatus = "0";

$sqla = "DELETE FROM course WHERE cID ='$cID'";
$sqlb = "DELETE FROM booking WHERE cID ='$cID' AND bstatus='bstatus'";

if ($conn->query($sqla) === TRUE && $conn->query($sqlb) === TRUE)
{
?>
	
		<script type="text/javascript">
		alert("Succesful Remove");
		window.location='aboutTutor.php';
		</script>
		
<?php
}
else{
	echo"error";
}

?>