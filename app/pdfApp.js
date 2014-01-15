var pdfApp = angular.module ('pdfApp', ['ngRoute','ngAnimate']);


// define routes for app
pdfApp.config(function ($routeProvider) {
    $routeProvider
        .when('/home',
            {
                controller: 'pdfController',
                templateUrl: 'app/partials/home.php'
            })  
        .when('/other',
            {
                controller: 'pdfController',
                templateUrl: 'app/partials/home.php'
            })     
        .otherwise({redirectTo: '/home' });
});