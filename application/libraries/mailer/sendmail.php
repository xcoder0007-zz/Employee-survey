<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'srmail.sunrise-resorts.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'marwan.gendy@sunrise-resorts.com';                 // SMTP username
$mail->Password = '';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->From = 'marwan.gendy@sunrise-resorts.com';
$mail->FromName = 'Marwan elGendy';
$mail->addAddress('mohamed.fouad@sunrise-resorts.com', 'Mohamed Foua');     // Add a recipient
$mail->addReplyTo('marwan.gendy@sunrise-resorts.com', 'Marwan elGendy');
$mail->addCC('marwan.gendy@sunrise-resorts.com');
$mail->addBCC('marwan.gendy@sunrise-resorts.com');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'mail from a PHP script';
$mail->Body    = 'This message was sent from <b>PHP Script!</b>';
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}