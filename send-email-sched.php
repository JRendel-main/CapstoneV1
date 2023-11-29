<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendEmail($to, $subject, $type, $message, $topic, $datetime, $sender) {
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
        $mail->setFrom('officialnexuslink@gmail.com', 'PeerTutor Hub Platform');
        $mail->addAddress($to);
        $mail->addReplyTo('officialnexuslink@gmail.com', 'PeerTutor Hub Team');

        // Content
        $mail->Subject = $subject;
        $mail->Body    = '<!DOCTYPE html>
        <html>
        <head>
          <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
          <title>Notification</title>
          <style>
            /* Global Styles */
            body {
              background-color: #f6f6f6;
              font-family: Arial, sans-serif;
              -webkit-font-smoothing: antialiased;
              font-size: 16px;
              line-height: 1.6;
              margin: 0;
              padding: 0;
              -ms-text-size-adjust: 100%;
              -webkit-text-size-adjust: 100%;
            }
        
            /* Container Styles */
            .container {
              margin: 0 auto !important;
              max-width: 580px;
              padding: 20px;
            }
        
            /* Content Styles */
            .content {
              background: #ffffff;
              border-radius: 5px;
              padding: 20px;
            }
        
            /* Typography Styles */
            h1, h2, h3, h4 {
              color: #000000;
              font-family: Arial, sans-serif;
              font-weight: 400;
              margin: 0;
            }
        
            h1 {
              font-size: 32px;
              text-align: center;
              text-transform: capitalize;
            }
        
            p {
              margin: 0 0 20px 0;
            }

            /* Card Styles */
            .card {
              background-color: #f6f6f6;
              border-radius: 5px;
              padding: 15px;
              margin-top: 20px;
            }

            .card h4, .card p {
              margin: 0;
            }
        
            /* Button Styles */
            .btn {
              display: inline-block;
              text-decoration: none;
              background-color: #3498db;
              color: #ffffff;
              padding: 12px 25px;
              border-radius: 5px;
              font-size: 16px;
              font-weight: bold;
            }
        
            /* Footer Styles */
            .footer {
              margin-top: 20px;
              text-align: center;
              color: #999999;
              font-size: 12px;
            }
          </style>
        </head>
        <body>
          <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="container">
            <tr>
              <td>
                <!-- Start Main Content -->
                <div class="content">
        
                  <!-- Notification Message -->
                  <h1>Notification from PeerTutor Hub Platform</h1>
                  <p>Dear Peer,</p>
                  <p>This is to inform you about the following notification from PeerTutor Hub Platform:</p>
        
                  <!-- Notification Details -->
                  <h2>'.$type.':</h2>
                  <p>'.$message.'</p>

                  <!-- Topic Details and sender use card -->
                  <div class="card">
                    <div class="card-header">
                      <h4>'.$topic.' Schedule</h4>
                    </div>
                    <div class="card-body">
                      <p><strong>Date and Time:</strong> '.$datetime.'</p>
                      <p><strong>Sender:</strong> '.$sender.'</p>
                    </div>
                  </div>
                  
        
                  <!-- Call-to-Action Button -->
                  <a class="btn" href="localhost/CapstoneV1/login.php" target="_blank">View for more information</a>
        
                  <!-- Closing Message -->
                  <p>If you have any questions or need further assistance, please don\'t hesitate to contact us.</p>
                  <p>Thank you,</p>
                  <p>The PeerTutor Hub Team</p>
                </div>
                <!-- End Main Content -->
        
                <!-- Footer -->
                <!-- End Footer -->
        
              </td>
            </tr>
          </table>
        </body>
        </html>
        
        ';
        $mail->AltBody = $message;

        $mail->send();
    } catch (Exception $e) {
        // Handle exceptions
        
    }
}
?>
