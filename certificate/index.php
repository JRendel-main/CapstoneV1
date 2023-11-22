<?php
require('fpdf186_2/fpdf.php');

// Set the recipient's name and achievement type
$name = 'John Doe';
$achievement = 'Outstanding Performance';
$type = 'Certificate of Recognition';
$message = 'This certificate is presented as a token of appreciation for their hard work and dedication.';

// Background and logo paths
$certificateBackground = 'background.jpg';
$logo = 'logo.png';
$neust = 'neust.png';

// Generate e-certificate, preview landscape it center all text and logo
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();

$pdf->Image($certificateBackground, 0, 0, 297, 210, 'JPG');

// Place the logo on the left side
$pdf->Image($logo, 30, 130, 90, 50, 'PNG');

// Place the NEUST logo on the right side
$pdf->Image($neust, 220, 130, 50, 50, 'PNG');

$pdf->SetFont('Times', 'B', 28); // Increased font size
$pdf->Cell(0, 50, $type, 0, 1, 'C'); // Centered, line break

$pdf->SetFont('Times', '', 20); // Increased font size
$pdf->Cell(0, 10, 'This certificate is proudly awarded to', 0, 1, 'C'); // Centered, line break

$pdf->SetFont('Times', 'B', 30); // Increased font size
$pdf->Cell(0, 10, $name, 0, 1, 'C'); // Centered, line break

$pdf->SetFont('Times', '', 16); // Increased font size
$pdf->Cell(0, 10, 'in recognition of their outstanding achievement in', 0, 1, 'C'); // Centered, line break

$pdf->SetFont('Times', 'B', 16); // Increased font size
$pdf->Cell(0, 10, $achievement, 0, 1, 'C'); // Centered, line break

$pdf->SetFont('Times', '', 14); // Increased font size
$pdf->Cell(0, 10, $message, 0, 1, 'C'); // Centered, line break

$pdf->Output('certificate.pdf', 'F');

header('Location: certificate.pdf');
?>
