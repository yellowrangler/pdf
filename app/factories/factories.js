// define factories
pdfApp.factory('pdfApp', function($q, $http) {
    var factory = {};

    factory.uploadFile = function (data) {
        return $.ajax({
            url: "app/ajax/uploadFormFile.php",
            type: 'POST',
            data: data,
            async: false,
            cache: false,
            contentType: false,
            processData: false
        });
    }

    factory.createpdf = function (data, url) {
        return $http({ 
            method: 'POST', 
            url: url,
            data: data,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
    }

    factory.convertpdf2tiff = function (data) {
        return $http({ 
            method: 'POST', 
            url: "app/ajax/convertpdf2tiff.php",
            data: data,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
    }

    factory.createfpdfbarcodes = function (data) {
        return $http({ 
            method: 'POST', 
            url: "app/ajax/createfpdfbarcodes.php",
            data: data,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
    }

    factory.createhtml2pdfbarcodes = function (data,url) {
        return $http({ 
            method: 'POST', 
            url: url,
            data: data,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
    }

    return factory;

});