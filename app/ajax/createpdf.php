<?php

require('fpdf17/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
// $pdf->Cell(40,10,'Hello World!');
$str = 'Definition and Usage The method to close the window.';
$pdf->Text(10,10,$str);

$str = ' Browser Support major browser.';
$pdf->Text(10,20,$str);

$pdf->Output("testfile.pdf");

echo  "testfile.pdf";
?>