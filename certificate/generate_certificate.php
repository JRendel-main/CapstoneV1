<?php

require 'fpdf186_2/fpdf.php';

use FPDF\FPDF;

$name = $_POST['name'];
$achievement = $_POST['achievement'];

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(400, 50, 'Certificate of Achievement', 0, 0, 'C');

$pdf->SetFont('Arial', '', 16);
$pdf->Cell(400, 80, 'This certificate is awarded to', 0, 0, 'C');

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(400, 110, $name, 0, 0, 'C');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(400, 140, 'in recognition of their outstanding achievement in', 0, 0, 'C');

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(400, 170, $achievement, 0, 0, 'C');

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(400, 200, 'This certificate is presented as a token of appreciation for their hard work and dedication.', 0, 0, 'C');

$pdf->Output('certificate.pdf', 'F');

header('Location: certificate.pdf');
