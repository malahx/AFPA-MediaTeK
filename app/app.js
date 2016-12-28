'use strict';

// Declare app level module which depends on views, and components
//angular.module('myApp', [
//  'ngRoute',
//  'myApp.view1',
//  'myApp.view2',
//  'myApp.version'
//]).
//config(['$locationProvider', '$routeProvider', function($locationProvider, $routeProvider) {
//  $locationProvider.hashPrefix('!');
//
//  $routeProvider.otherwise({redirectTo: '/view1'});
//}]);

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
