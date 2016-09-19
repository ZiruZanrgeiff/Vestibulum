app.controller('vestibulumController', ['$scope', 'Upload','$sce' , function ($scope, Upload, $sce) {

    // upload on file select or drop
    $scope.upload = function (file) {
        ress = Upload.upload({
            url: 'http://vestibulum/api/file',
            data: {file: file},
            disableProgress: true
        }).then(function (resp) {

            console.log('Success ' + resp.config.data.file.name + ' uploaded. Response: ' + resp.data);

            $scope.data = resp.data;
            $scope.trustedHtml = $sce.trustAsHtml($scope.data);
        });
    };
}]);