pdfApp.service('createpdffunctionservice', function () {
    this.getFunctions = function () {
        return createpdffunctions;
    }

    this.getActionLocation = function (action) {
        var allFunctions = this.getFunctions();

        var location = "/";
        $.each(allFunctions, function() {
            if (action == this.action)
            {
                location = "/"+this.action;             
            }
        });

        return location;
    }

    this.getAllFunctions = function () {
        var allFunctions = this.getFunctions();

        var allSysFunctions = new Array();
        var index = 0;
        $.each(allFunctions, function() {
            allSysFunctions[index] = this;
            index++;  
        });

        return allSysFunctions;
    }

    this.getClientTitles = function () {
        var allFunctions = this.getFunctions();

        var clientTitles = new Array();
        var index = 0;
        $.each(allFunctions, function() {
            if (this.owner == "client")
            {
                clientTitles[index] = this.title;
                index++;                 
            }
        });

        return clientTitles;
    }

    this.getProviderTitles = function () {
        var allFunctions = this.getFunctions();

        var providerTitles = new Array();
        var index = 0;
        $.each(allFunctions, function() {
            if (this.owner == "provider")
            {
                providerTitles[index] = this.title;
                index++; 
            }

        });

        return providerTitles;
    }

    this.getAdminTitles = function () {
        var allFunctions = this.getFunctions();

        var adminTitles = new Array();
        var index = 0;
        $.each(allFunctions, function() {
            if (this.owner == "admin")
            {
                adminTitles[index] = this.title;
                index++;                 
            }
        });

        return adminTitles;
    }

    this.isLogoff = function (action) {
        logoffIdx = createpdffunctions.length - 1;
        if (action == logoffIdx)
            return true;
        else
            return false;
    }

    var createpdffunctions = [
        {
            title: "Create PDF with FPDF",
            action: "createfpdfpdf",
            help: "This will create pdf file usinf FPDF library",
            id: "createfpdfpdf",
            boostrapbutton:"btn-info"
        },
        {
            title: "Create PDF with HTML2PDF",
            action: "createpdfhtml2pdf",
            help: "This will create pdf file usinf HTML2PDF library",
            id: "createpdfhtml2pdf",
            boostrapbutton:"btn-info"
        },
        {
            title: "Convert PDF to TIFF",
            action: "convertpdf2tiff",
            help: "This will convert PDF pdf file to tiff",
            id: "convertpdf2tiff",
            boostrapbutton:"btn-info"
        },
        {
            title: "Create HTML2PDF PDF Barcodes",
            action: "createhtml2pdfbarcodes",
            help: "This will create barcodes using HTML2PDF pdf generator",
            id: "createhtml2pdfbarcodes",
            boostrapbutton:"btn-info"
        }
    ];

});