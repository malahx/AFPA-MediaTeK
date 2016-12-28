'use strict';

angular.module('myApp.myborrows', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/myBorrows', {
    templateUrl: 'src/view/docList.html',
    controller: 'myBorrowsCtrl'
  });
}])

.controller('myBorrowsCtrl', ['$scope', '$http', 'user',
    function($scope, $http, user) {
      if (!user.isLogged()) {
        $scope.notLogged = true;
      } else {
        $http.get('http://localhost:8888/api/myborrows').then(function(response) {
          $scope.docs = response.data;
        });
      }
    }
]);
