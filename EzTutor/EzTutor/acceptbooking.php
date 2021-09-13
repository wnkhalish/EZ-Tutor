<?php
require_once("php/dbconfig.php");
require 'phpmailer/PHPMailerAutoload.php';

$bID = mysqli_real_escape_string($conn,$_GET['bID']);
$uID = mysqli_real_escape_string($conn,$_GET['uID']);

$sqla = "UPDATE booking SET bstatus='2' WHERE bID='$bID'";
$resulta = $conn->query($sqla);

$sqlb = "SELECT * FROM student WHERE uID ='$uID'";
$result = $conn->query($sqlb);
while ($rs = $result->fetch_assoc()){
	$umail=$rs['umail'];
	$uname=$rs['uname'];
}

$sqlc = "SELECT * FROM booking, level, subject WHERE booking.lID = level.lID AND booking.sID = subject.sID HAVING booking.bID ='$bID'";
$result = $conn->query($sqlc);
while ($rz = $result->fetch_assoc()){
	$sname=$rz['sname'];
	$lname=$rz['lname'];
}

$mail = new PHPMailer;

$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPDebug  = 1;
$mail->Host='smtp.gmail.com';
$mail->Port=587;
$mail->SMTPAuth=true;
$mail->SMTPSecure='tls';

$mail->Username='hunterrexxar0004@gmail.com';
$mail->Password='@ggwp1996';

$mail->setFrom('hunterrexxar0004@gmail.com','EZ Tutor');
$mail->addAddress($umail);
$mail->addReplyTo('hunterrexxar0004@gmail.com');

$mail->isHTML(true);
$mail->Subject="Booking for " . $sname . " (" . $lname .") " . " successful";
$mail->Body="Hello, " . $uname . "! <br>Your subject booking has been accepted!" ;

if(!$mail->send()){
	echo "tak ok";
}else{
	header('Location: aboutTutor.php');
}
?>
