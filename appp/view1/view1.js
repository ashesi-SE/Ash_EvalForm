 'use strict';

angular.module('myApp.view1', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/view1', {
    templateUrl: 'view1/view1.html',
    controller: 'List'
  });
}])

.controller('List', [function($scope) {

         $scope.names = ["Lawson", "Josephine", "Appolonia", "Martha", "Margaret"];/*[
         {name: "Lawson", age: 57},
         {name: "Josephine", age: 54},
         {name: "Appolonia", age: 29},
         {name: "Martha", age: 23},
         {name: "Margaret", age: 23}
            ];*/
}]);