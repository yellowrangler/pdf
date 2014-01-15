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
        <a id="{{sysfunc.id}}" ng-click="loadPartial(sysfunc)" style="width:225px;font-size:12px;margin-left:30px;" data-toggle="tooltip" data-placement="right" title="{{sysfunc.help}}" name="funcbutton" href="" class="tips btn {{sysfunc.boostrapbutton}} btn-sm big-buttons">{{sysfunc.title}}</a>
      </td>
    </tr>
  </table>
  </div><!-- end of col-lg-4 -->

  <div class="col-lg-8">
    <div id="infoarea">
      
      <div id="createfpdfpdf-area" style="display:none;" class="container">
        <div class="row">
          <div class="col-lg-12">
          <div name="loadtitlearea">
          <span class="loadTitle">Create PDF using FPDF Library</span>
          </div><!-- end of loadtitlearea -->
          </div><!-- end of col-lg-12 -->
        </div><!-- end of row -->

        <div class="row" style="padding-top:20px;">
          <div class="col-lg-12">
          <div class="panel">
          <form name="createfpdfpdf-form" id="createfpdfpdf-form" enctype="multipart/form-data">
          <div style="color:green;font-size:12px;" name="formdatafromfilename">
          <table>
            <tr>
              <td>File Name to convert</td>
              <td>&nbsp;</td>
              <td><input style="" type="file" id="createfpdfpdf-filename" name="filename"></td>
            </tr>
          </table>  
          </div>
          <div style="padding-top:15px;color:green;font-size:12px;" name="formdatatofilename">
          <table>
            <tr>
              <td>PDF File Name</td>
              <td>&nbsp;</td>
              <td><input style="" type="text" id="pdfname" name="pdfname"></td>
            </tr>
          </table>  
          </div>
          <div style="padding-top:15px;color:green;font-size:12px;" name="formdatafilename">
          Do you want pdf popped up:
          <select name="popupwindow" id="popupwindow">
            <option ng-repeat="yesno in yesnoList" value="{{yesno.value}}">{{yesno.item}}</option>
          </select> 
          </div>
          <div style="padding-top:15px;color:green;font-size:12px;" name="formdatafilename">
          Do you want link to pdf:
          <select name="popuplink" id="popuplink">
            <option ng-repeat="yesno in yesnoList" value="{{yesno.value}}">{{yesno.item}}</option>
          </select> 
          </div>
          <input style="" type="hidden" id="createfpdfpdf-filename-hidden" name="filename" value="">
          </form>
          <div id="showlink" style="display:none;padding-top:15px;color:green;font-size:12px;">
          </div>
          </div><!-- end of panel -->
          <div id="createfpdfpdf-process" style="float:right;padding-top:30px;padding-right:15px;">
          <button ng-click="pdfAction('createfpdfpdf')" type="button" class="btn btn-primary btn-xs">Convert</button>
          </div><!-- end of createfpdfpdf-process -->
          </div><!-- end of col-lg-12 -->
        </div><!-- end of row -->
      </div><!-- end of container -->

      <div id="createpdfhtml2pdf-area" style="display:none;" class="container">
          <div class="row">
          <div class="col-lg-12">
          <div name="loadtitlearea">
          <span class="loadTitle">Create PDF using HTML2PDF Library</span>
          </div><!-- end of loadtitlearea -->
          </div><!-- end of col-lg-12 -->
        </div><!-- end of row -->

        <div class="row" style="padding-top:20px;">
          <div class="col-lg-12">
          <div class="panel">
          <form name="createpdfhtml2pdf-form" id="createpdfhtml2pdf-form" enctype="multipart/form-data">
          <div style="color:green;font-size:12px;" name="formdatafromfilename">
          <table>
            <tr>
              <td>File Name to convert</td>
              <td>&nbsp;</td>
              <td><input style="" type="file" id="createpdfhtml2pdf-filename" name="filename"></td>
            </tr>
          </table>  
          </div>
          <div style="padding-top:15px;color:green;font-size:12px;" name="formdatatofilename">
          <table>
            <tr>
              <td>PDF File Name</td>
              <td>&nbsp;</td>
              <td><input style="" type="text" id="pdfname" name="pdfname"></td>
            </tr>
          </table>  
          </div>
          <div style="padding-top:15px;color:green;font-size:12px;" name="formdatafilename">
          Do you want pdf popped up:
          <select name="popupwindow" id="popupwindow">
            <option ng-repeat="yesno in yesnoList" value="{{yesno.value}}">{{yesno.item}}</option>
          </select> 
          </div>
          <div style="padding-top:15px;color:green;font-size:12px;" name="formdatafilename">
          Do you want link to pdf:
          <select name="popuplink" id="popuplink">
            <option ng-repeat="yesno in yesnoList" value="{{yesno.value}}">{{yesno.item}}</option>
          </select> 
          </div>
          <input style="" type="hidden" id="createpdfhtml2pdf-filename-hidden" name="filename" value="">
          </form>
          <div id="showlink" style="display:none;padding-top:15px;color:green;font-size:12px;">
          </div>
          </div><!-- end of panel -->
          <div id="createpdfhtml2pdf-process" style="float:right;padding-top:30px;padding-right:15px;">
          <button ng-click="pdfAction('createpdfhtml2pdf')" type="button" class="btn btn-primary btn-xs">Convert</button>
          </div><!-- end of createpdfhtml2pdf-process -->
          </div><!-- end of col-lg-12 -->
        </div><!-- end of row -->
      </div><!-- end of container -->

    </div><!-- end of infoarea -->
  </div><!-- end of col-lg-8 -->

</div> <!-- end of row -->

<div style="padding-bottom:50px;">&nbsp;</div>