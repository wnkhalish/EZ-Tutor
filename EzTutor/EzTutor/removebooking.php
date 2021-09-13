<?php
require_once("php/dbconfig.php");


$bID = mysqli_real_escape_string($conn,$_GET['bID']);

$sql = "UPDATE booking SET bstatus='0' WHERE bID='$bID'";

if ($conn->query($sql) === TRUE)
{
?>
	
		<script type="text/javascript">
		alert("Succesful Remove");
		window.location='index.php';
		</script>
		
<?php
}
else{
	echo"error";
}
?>