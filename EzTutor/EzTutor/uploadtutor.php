<?php
session_start();
require_once("php/dbconfig.php");

$id = $_SESSION['userid'];

if (isset($_POST['submit'])) {
	$file = $_FILES['file'];
	
	$fileName = $file['name'];
	$fileTmpName = $file['tmp_name'];
	$fileSize = $file['size'];
	$fileError = $file['error'];
	$fileType = $file['type'];
	
	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));
	
	$allowed = array('jpg', 'jpeg', 'png');
	
	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0){
			if ($fileSize < 5000000){
				$fileNameNew = "profiletutor".$id.".".$fileActualExt;
				$fileDestination = 'uploads/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				$sqlp = "UPDATE tutor SET tistatus=1 WHERE tID='$id';";
				$resultp = mysqli_query($conn, $sqlp);
				header("Location: std.php");
			}else{
				echo "YOur file is too big!";
			}
		}else{
			echo "There was an error uploading your file!";
		}
	}else{
		echo "You cant upload files of this type!";
	}
	
}