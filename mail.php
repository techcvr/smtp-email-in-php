<?php
include 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host     = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'your@mail.com';
$mail->Password = 'emailpassword';
$mail->SMTPSecure = 'tls';
$mail->Port     = 587;

$mail->setFrom('your@mail.com', 'Your Name');
$mail->addReplyTo($email, $name);
$mail->addAddress($to);
$mail->Subject = $title;
$mail->isHTML(true);
$mail->Body = $final_content;

if(!$mail->send()){
	?><script>Swal.fire("Message could not be sent.");</script> <?php
}else{
	?><script>Swal.fire("Message Sent Successfully!");</script> <?php
}
?>
