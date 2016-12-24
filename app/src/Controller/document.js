'use strict';

angular.module('myApp.document', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/document/:id', {
    templateUrl: 'src/View/document.html',
    controller: 'DocumentCtrl'
  });
}])

.controller('DocumentCtrl', ['$scope', '$routeParams', '$http',
    function($scope, $routeParams, $http) {
      $http.get('http://localhost:8888/document/' + $routeParams.id).then(function(response) {
        $scope.doc = response.data;
      });
    }
]);
