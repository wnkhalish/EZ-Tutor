<?php
require_once("../php/dbconfig.php");
require_once("../admin/authadmin.php");

$id = mysqli_real_escape_string($conn,$_GET['id']);

$sql = "DELETE FROM tutor WHERE tID ='$id'";

if ($conn->query($sql) === TRUE)
	{
		header('Location: admintutor.php');
	}
else
	{
		echo"error";
	}

?>