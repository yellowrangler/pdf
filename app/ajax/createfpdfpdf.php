<?php
// print_r ($_POST);
$filenameinput = "files/uploads/".$_POST['filename']; 
$filenameoutput = "files/pdfs/".$_POST['filecreate'].".pdf";

// pdf stuff
require('../libraries/fpdf/fpdf.php');

$pdf = new FPDF();

include($filenameinput);

$pdf->Output($filenameoutput);

echo  $filenameoutput;
?>