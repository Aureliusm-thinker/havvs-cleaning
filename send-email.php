<?php
$name=$_POST["first name"];
$name=$_POST["last name"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$address=$_POST["address"];
$rooms=$_POST["rooms"];
$service=$_POST["service"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail= new PHPMailer(true);

$mail->isSMTP();
$mail->SMTPAuth=true;
$mail->Host="smtp.gmail.com"
$mail->SMTPSecure= PHPMailer::ENCRYPTION_STARTTLS;
$mail->port=587

 $mail->username="you@example.com"
 $mail->password="password"

 $mail->setFrom($email, $name);
 $mail->addAddress("aureliusm453@gmail.com", "Aurelius");

 $mail->Name=$name;
 $mail->Phone=$phone;

 $mail->send();

 echo"email sent";



