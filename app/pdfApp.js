var pdfApp = angular.module ('pdfApp', ['ngRoute','ngAnimate']);


// define routes for app
pdfApp.config(function ($routeProvider) {
    $routeProvider
        .when('/home',
            {
                controller: 'homeController',
                templateUrl: 'app/partials/home.php'
            })  
        .when('/buildpdfs',
            {
                controller: 'buildpdfsController',
                templateUrl: 'app/partials/buildpdfs.php'
            })  
        .when('/other',
            {
                controller: 'pdfController',
                templateUrl: 'app/partials/home.php'
            })     
        .otherwise({redirectTo: '/home' });
});