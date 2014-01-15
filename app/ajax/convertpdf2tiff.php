<?php
//location of input and output directory
$filenameinput = "files/uploads/".$_POST['filename']; 
$filenameoutput_tiff = "files/tiffs/".$_POST['filecreate'].".tiff";
$filenameoutput_png = "files/tiffs/".$_POST['filecreate'].".png";
 
//ghost script command to create tiff
$cmd = "gs -SDEVICE=tiffg4 -r600 -sPAPERSIZE=letter -sOutputFile=$filenameoutput_tiff -dNOPAUSE -dBATCH -dSAFER $filenameinput";

//Execute the ghost script that takes the PDF as an input and coverts and saves the it in the data directory.
$response = shell_exec($cmd);

//ghost script command to create png for display
$cmd = "gs -SDEVICE=png16m  -sOutputFile=$filenameoutput_png -dNOPAUSE -dBATCH -dSAFER $filenameinput";

//Execute the ghost script that takes the PDF as an input and coverts and saves the it in the data directory.
$response = shell_exec($cmd);

echo $filenameoutput_tiff.",".$filenameoutput_png;
?>