<!DOCTYPE html>
<html lang="en" data-ng-app="pdfApp">
<head>
<title>PDF Generation and Conversion Utilities</title>
<meta name="description" content="PDF Generation Utility">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="css/bootstrap-glyphicons.css" rel="stylesheet" />
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet" >
<link href="http://fonts.googleapis.com/css?family=OFL+Sorts+Mill+Goudy+TT|PT+Sans" type="text/css" rel="stylesheet" >
<link href="css/pdf.css" rel="stylesheet" />

<!-- Vendor Libs -->
<script src="Scripts/angular-1.2.8/angular.min.js"></script>
<script src="Scripts/angular-1.2.8/angular-route.min.js"></script>
<script src="Scripts/angular-1.2.8/angular-animate.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<!-- <script src="//code.angularjs.org/1.2.1/angular.min.js"></script>
<script src="//code.angularjs.org/1.2.1/angular-route.min.js"></script>
<script src="//code.angularjs.org/1.2.1/angular-animate.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->

<!-- UI Libs -->
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
<script src="http://jqueryrotate.googlecode.com/svn/trunk/jQueryRotate.js"></script>

<!-- App libs -->
<script src="app/pdfApp.js"></script>
<script src="app/controllers/controllers.js"></script>
<script src="app/factories/factories.js"></script>
<script src="app/services/pdfservice.js"></script>
<script src="app/services/selectlistservice.js"></script>
<script src="app/services/adminfunctionservice.js"></script>
<script src="app/services/dialogservice.js"></script>
<script src="app/directives/directives.js"></script>
<script src="app/validations/validate.js"></script>

<script src="Scripts/pdf.js"></script>
</head>

<body style="background:white;" data-ng-controller="pdfParentController" >

<div style="padding-left:50px;padding-bottom:25px;width:100%;background:#5E676B">
    <a class="navbar-brand" style="text-decoration:none;float:left;" href="#/home"><img style="height:75px;" src="img/pdfgenerator.png" alt="logo"></a>
    <div style="padding-top:35px;">
        <span id="cmtitle" class="bodyFont" style="color:white;padding-left:15px;padding-right:0px;margin:auto;letter-spacing:12px;font-size:35px;">PDF Generation Utility</span> 
    </div>
</div>

<div class="container" style="padding-top:20px;">
<div style="background:white;clear:both;" data-ng-view="" class="view-animate"></div>
</div> <!-- end of container top -->

<div style="background:#6B625E;height:275px;">
	<div class="container" style="padding-top:20px;">
	</div><!-- end of container top -->
</div> <!-- end of footer -->

</body>
</html>