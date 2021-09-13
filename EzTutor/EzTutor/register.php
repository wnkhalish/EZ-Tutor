<?php

require_once("php/dbconfig.php");
	
	
$uname = mysqli_real_escape_string($conn, $_POST['uname']);
$umail = mysqli_real_escape_string($conn, $_POST['umail']);
$udob = mysqli_real_escape_string($conn, $_POST['udob']);
$ugender = mysqli_real_escape_string($conn, $_POST['ugender']);
$upass = mysqli_real_escape_string($conn, $_POST['upass']);
$uaddress = mysqli_real_escape_string($conn, $_POST['uaddress']);
$ustreet = mysqli_real_escape_string($conn, $_POST['ustreet']);
$ustate = mysqli_real_escape_string($conn, $_POST['ustate']);
$ucity = mysqli_real_escape_string($conn, $_POST['ucity']);
$uzip = mysqli_real_escape_string($conn, $_POST['uzip']);
$uistatus = "0";


$sqls = "SELECT * FROM student WHERE umail = '$umail'";
$sqlt = "SELECT * FROM tutor WHERE temail = '$umail'";

$results = $conn->query($sqls);
$resultt = $conn->query($sqlt);
if ($results->num_rows > 0 || $resultt->num_rows > 0)
	{
		?>
		<script type="text/javascript">
		alert("Sorry email already have been used");
		window.location='signup(student).php';
		</script>
		<?php
	}else{
	
$sql = "INSERT INTO student (uname,umail,udob,ugender,upass,uaddress,ustreet,ustate,ucity,uzip,uistatus) VALUES ('$uname','$umail','$udob','$ugender','$upass','$uaddress','$ustreet','$ustate','$ucity','$uzip','$uistatus')";
	
if ($conn->query($sql) === TRUE)
{
?>
	
		<script type="text/javascript">
		alert("Registration Succesful,");
		window.location='index.php';
		</script>
		
<?php
}
else{
	echo"error";
}
}
?>
