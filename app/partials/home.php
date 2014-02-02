<div class="row" style="padding-top:5px;">
<div class="col-lg-12">
<div class="section-article">
<h3 class="bodyFont">PDF Select Function</h3>
</div> <!-- end of section-article -->
</div> <!-- end of col-lg-12 -->
</div> <!-- end of row -->

<div class="row" style="padding-top:30px;font-weight:500;" >
  <div class="col-lg-4">
  <table width="100%">
    <tr style="height:30px;" ng-repeat="sysfunc in sysfuncs">
      <td align="left">
        <a id="{{sysfunc.id}}" ng-click="loadPartial(sysfunc)" style="width:225px;font-size:12px;margin-left:30px;" data-toggle="tooltip" data-placement="right" title="{{sysfunc.help}}" name="funcbutton" ng-href="" class="tips btn {{sysfunc.boostrapbutton}} btn-sm big-buttons">{{sysfunc.title}}</a>
      </td>
    </tr>
  </table>
  </div><!-- end of col-lg-4 -->

  <div class="col-lg-8">
    <div id="infoarea">
      <div ng-repeat="pdfinfo in pdfinfolist" id="{{pdfinfo.prefix}}-area" style="display:none;" class="container">
          <div class="row">
            <div class="col-lg-12">
            <div name="loadtitlearea">
            <span class="loadTitle">{{pdfinfo.title}}</span>
            </div><!-- end of loadtitlearea -->
            </div><!-- end of col-lg-12 -->
        </div><!-- end of row -->

        <div class="row" style="padding-top:20px;">
          <div class="col-lg-12">
          <div class="panel">
            <form name="{{pdfinfo.prefix}}-form" id="{{pdfinfo.prefix}}-form" enctype="multipart/form-data">
            <div style="color:green;font-size:12px;" name="formdatafromfilename">
            <table>
              <tr>
                <td>File Name to upload</td>
                <td>&nbsp;</td>
                <td><input style="" type="file" id="{{prefix}}-filename" name="filename"></td>
              </tr>
            </table>  
            </div>
            <div style="padding-top:15px;color:green;font-size:12px;" name="formdatatofilename">
            <table>
              <tr>
                <td>File Name to create</td>
                <td>&nbsp;</td>
                <td><input style="" type="text" id="{{pdfinfo.prefix}}-filecreate" name="filecreate"></td>
              </tr>
            </table>  
            </div>
            <div style="padding-top:15px;color:green;font-size:12px;" name="formdatafilename">
            Do you want created file opened in seperate window?
            <yes-no-list-display 
                nameid="popupwindow" prefix="{{pdfinfo.prefix}}" yesnolist="yesnoList">
            </yes-no-list-display> 
            </div>
            <div style="padding-top:15px;color:green;font-size:12px;" name="formdatafilename">
            Do you want link to created file displayed?
            <yes-no-list-display 
                nameid="popuplink" prefix="{{pdfinfo.prefix}}" yesnolist="yesnoList">
            </yes-no-list-display> 
            </div>
            <input style="" type="hidden" id="{{pdfinfo.prefix}}-filename-hidden" name="filename" value="">
            </form>
            <div id="{{pdfinfo.prefix}}-showlink" style="display:none;padding-top:15px;color:green;font-size:12px;">
            </div>
          </div><!-- end of panel -->

          <div id="{{pdfinfo.prefix}}-progress-area" style="visibility:hidden;" class="progress">
            <div id="{{pdfinfo.prefix}}-progress" class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
            </div>
          </div>

          <div id="{{pdfinfo.prefix}}-process" style="float:right;padding-top:30px;padding-right:15px;">
          <button ng-click="pdfAction(pdfinfo.prefix)" type="button" class="btn btn-primary btn-xs">Process</button>
          </div><!-- end of {{pdfinfo.prefix}}-process -->
          </div><!-- end of col-lg-12 -->
        </div><!-- end of row -->
      </div><!-- end of container -->      

      <div ng-repeat="barcodeinfo in barcodeinfolist" id="{{barcodeinfo.prefix}}-area" style="display:none;" class="container">
          <div class="row">
            <div class="col-lg-12">
            <div name="loadtitlearea">
            <span class="loadTitle">{{barcodeinfo.title}}</span>
            </div><!-- end of loadtitlearea -->
            </div><!-- end of col-lg-12 -->
        </div><!-- end of row -->

        <div class="row" style="padding-top:20px;">
          <div class="col-lg-12">
          <div class="panel">
            <form name="{{barcodeinfo.prefix}}-form" id="{{barcodeinfo.prefix}}-form">
            <div style="color:green;font-size:12px;" name="formdatafromfilename">
            Barcode to Create &nbsp;
            <barcode-list-display 
                nameid="barcodeselect" prefix="{{barcodeinfo.prefix}}" barcodelist="barcodeList">
            </barcode-list-display>  
            </div>
            <div style="padding-top:15px;color:green;font-size:12px;" name="barcodevalue">
            Barcode value &nbsp;
            <input type="text" name="barcodevalue" id="{{barcodeinfo.prefix}}-barcode-value" value=""> 
            </div>
            <div style="padding-top:15px;color:green;font-size:12px;" name="formdatatofilename">
            <table>
              <tr>
                <td>File Name to create</td>
                <td>&nbsp;</td>
                <td><input style="" type="text" id="{{barcodeinfo.prefix}}-filecreate" name="filecreate"></td>
              </tr>
            </table>  
            </div>
            <div style="padding-top:15px;color:green;font-size:12px;" name="formdatafilename">
            Do you want created file opened in seperate window?
            <yes-no-list-display 
                nameid="popupwindow" prefix="{{barcodeinfo.prefix}}" yesnolist="yesnoList">
            </yes-no-list-display>  
            </div>
            <div style="padding-top:15px;color:green;font-size:12px;" name="formdatafilename">
            Do you want link to created file displayed?
            <yes-no-list-display 
                nameid="popuplink" prefix="{{barcodeinfo.prefix}}" yesnolist="yesnoList">
            </yes-no-list-display>  
            </div>
            <input style="" type="hidden" id="{{barcodeinfo.prefix}}-template-hidden" name="template" value="">
            </form>
            <div id="{{barcodeinfo.prefix}}-showlink" style="display:none;padding-top:15px;color:green;font-size:12px;">
            </div>
          </div><!-- end of panel -->

          <div id="{{barcodeinfo.prefix}}-progress-area" style="visibility:hidden;" class="progress">
            <div id="{{barcodeinfo.prefix}}-progress" class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
            </div>
          </div>

          <div id="{{barcodeinfo.prefix}}-process" style="float:right;padding-top:30px;padding-right:15px;">
          <button ng-click="barcodeAction(barcodeinfo.prefix)" type="button" class="btn btn-primary btn-xs">Process</button>
          </div><!-- end of {{barcodeinfo.prefix}}-process -->
          </div><!-- end of col-lg-12 -->
        </div><!-- end of row -->
      </div><!-- end of container -->      
    
    </div><!-- end of infoarea -->
  </div><!-- end of col-lg-8 -->

</div> <!-- end of row -->

<div style="padding-bottom:50px;">&nbsp;</div>