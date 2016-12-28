'use strict';

angular.module('myApp.document', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/document/:id', {
    templateUrl: 'src/view/document.html',
    controller: 'DocCtrl'
  });
}])

.controller('DocCtrl', ['$scope', '$routeParams', '$http', 'user',
    function($scope, $routeParams, $http, user) {

      $scope.user = user;

      $scope.resa = function(id) {
        $http.get('http://localhost:8888/api/resa/' + id).then(function(response) {
          $scope.doc['borrow'] = response.data;
        });
      };
 
      $scope.borrow = function(id) {
        $http.get('http://localhost:8888/api/borrow/' + id).then(function(response) {
          $scope.doc['borrow'] = response.data;
        });
      };

      $scope.closeBorrowing = function(id) {
        $http.get('http://localhost:8888/api/closeBorrowing/' + id).then(function(response) {
          $scope.doc['borrow'] = null;
        });
      };
       
      $http.get('http://localhost:8888/api/document/' + $routeParams.id).then(function(response) {
        $scope.doc = response.data;
      });
    }
]);
