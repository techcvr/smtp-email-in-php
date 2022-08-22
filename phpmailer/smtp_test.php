<?php
include '../phpmailer/PHPMailerAutoload.php';
$final_content = "This is a test mail";
$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = 'SMTP.Gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'noreply@rotaryteach.org';
$mail->Password = 'dks@2022';
$mail->Port = 465;

$mail->From = 'donation@rotaryteach.org';
$mail->FromName = 'RILM Activation Link';
$mail->addAddress('sknasir@mindedgesolutions.com');
$mail->addReplyTo('noreply@rotaryteach.org', '');
$mail->addBCC('donation@rotaryteach.org');

$mail->WordWrap = 50;
$mail->isHTML(true);

$mail->Subject = 'Project Swabhiman activation link';
$mail->Body    = $final_content;
$mail->AltBody = $final_content;

if($mail->send()) {
	echo 'Message sent.';
} else {
	echo 'Message could not be sent.';
	echo 'Mailer Error: ' . $mail->ErrorInfo;
}
?>