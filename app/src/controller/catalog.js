'use strict';

angular.module('myApp.catalog', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/catalog', {
    templateUrl: 'src/view/docList.html',
    controller: 'CatalogCtrl'
  });
}])

.controller('CatalogCtrl', ['$scope', '$http', 'user', 'util',
    function($scope, $http, user, util) {
      
      $scope.util = util;
      $scope.date = new Date();
      
      if (!user.isLogged()) {
        $scope.notLogged = true;
      } else {
        $http.get('http://localhost:8888/api/catalog').then(function(response) {
          $scope.docs = response.data;
        });
      }
    }
]);
