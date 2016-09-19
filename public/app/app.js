var app = angular.module('vestibulum', ['ngFileUpload'],  function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});


