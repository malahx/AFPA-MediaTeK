'use strict';

angular.module('myApp.news', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/', {
    templateUrl: 'src/View/docList.html',
    controller: 'NewsCtrl'
  });
}])

.controller('NewsCtrl', ['$scope', '$http',
    function($scope, $http) {
      $http.get('http://localhost:8888').then(function(response) {
        $scope.docs = response.data;
      });
    }
]);
