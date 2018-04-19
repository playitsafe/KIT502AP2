<?php
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = "tls";
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'vanilla.utas@gmail.com';
$mail->Password = 'dlmm111111';

$mail->setFrom("vanilla.utas@gmail.com", "KIT502Assignment");
$mail->addAddress("playitsafe@qq.com");
$mail->Subject = "SMTP email test";
$mail->Body = "this is some body";

if ($mail->send())
    echo "Mail sent";
?>