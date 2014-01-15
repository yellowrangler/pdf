<style type="text/css">
.tableborders  {
    border: 1px solid grey;
    padding:12px;
}
</style>

<page>

<page_header> 
<h1 style="text-align:center;">Health Allianze Barcode Generation PDF</h1>           
</page_header> 

<div id="container" style="margin:25px;">

<div style="padding-top:75px;">
<h2>Bar Codes</h2>
</div>

<div style="margin-left:35px;" id="barcode-area">
<table style="padding-top:15px;font-size:24px;" width="100%">
    <tr><td align="right">Barcode Type:</td><td style="color:salmon;" ><?php print $barcodetype; ?> </td></tr>
    <tr><td align="right">Barcode Value:</td><td style="color:salmon;" ><?php print $barcodevalue; ?> </td></tr>
</table>
 
 <table style="padding-top:5px;" width="100%">
    <tr><td style="font-size:24px;" align="right">Rendered Barcode:</td>
        <td>
            <div class="zone" style="height: 40mm;vertical-align: middle;text-align: center;">
                <?php print $barcodeinstructions; ?>
            </div>    
        </td>
    </tr>
</table>
</div> <!-- end of barcode-area -->

</div> <!-- end of container -->

<page_footer> å
Health Allianze LLC
</page_footer> 

</page>