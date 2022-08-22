<?php
include 'connection.php';
date_default_timezone_set('Asia/Kolkata');

if(isset($_POST['email'])){

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $number = trim($_POST['phone']);
    $message = trim($_POST['message']);
    $time = time();

    $sql = "INSERT INTO `me_landing_contact`(`name`, `email`, `phone`, `message`, `addedOn`) VALUES ('$name','$email','$number','$message','$time')";
    $sql_res = $mysqli->query($sql);

    if ($sql_res) {
        $to = "vishal@mindedgesolutions.com";
        $title = 'Contact Form Enquiry | MindEdge Solutions - Landing Page';

        $final_content = "Dear Admin,<br /><br />

        Please find details of the query : <br /><br />

        Name: ".$name."<br />
        Email: ".$email."<br />
        Mobile no: ".$number."<br />
        Message: ".$message."<br /><br />

        Thank You<br /><br />";


        include 'phpmailer/PHPMailerAutoload.php';

        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sumit@mindedgesolutions.com';
        $mail->Password = 'oyedafevyhbtcabe';
        $mail->SMTPSecure = 'tls';
        $mail->Port     = 587;

        $mail->setFrom('sumit@mindedgesolutions.com', 'MindEdge Solutions');
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
    }
}

?>
