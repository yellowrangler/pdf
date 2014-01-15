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

        $scope.yesnoList = selectlistService.getYesNoList();
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
    };

    $scope.uploadFormFile = function(formId)
    {
        var formData = new FormData($("#createfpdfpdf-form")[0]);
         
         pdfApp.uploadFile(formData)
        .success( function(data) {
            var i = 0;
            $("#createfpdfpdf-filename-hidden").val(data);
        })

        .error( function(data) {
            var i = 0;
        });
    };

    $scope.pdfAction = function(action)
    {
        switch (action)
        {
            case "createfpdfpdf":
                var formData = new FormData($("#createfpdfpdf-form")[0]);
             
                 pdfApp.uploadFile(formData)
                .success( function(data) {
                    var i = 0;
                    $("#createfpdfpdf-filename-hidden").val(data);

                    $scope.uploadFormFile("createfpdfpdf-form");

                    var serializedData = $("#createfpdfpdf-form").serialize();
                    pdfApp.createfpdfpdf(serializedData)
                    .success( function(data) {
                        var i = 0;
                        var str = "app/ajax/"+data;
                        if ($("#popuplink").val() == "yes")
                        {
                            var rstr = "Click on link to access PDF <a target='_blank' href='"+str+"''>"+str+"</a>";
   
                            $("#showlink").html(rstr);
                            $("#showlink").show( );
                        }

                        if ($("#popupwindow").val() == "yes")
                        {
                            window.open(str,"newpdf");
                        }
                        
                    })

                    .error( function(data) {
                        var i = 0;
                    });
                })

                .error( function(data) {
                    var i = 0;
                    alert("create pdf error");
                });
            break;

            case "createpdfhtml2pdf":
                var formData = new FormData($("#createpdfhtml2pdf-form")[0]);
             
                 pdfApp.uploadFile(formData)
                .success( function(data) {
                    var i = 0;
                    $("#createpdfhtml2pdf-filename-hidden").val(data);

                    $scope.uploadFormFile("createpdfhtml2pdf-form");

                    var serializedData = $("#createpdfhtml2pdf-form").serialize();
                    pdfApp.createpdfhtml2pdf(serializedData)
                    .success( function(data) {
                        var i = 0;
                        var str = "app/ajax/"+data;
                        if ($("#popuplink").val() == "yes")
                        {
                            var rstr = "Click on link to access PDF <a target='_blank' href='"+str+"''>"+str+"</a>";
   
                            $("#showlink").html(rstr);
                            $("#showlink").show( );
                        }

                        if ($("#popupwindow").val() == "yes")
                        {
                            window.open(str,"newpdf");
                        }
                        
                    })

                    .error( function(data) {
                        var i = 0;
                    });
                })

                .error( function(data) {
                    var i = 0;
                    alert("create pdf error");
                });
            break;

            case "convertfpdf2tiff":
                pdfApp.convertfpdf2tiff("data")
                    .success( function(data) {
                        var i = 0;
                    })

                    .error( function(data) {
                        var i = 0;
                    });
            break;

            case "converthtml2pdf2tiff":
                pdfApp.converthtml2pdf2tiff("data")
                    .success( function(data) {
                        var i = 0;
                    })

                    .error( function(data) {
                        var i = 0;
                    });
            break;
        }
    }
}

pdfApp.controller(controllers); 
