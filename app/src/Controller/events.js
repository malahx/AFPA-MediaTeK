'use strict';

angular.module('myApp.events', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/events', {
    templateUrl: 'src/View/events.html',
    controller: 'EventCtrl'
  });
}])

.controller('EventCtrl', ['$scope', '$http',
    function($scope, $http) {
      $http.get('http://localhost:8888/events').then(function(response) {
        $scope.events = response.data;
      });
    }
]);
