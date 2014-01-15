<?php

ob_start();
?>

<page>
    <page_header> 
       <h1>This is a page header</h1>           
    </page_header> 
    <br><br><br><br>
	  <h2>Exemple d'utilisation</h2>
    <br>
    <div class="zone" style="height: 40mm;vertical-align: middle;text-align: center;">
        <qrcode value="doug is a malooka" ec="Q" style="width: 37mm; border: none;" ></qrcode>
    </div>
    <br><br>
    <!-- <div class="zone" style="height: 20mm;vertical-align: middle;text-align: center;">
    <barcode type="C39" value="TEST8052" style="color: #770000" ></barcode>
    </div>
    <br><br> -->
   <!--  <barcode type="C128B" value="doug is a mooluka" style="color: blue" ></barcode>
    <br><br> -->
    <!-- <barcode type="UPCA" value="01234567890" style="color: #770000" ></barcode> -->
    <br><br>

    Ceci est un <b>exemple d'utilisation</b>
    de <a href='http://html2pdf.en/'>HTML2PDF</a>.<br>

    
    <page_footer> 
       This is a page footer
    </page_footer> 
</page>
<?php

$content = ob_get_clean();

require_once(dirname(__FILE__).'/html2pdf_v4.03/html2pdf.class.php');
$html2pdf = new HTML2PDF('P','A4','en');
$html2pdf->pdf->SetDisplayMode('fullpage');
$html2pdf->WriteHTML($content);
$html2pdf->Output('testh2p.pdf', 'F');

echo  "testh2p.pdf";
?>