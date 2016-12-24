'use strict';

angular.module('myApp.navbar',[])

.controller('NavbarCtrl', ['$scope', '$route', '$location',
    function ($scope, $route, $location) {
        if ($route.routes[$location.path()].controller === "NewsCtrl") {
            $scope.title = "Nouveautés";
        }
    }
]);
