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
      
      $http.get('http://localhost:8888/api/document/' + $routeParams.id).then(function(response) {
        $scope.doc = response.data;
      });
    }
]);
