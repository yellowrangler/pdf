<?php
// print_r ($_POST);
$filenametempleate = "files/uploads/".$_POST['filename']; 
$filenameoutput = "files/pdfs/".$_POST['filecreate'].".pdf";

ob_start();
?>

<?php include($filenametempleate); ?>

<?php

$content = ob_get_clean();

// require_once(dirname(__FILE__).'../libraries/html2pdf/html2pdf.class.php');
require_once('../libraries/html2pdf/html2pdf.class.php');

$html2pdf = new HTML2PDF('P','A4','en');
$html2pdf->pdf->SetDisplayMode('fullpage');
$html2pdf->WriteHTML($content);
$html2pdf->Output($filenameoutput, 'F');

echo  $filenameoutput;
?>