<?php 

require_once('../../send-certificate.php');

// get the email
$email = $_POST['email'];
$tutor_name = $_POST['tutor_name'];

// send the email send the pdf file
$subject = 'Certificate of Recoginition';
$body = 'Dear ' . $tutor_name . ',<br><br>
        Congratulations! You have been awarded a certificate of recognition for your hard work and dedication in helping students learn.<br><br>
        Thank you for being a part of our team.<br><br>
        Sincerely,<br>
        TutorMe Team';
$attachment = '../certificates/' . $tutor_name . '.pdf';

sendEmail($email, $subject, $body, $attachment);



