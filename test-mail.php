<?php 
require_once 'send-email.php';

// Define email parameters
$to = 'johnrendel87@gmail.com'; // Replace with the recipient's email address
$subject = 'Notification Subject';
$type = 'Notification Type';
$message = 'This is the notification message.';

// Call the sendEmail function to send the email
sendEmail($to, $subject, $type, $message);