<?php
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer();
$mail->SMTPDebug = 1;

$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Host = "smtp.qq.com";
$mail->Username = '137912334@qq.com';
$mail->Password = 'wahtevcxypgdbgbg';
$mail->SMTPSecure = "ssl";
$mail->Port = 465;
$mail->CharSet = 'UTF-8';
$mail->setFrom("137912334@qq.com", "KIT502Assignment");
$mail->addAddress("1147057024@qq.com");
$mail->isHTML(true); 
$mail->Subject = "Test on alacritas";
$mail->Body = "this is some body";

if ($mail->send())
    echo "Mail sent";
else
	echo "Mailer Error: ".$mail->ErrorInfo;


?>