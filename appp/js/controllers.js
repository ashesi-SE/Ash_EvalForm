/**
 * Created by marthaAK on 9/24/2014.
 */
'use strict';

/*Controllers*/


var iLogControllers = angular.module('iLogControllers', ['ngResource']);

iLogControllers.controller('Logs', ['$scope', 'Log', function($scope, Log){
    //Logs is the parent controller, so
    //scope.logs is available in all children
    $scope.logs = [];

}]);
    iLogControllers.controller('EditCtrl', ['$scope', '$routeParams',
        function($scope, $routeParams){
        //load in an issue logged from the route (/logs/:index)
        $scope.log = $scope.logs[$routeParams.index];
        $scope.index = $routeParams.index;
}]);
    iLogControllers.controller('AddCtrl', ['$scope', 'Log', function($scope, Log) {
        //add an issue
        var length = $scope.logs.push({
            group_name: '',
            student_name: '',
            date: '',
            scores1: '',
            scores2: '',
            scores3: '',
            scores4: '',
            scores5: '',
            scores6: '',
            //scores6

           // total :parseInt($scope.log.length.scores1)+parseInt(length.scores1)+parseInt(length.scores2)+parseInt(length.scores3)+parseInt(length.scores3)+parseInt(length.scores4)

        });
        $scope.log = $scope.logs[length-1];
        $scope.index = length - 1;
        //$scope.total = parseInt($scope.log.length.scores1)+parseInt(length.scores1)+parseInt(length.scores2)+parseInt(length.scores3)+parseInt(length.scores3)+parseInt(length.scores4);
}]);
    iLogControllers.controller('TableCtrl', ['$scope', '$routeParams', 'Log',
        function($scope, $routeParams, Log){
                $scope.logs = Log.query();
                /*$scope.log = Log.get({issue:$routeParams.issue}, function(log){
                 //$scope.index = $routeParams.index;
                 });*/
    }]);

    iLogControllers.controller('SingleCtrl', ['$scope', '$routeParams', 'Log',
        function($scope, $routeParams, Log){
            //load in an issue logged from the route (/logs/:index)
            //$scope.log = Log.get({issue:$routeParams.issue}, function(log){
                //$scope.index = $routeParams.index;
            //});
            $scope.log = Log.get({issue: $routeParams.issue});
 }]);

    iLogControllers.controller('LoginCtrl', ['$scope', function($scope){
        $scope.credentials = {email: "", password: ""};

    }]);
