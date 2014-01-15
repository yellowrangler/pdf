<?php
//location of input and output directory
$tiffdir = "tifffiles/";
$pdfdir = "";
$filename = $_POST['filename'];

$outputTiffFileName = $tiffdir.$filename.".tiff";
$outputTiffFileName2 = $tiffdir.$filename.".png";
$inputPDFFileName = $pdfdir.$filename.".pdf";
 
//ghost script command to run
// $cmd = "gs -SDEVICE=tiffg4 -r600x600 -sPAPERSIZE=letter -sOutputFile=$outputTiffFileName -dNOPAUSE -dBATCH  $inputPDFFileName";
$cmd = "gs -SDEVICE=tiffg4 -r600 -sPAPERSIZE=letter -sOutputFile=$outputTiffFileName -dNOPAUSE -dBATCH -dSAFER $inputPDFFileName";

//Execute the ghost script that takes the PDF as an input and coverts and saves the it in the data directory.
$response = shell_exec($cmd);

//ghost script command to run
$cmd = "gs -SDEVICE=png16m  -sOutputFile=$outputTiffFileName2 -dNOPAUSE -dBATCH -dSAFER $inputPDFFileName";
//Execute the ghost script that takes the PDF as an input and coverts and saves the it in the data directory.
$response = shell_exec($cmd);

echo $outputTiffFileName2;
?>