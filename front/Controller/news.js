'use strict';

angular.module('myApp.news', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/', {
    templateUrl: 'View/home.html',
    controller: 'NewsCtrl'
  });
}])

.controller('NewsCtrl', ['$scope',
    function($scope) {
    }
]);
