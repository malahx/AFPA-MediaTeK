'use strict';

angular.module('myApp.events', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/events', {
    templateUrl: 'src/view/eventList.html',
    controller: 'EventsCtrl'
  });
}])

.controller('EventsCtrl', ['$scope', '$http',
    function($scope, $http, $state) {
      $http.get('http://localhost:8888/api/events').then(function(response) {
        $scope.events = response.data;
      });
    }
]);
