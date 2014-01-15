pdfApp.service('selectlistService', function () {
    this.getYesNoList = function () {
        return yesNoList;
    }

    this.getBarcodeListList = function () {
        return barcodeList;
    }

    this.getPdfCreateUrlList = function () {
        return pdfCreateUrlList;
    }

    this.getPdfCreateUrlFromPrefix = function (prefix) {
        var str = "";
        var list = this.getPdfCreateUrlList ();

        $.each(list, function() {
            if (this.prefix == prefix)
            {
                str = this.url;
            }
        });

        return str;
    }

    this.getPdfCreateTitleFromTitle = function (title) {
        var str = "";
        var list = this.getPdfCreateUrlList ();

        $.each(list, function() {
            if (this.title == title)
            {
                str = this.title;
            }
        });

        return str;
    }

    this.getBarcodeCreateUrlList = function () {
        return barcodeCreateUrlList;
    }

    this.getBarcodeCreateUrlFromPrefix = function (prefix) {
        var str = "";
        var list = this.getBarcodeCreateUrlList ();

        $.each(list, function() {
            if (this.prefix == prefix)
            {
                str = this.url;
            }
        });

        return str;
    }

    this.getBarcodeCreateTemplateFromPrefix = function (prefix) {
        var str = "";
        var list = this.getBarcodeCreateUrlList ();

        $.each(list, function() {
            if (this.prefix == prefix)
            {
                str = this.template;
            }
        });

        return str;
    }

    this.getBarcodeCreateTitleFromTitle = function (title) {
        var str = "";
        var list = this.getBarcodeCreateUrlList ();

        $.each(list, function() {
            if (this.title == title)
            {
                str = this.title;
            }
        });

        return str;
    }

    var yesNoList = [
        {
            item: "Yes",
            value: "yes",
            action: "none"
        },
        {
            item: "No",
            value: "no",
            action: "none"
        }
    ];

    var barcodeList = [
        {
            item: "QR Code",
            value: "QR",
            action: "none"
        },
        {
            item: "C128B Code",
            value: "C128B",
            action: "none"
        }
    ];

    var pdfCreateUrlList = [
        {
            prefix: "createfpdfpdf",
            url: "app/ajax/createfpdfpdf.php",
            template: "",
            title: "Create PDF using FPDF Library"
        },
        {
            prefix: "createpdfhtml2pdf",
            url: "app/ajax/createpdfhtml2pdf.php",
            template: "",
            title: "Create PDF using HTML2PDF Library"
        },
        {
            prefix: "convertpdf2tiff",
            url: "app/ajax/convertpdf2tiff.php",
            template: "",
            title: "Convert PDF to TIFF using GhostScript"
        }
    ];

    var barcodeCreateUrlList = [
        {
            prefix: "createhtml2pdfbarcodes",
            url: "app/ajax/createhtml2pdfbarcodes.php",
            template: "createhtml2pdfbarcodes-template.php",
            title: "Create barcodes in PDF usning HTML2PDF"
        }
    ];

});