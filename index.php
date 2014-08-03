<!DOCTYPE html>
<html lang="en" data-ng-app="pdfApp">
<head>
<title>PDF Generation and Conversion Utilities</title>
<meta name="description" content="PDF Generation Utility">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
<link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet" >
<link href="http://fonts.googleapis.com/css?family=OFL+Sorts+Mill+Goudy+TT|PT+Sans" type="text/css" rel="stylesheet" >
<link href="css/pdf.css" rel="stylesheet" />

<!-- Vendor Libs -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.10/angular.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.10/angular-resource.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.10/angular-animate.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.10/angular-route.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<!-- <script src="//code.angularjs.org/1.2.1/angular.min.js"></script>
<script src="//code.angularjs.org/1.2.1/angular-route.min.js"></script>
<script src="//code.angularjs.org/1.2.1/angular-animate.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->

<!-- UI Libs -->
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
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

<div style="padding-left:50px;padding-bottom:25px;width:100%;background:#339999">
    <a class="navbar-brand" style="text-decoration:none;float:left;" href="#/home"><img style="height:75px;" src="img/pdfgenerator.png" alt="logo"></a>
    <div style="padding-top:35px;">
        <span id="cmtitle" class="bodyFont" style="color:white;padding-left:15px;padding-right:0px;margin:auto;letter-spacing:12px;font-size:35px;">PDF Generation Utility</span> 
    </div>
</div>
<nav role="navigation" class="navbar navbar-default">
    <!-- Collection of nav links, forms, and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
            <li><a href="#/home">Home</a></li>
        </ul>

        <ul class="nav navbar-nav">
            <li><a href="#/buildpdfs">Build PDF's</a></li>
        </ul>

        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle">Save HTML <b class="caret"></b></a>
                <ul role="menu" class="dropdown-menu">
                    <li><a href="#/writehtml2dirctory">Write to directory</a></li>
                    <li><a href="#/showhtmlfromdirectory">Show form written to directory</a></li>
                </ul>
            </li>
        </ul>
</nav>

<div class="container" style="padding-top:20px;">
<div style="background:white;clear:both;" data-ng-view="" class="view-animate"></div>
</div> <!-- end of container top -->

<div style="background:#99CCFF;height:275px;">
	<div class="container" style="padding-top:20px;">
	</div><!-- end of container top -->
</div> <!-- end of footer -->

</body>
</html>