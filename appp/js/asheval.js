    /* App Module */
    evalApp = angular.module('evalApp', ['ngRoute',
        'ngResource',
        'EVALCONTROLLERS',
        'iLogServices']);

        evalApp.config(['$routeProvider', function($routeProvider){
            //configure the roots
            $routeProvider
                .when('/issues', {
                    templateUrl: 'partials/logList.html'
                })
                .when('/home', {
                    templateUrl: 'partials/editeval.html',
                    controller: 'AddCtrl'
                })
                .when('/log/:index', {
                    //edit log
                     templateUrl: 'partials/editLog.html',
                     controller: 'EditCtrl'
                })
                .when('/table', {
                    //table view
                    templateUrl: 'partials/tableList.html',
                    controller: 'TableCtrl'
                })
                .when('/single/:issue', {
                    //single view
                    templateUrl: 'partials/singleIssue.html',
                    controller: 'SingleCtrl'
                })
                .otherwise({
                    redirectTo: '/home',
                    templateUrl: 'partials/editLog.html'
                });

        }]);








