<?php
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = "108.177.125.108";
$mail->SMTPSecure = "ssl";
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = 'vanilla.utas@gmail.com';
$mail->Password = 'dlmm111111';

$mail->setFrom("vanilla.utas@gmail.com", "KIT502Assignment");
$mail->addAddress("playitsafe@qq.com");
$mail->Subject = "Test on alacritas";
$mail->Body = "this is some body";

if ($mail->send())
    echo "Mail sent";
else
	echo "Mailer Error: ".$mail->ErrorInfo;
?>