var iLogAppController = angular.module('iLogAppController', []);

iLogAppController.controller('ViewCtrl', ['$scope', function($scope){
    $scope.header = "View an issue";
}]);