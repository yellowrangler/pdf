<?php

$filenametempleate = "files/templates/".$_POST['template']; 
$filenameoutput = "files/pdfs/".$_POST['filecreate'].".pdf";

$barcodetype=$_POST['barcodeselect'];
$barcodevalue=$_POST['barcodevalue'];
if ($barcodetype == "QR") 
{
    $barcodeinstructions = '<qrcode value="'.$barcodevalue.'" ec="Q" style="width: 37mm; border: none;" ></qrcode>';
}
else if ($barcodetype == "C128B")
{
     $barcodeinstructions = '<barcode type="C128B" value="'.$barcodevalue.'" style="color: blue" ></barcode>';
}

ob_start();

include $filenametempleate;

$content = ob_get_clean();

// require_once(dirname(__FILE__).'../libraries/html2pdf/html2pdf.class.php');
require_once('../libraries/html2pdf/html2pdf.class.php');

$html2pdf = new HTML2PDF('P','A4','en');
$html2pdf->pdf->SetDisplayMode('fullpage');
$html2pdf->WriteHTML($content);
$html2pdf->Output($filenameoutput, 'F');

echo  $filenameoutput;
?>