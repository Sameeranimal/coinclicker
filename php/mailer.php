<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require  "../vendor/autoload.php";

$mail = new PHPMailer(true);

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.example.com";
$mail->SMTPSecure = PHPMailer:: ENCRYPTION_STARTTLS;
$mail->Port = 587;
$mail->Username = "aaronverdoold770@gmail.com";
$mail->Password = "your-password";

$mail->isHtml(true); 

return $mail;

?>