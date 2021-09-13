<?php

require_once("php/dbconfig.php");
	
	
$tname = mysqli_real_escape_string($conn, $_POST['tname']);
$temail = mysqli_real_escape_string($conn, $_POST['temail']);
$tdob = mysqli_real_escape_string($conn, $_POST['tdob']);
$tgender = mysqli_real_escape_string($conn, $_POST['tgender']);
$tpass = mysqli_real_escape_string($conn, $_POST['tpass']);
$tqualification = mysqli_real_escape_string($conn, $_POST['tqualification']);
$ttype = mysqli_real_escape_string($conn, $_POST['ttype']);
$tprogramme = mysqli_real_escape_string($conn, $_POST['tprogramme']);
$tcgpa = mysqli_real_escape_string($conn, $_POST['tcgpa']);
$tstate = mysqli_real_escape_string($conn, $_POST['tstate']);
$tcity = mysqli_real_escape_string($conn, $_POST['tcity']);
$tpackage = mysqli_real_escape_string($conn, $_POST['tpackage']);
$tistatus = "0";
$taveragerating = "0";
$ttotalrating = "0";
$tamountrating = "0";


$sqls = "SELECT * FROM student WHERE umail = '$temail'";
$sqlt = "SELECT * FROM tutor WHERE temail = '$temail'";

$results = $conn->query($sqls);
$resultt = $conn->query($sqlt);
if ($results->num_rows > 0 || $resultt->num_rows > 0)
	{
		?>
		<script type="text/javascript">
		alert("Sorry email already have been used");
		window.location='signup(tutor).php';
		</script>
		<?php
	}else{
	
$sql = "INSERT INTO tutor (tname,temail,tdob,tgender,tpass,tqualification,ttype,tprogramme,tcgpa,tstate,tcity,tpackage,tistatus,taveragerating,ttotalrating,tamountrating) VALUES ('$tname','$temail','$tdob','$tgender','$tpass','$tqualification','$ttype','$tprogramme','$tcgpa','$tstate','$tcity','$tpackage','$tistatus','$taveragerating','$ttotalrating','$tamountrating')";
	
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
