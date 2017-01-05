'use strict';

angular.module('myApp', [
  'ngRoute',
  'myApp.news',
  'myApp.document',
  'myApp.events',
  'myApp.catalog',
  'myApp.myborrows',
  'myApp.borrows'
])

.config(['$locationProvider', '$routeProvider', '$httpProvider', function($locationProvider, $routeProvider, $httpProvider) {
  // Ajouter les cookies aux requètes
  $httpProvider.defaults.withCredentials = true;
  
  $locationProvider.hashPrefix('!');

  $routeProvider.otherwise({redirectTo: '/'});
}]);
