<?php

require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->Host='smtp.gmail.com';
$mail->Port=587;
$mail->SMTPAuth=true;
$mail->SMTPSecure='tls';

$mail->Username='hunterrexxar0004@gmail.com';
$mail->Password='@ggwp1996';

$a='azamrafiee1996@gmail.com';

$mail->setFrom('hunterrexxar0004@gmail.com','EZ Tutor');
$mail->addAddress($a);
$mail->addReplyTo('hunterrexxar0004@gmail.com');

$b='ok asfsaasfaasfsafasfasfsa';

$mail->isHTML(true);
$mail->Subject='Test ajo';
$mail->Body=$b;

if(!$mail->send()){
	echo "tak ok";
}else{
	echo "ok";
}

?>
