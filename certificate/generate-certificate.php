<?php
require('fpdf186_2/fpdf.php');
include_once '../../send-certificate.php';

function generateCertificate($type, $name, $achievement, $message, $certificateBackground, $logo, $neust, $signature, $email){
    // Generate e-certificate, preview landscape it center all text and logo
    $pdf = new FPDF('L', 'mm', 'A4');
    $pdf->AddPage();

    $pdf->Image($certificateBackground, 0, 0, 297, 210, 'JPG');

    // Place the logo on the left side
    $pdf->Image($signature, 30, 130, 70, 50, 'PNG');

    // Place the signature logo on the right side
    $pdf->Image($logo, 175, 130, 90, 40, 'PNG');

    $pdf->SetFont('Times', 'B', 28); // Increased font size
    $pdf->Cell(0, 50, $type, 0, 1, 'C'); // Centered, line break

    $pdf->SetFont('Times', '', 20); // Increased font size
    $pdf->Cell(0, 10, 'This is to certify that', 0, 1, 'C'); // Centered, line break

    $pdf->SetFont('Times', 'B', 30); // Increased font size
    $pdf->Cell(0, 10, $name, 0, 1, 'C'); // Centered, line break

    $pdf->SetFont('Times', '', 16); // Increased font size
    $pdf->Cell(0, 10, 'Has achieved the rank of', 0, 1, 'C'); // Centered, line break

    $pdf->SetFont('Times', 'B', 16); // Increased font size
    $pdf->Cell(0, 10, $achievement, 0, 1, 'C'); // Centered, line break

    $pdf->SetFont('Times', '', 14); // Increased font size
    $pdf->Cell(0, 10, $message, 0, 1, 'C'); // Centered, line break

    $pdf->Output('certificate.pdf', 'F');

    // Save to folder named after the user; if there is no folder, make one
    $folder = 'certificates/'.$name;
    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
    }

    // Move the file to the folder and change the name of the certificate based on achievement
    rename('certificate.pdf', $folder.'/'.$achievement.'.pdf');

    // send the certificate to the user's email
    $to = $email;
    $subject = 'Certificate of Achievement';
    $body = 'Congratulations! You have achieved the rank of '.$achievement.'. Please see the attached file.';
    $attachment = $folder.'/'.$achievement.'.pdf';
    sendEmail($to, $subject, $body, $attachment);

    // Return the path of the certificate
    return $folder.'/certificate.pdf';
}
?>
