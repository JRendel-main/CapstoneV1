<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendEmail($to, $subject, $body, $attachment)
{
    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host       = 'smtp.gmail.com';
        $mail->Port       = 587;
        $mail->Username   = 'officialnexuslink@gmail.com';
        $mail->Password   = 'ypqsfuzaqdgwndjx';
        $mail->isHTML(true);

        // Recipients
        $mail->setFrom('officialnexuslink@gmail.com', 'Hanap Ka Peer Official');
        $mail->addAddress($to);
        $mail->addReplyTo('officialnexuslink@gmail.com', 'Hanap Ka Peer');

        // Content
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->addAttachment($attachment);

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
