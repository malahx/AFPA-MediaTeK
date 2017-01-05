'use strict';

angular.module('myApp.news', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/', {
    templateUrl: 'src/view/docList.html',
    controller: 'NewsCtrl'
  });
}])

.controller('NewsCtrl', ['$scope', '$http', 'util',
    function($scope, $http, util) {
      
      $scope.util = util;
      $scope.date = new Date();
      
      $http.get('http://localhost:8888/api/news').then(function(response) {
        $scope.docs = response.data;
      });
    }
]);
