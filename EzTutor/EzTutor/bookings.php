<?php
session_start();
require_once("php/dbconfig.php");

$uID = $_SESSION['userid'];
$tID = mysqli_real_escape_string($conn,$_GET['tID']);
$cID = mysqli_real_escape_string($conn,$_GET['cID']);
$lname = mysqli_real_escape_string($conn,$_GET['lname']);
$sname = mysqli_real_escape_string($conn,$_GET['sname']);
$bstatus = "1";



if(isset($_POST['submit'])){
if(!isset($_POST["Days"])){
?>
<script type="text/javascript">
alert("Please select atleast 1 slot!");
window.location='tuto.php?tID=<?php echo $tID;?>&cID=<?php echo $cID;?>&lname=<?php echo $lname;?>&sname=<?php echo $sname;?>';
</script>
<?php
}elseif(isset($_POST["Days"])){
	$bstatus = "1";
	foreach($_POST["Days"] as $a){
		$sqlc = "UPDATE booking set uID = '$uID', bstatus = '$bstatus' WHERE cID = '$cID' AND tableID = '$a'";
		$resultc = $conn->query($sqlc);
		?>
		<script type="text/javascript">
		alert("Booking Successful!");
		window.location='index.php';
		</script>
		<?php
}		
}
}
?>