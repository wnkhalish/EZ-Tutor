<?php
if (session_status() == PHP_SESSION_NONE){
	session_start();
}
?>

<html lang="en">
<head>
  <title>EZ Tutor</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link href="../assets/assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  
</head>

<body>

<nav class="navbar navbar-inverse  navbar-static-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<a a href="../admin/adminhome.php" class="navbar-brand">ADMIN</a>
		</div>
		<ul class="nav navbar-nav">
			<li class=""><a href="../admin/adminhome.php">          </a></li>
			<li class="active"><a href="../admin/adminstudent.php">Student</a></li>
			<li class="active"><a href="../admin/admintutor.php">Tutor</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li class="active"><a href="../admin/adminlogout.php"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>
		</ul>
	</div>
</nav>
