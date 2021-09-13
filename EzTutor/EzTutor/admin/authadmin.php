<?php 
session_start();
if (!isset($_SESSION['userid']) or !isset($_SESSION['role'])) {
	session_destroy();
header('Location: /index.php');
exit();
} elseif($_SESSION['role']!="admin") {
	session_destroy();
	header('Location: /index.php');
	exit();
}

?>