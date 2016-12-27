'use strict';

angular.module('myApp')

.component('navbar', {
    templateUrl: 'src/shared/navbar.component.html',
    controller: function NavbarCtrl($scope, $route, $location) {
        $scope.title = function() {
            var route = $route.routes[$location.path()];
            if (!route) {
                return "Nouveautés";
            }
            var controller = route.controller;
            if (controller === "NewsCtrl") {
                return "Nouveautés";
            } else if (controller === "EventsCtrl") {
                return "Evènements";
            } else if (controller === "DocCtrl") {
                return "Document";
            }
            return;
        };
        $scope.isActive = function(path) {
            var currentPath = $location.path().split('/')[1];
            if (!currentPath) {
                return '' === path.split('/')[1];
            }
            if (currentPath.indexOf('?') !== -1) {
                currentPath = currentPath.split('?')[0];
            }
            return currentPath === path.split('/')[1];
        };
        $scope.menu = function () {
            var navSecEl = document.getElementById('navSec');
            var mediatekLinkEl = document.getElementById('mediatekLink');

            navSecEl.classList.toggle('def-hidden');
            mediatekLinkEl.classList.toggle('link-color-black');
            mediatekLinkEl.classList.toggle('link-color-white');
        };
    }
});

