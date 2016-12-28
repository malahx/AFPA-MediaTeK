'use strict';

angular.module('myApp.borrows', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/borrows', {
    templateUrl: 'src/view/docList.html',
    controller: 'BorrowsCtrl'
  });
}])

.controller('BorrowsCtrl', ['$scope', '$http', 'user',
    function($scope, $http, user) {
      if (!user.isLogged()) {
        $scope.notLogged = true;
      } else {
        $http.get('http://localhost:8888/api/borrows').then(function(response) {
          $scope.docs = response.data;
        });
      }
    }
]);
