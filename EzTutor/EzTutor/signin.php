<?php	
session_start();
require_once("php/dbconfig.php");

	 
$lmail = mysqli_real_escape_string($conn,$_POST['lmail']);
$lpass = mysqli_real_escape_string($conn,$_POST['lpass']);

$sqlstudent = "SELECT * FROM student WHERE upass = '$lpass' AND umail = '$lmail'";
$sqltutor = "SELECT * FROM tutor WHERE tpass = '$lpass' AND temail = '$lmail'";
$sqladmin = "SELECT * FROM admin WHERE apass = '$lpass' AND amail = '$lmail'";

$resultstudent = mysqli_query($conn, $sqlstudent);
$resulttutor = mysqli_query($conn, $sqltutor);
$resultadmin = mysqli_query($conn, $sqladmin);

if (mysqli_num_rows($resultstudent) > 0)  //if student existed
{
			if($row = $resultstudent->fetch_assoc()) 
			{
				$_SESSION['userid'] = $row['uID'];
				$_SESSION['role'] = "student";
				$conn->close();	
				header('Location: index.php');
			}else{
					?>
					<script type="text/javascript">
					alert("Invalid");
					window.location='login.php';
					</script>
					<?php
			}
}

elseif (mysqli_num_rows($resulttutor) > 0)  //if tutor existed
{
			if($row = $resulttutor->fetch_assoc()) 
			{
				$_SESSION['userid'] = $row['tID'];
				$_SESSION['role'] = "tutor";
				$conn->close();	
				header('Location: index.php');
			}else{
					?>
					<script type="text/javascript">
					alert("Invalid");
					window.location='login.php';
					</script>
					<?php
			}
}
elseif (mysqli_num_rows($resultadmin) > 0)  //if admin existed
{
			if($row = $resultadmin->fetch_assoc()) 
			{
				$_SESSION['userid'] = $row['aID'];
				$_SESSION['role'] = "admin";
				$conn->close();	
				header('Location: admin/adminhome.php');
			}else{
					?>
					<script type="text/javascript">
					alert("Invalid");
					window.location='login.php';
					</script>
					<?php
			}
}
	
else //if user not exist then create user
{	
	?>
		<script type="text/javascript">
		alert("Invalid Login");
		window.location='login.php';
		</script>
		<?php
}

?>

