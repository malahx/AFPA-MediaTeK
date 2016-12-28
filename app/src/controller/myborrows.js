'use strict';

angular.module('myApp.myborrows', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/myBorrows', {
    templateUrl: 'src/view/docList.html',
    controller: 'myBorrowsCtrl'
  });
}])

.controller('myBorrowsCtrl', ['$scope', '$http', 'user', 'util',
    function($scope, $http, user, util) {
      
      $scope.util = util;
      $scope.date = new Date();
      
      if (!user.isLogged()) {
        $scope.notLogged = true;
      } else {
        $http.get('http://localhost:8888/api/myborrows').then(function(response) {
          $scope.docs = response.data;
        });
      }
    }
]);
