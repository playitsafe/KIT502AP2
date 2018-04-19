<?php
//require 'phpmailer/PHPMailerAutoload.php';
include_once "phpmailer/class.phpmailer.php";
include_once "phpmailer/class.smtp.php";

$mail = new PHPMailer();
$mail->SMTPDebug = 2;

$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPKeepAlive=true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.qq.com";
$mail->Port = 465;

$mail->Username = '137912334@qq.com';
$mail->Password = 'wahtevcxypgdbgbg';
$mail->FromName="Aaron";
$mail->Subject = "New Test on Debug";
$mail->AltBody= "body";
$mail->WordWrap=50; // set word wrap
$mail->MsgHTML("body");
$mail->AddReplyTo("137912334@qq.com","Aaron");
$mail->AddAddress("1147057024@qq.com","hello");
$mail->IsHTML(true);

$mail->setFrom("137912334@qq.com", "KIT502Assignment");


$mail->Subject = "Test on alacritas";
//$mail->Body = "this is some body";


if(!$mail->Send()){
echo "Mailer Error:".$mail->ErrorInfo;
}else{
echo "Message has been sent";
}
?>