/**
 * Created by marthaAK on 9/24/2014.
 */
    'use strict';
/* Services */

var iLogServices = angular.module('iLogServices', ['ngResource']);

iLogServices.factory('Log', ['$resource', function($resource){
    return $resource('issues/:issue.json', {}, {
        query: {method: 'GET', params:{issue:'issues'}, isArray:true}
    });
}]);