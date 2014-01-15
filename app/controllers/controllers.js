// define controllers for app
var controllers = {};
controllers.pdfParentController = function ($scope, $http, $location, pdfApp, adminfunctionService) {

    init();
    function init() {
        $scope.loadHTML = "";
    };
}


controllers.pdfController = function ($scope, $http, $location, pdfApp, selectlistService, adminfunctionService) {

    init();
    function init() {
        $scope.sysfuncs = adminfunctionService.getAllFunctions();

        $(".tips").tooltip();

        // $scope.yesnolistfunc = selectlistService.getYesNoList;
        $scope.yesnoList = selectlistService.getYesNoList();
        $scope.barcodeList = selectlistService.getBarcodeListList();
        $scope.pdfinfolist = selectlistService.getPdfCreateUrlList();
        $scope.barcodeinfolist = selectlistService.getBarcodeCreateUrlList();
    };

    $scope.loadPartial = function (elm)
    {
        $.each($scope.sysfuncs, function() {
            if (this.action == elm.action)
            {
                $("#"+this.id).removeClass('btn-default');
                $("#"+this.id).addClass('btn-primary');
            }
            else
            {
                $("#"+this.id).removeClass('btn-primary');
                $("#"+this.id).addClass('btn-default');
                $("#"+this.id+"-area").hide( );
            }
        });

        $("#"+elm.id+"-area").show( "slide" );
        // add to directive here
    };

    
    $scope.pdfAction = function(prefix)
    {
        var formData = new FormData($("#"+prefix+"-form")[0]);

        $("#"+prefix+"-progress-area").css("visibility", "visible" );
        $("#"+prefix+"-progress-area").removeClass("progress-bar-info");
        $("#"+prefix+"-progress-area").addClass("active"); 
        $("#"+prefix+"-progress-area").addClass("progress-striped"); 
        $("#"+prefix+"-progress").css("width","10%");  

        pdfApp.uploadFile(formData)
        .success( function(data) {
            var i = 0;
            $("#"+prefix+"-filename-hidden").val(data);

            $("#"+prefix+"-progress").css("width","80%"); 

            var serializedData = $("#"+prefix+"-form").serialize();
            var url = selectlistService.getPdfCreateUrlFromPrefix(prefix);
            pdfApp.createpdf(serializedData,url)
                .success( function(data) {
                    var strLink = "app/ajax/";
                    var strWindow = "app/ajax/";

                    $("#"+prefix+"-progress").css("width","100%"); 

                    //
                    // in case of tiff we pass back png for display as browsers will not display tiff files
                    //
                    if (data.indexOf(',') > 0)
                    {
                        strArray = data.split(",");

                        var strLink = strLink+strArray[0];
                        var strWindow = strWindow+strArray[1];
                    }
                    else
                    {
                        var strLink = strLink+data;
                        var strWindow = strWindow+data;
                    }

                    if ($("#"+prefix+"-popuplink").val() == "yes")
                    {
                        var rstr = "Click on link to access file <a target='_blank' href='"+strLink+"''>"+strLink+"</a>";

                        $("#"+prefix+"-showlink").html(rstr);
                        $("#"+prefix+"-showlink").show( );
                    }

                    if ($("#"+prefix+"-popupwindow").val() == "yes")
                    {
                        window.open(strWindow,"newfile");
                    }

                    $("#"+prefix+"-progress").css("width","0%");
                    $("#"+prefix+"-progress-area").css("visibility", "hidden" );
                    
            })

            .error( function(data) {
                    var i = 0;
            });
        })

        .error( function(data) {
            var i = 0;
            alert("create pdf error");
        });

    }

    $scope.barcodeAction = function(prefix)
    {
        $("#"+prefix+"-progress-area").css("visibility", "visible" );
        $("#"+prefix+"-progress-area").removeClass("progress-bar-info");
        $("#"+prefix+"-progress-area").addClass("active"); 
        $("#"+prefix+"-progress-area").addClass("progress-striped"); 
        $("#"+prefix+"-progress").css("width","80%"); 

        var url = selectlistService.getBarcodeCreateUrlFromPrefix(prefix);
        var template = selectlistService.getBarcodeCreateTemplateFromPrefix(prefix);

        $("#"+prefix+"-template-hidden").val(template); 

        var serializedData = $("#"+prefix+"-form").serialize();
        pdfApp.createhtml2pdfbarcodes(serializedData,url)
            .success( function(data) {
                var strLink = "app/ajax/";
                var strWindow = "app/ajax/";

                $("#"+prefix+"-progress").css("width","100%"); 

                //
                // in case of tiff we pass back png for display as browsers will not display tiff files
                //
                if (data.indexOf(',') > 0)
                {
                    strArray = data.split(",");

                    var strLink = strLink+strArray[0];
                    var strWindow = strWindow+strArray[1];
                }
                else
                {
                    var strLink = strLink+data;
                    var strWindow = strWindow+data;
                }

                if ($("#"+prefix+"-popuplink").val() == "yes")
                {
                    var rstr = "Click on link to access file <a target='_blank' href='"+strLink+"''>"+strLink+"</a>";

                    $("#"+prefix+"-showlink").html(rstr);
                    $("#"+prefix+"-showlink").show( );
                }

                if ($("#"+prefix+"-popupwindow").val() == "yes")
                {
                    window.open(strWindow,"newfile");
                }

                $("#"+prefix+"-progress").css("width","0%");
                $("#"+prefix+"-progress-area").css("visibility", "hidden" );
                
        })

        .error( function(data) {
                var i = 0;
        });
    }

}

pdfApp.controller(controllers); 
