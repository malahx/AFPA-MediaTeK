'use strict';

angular.module('myApp')

.component('navbar', {
    templateUrl: 'src/shared/navbar.component.html',
    controllerAs: 'NavbarCtrl',
    controller: function($scope, $route, $location, user) {

        $scope.user = user;
        
        // Quel est le titre ?
        $scope.title = function() {
            var route = $route.routes[$location.path()];
            if (!route) {
                return "Document";
            }
            var controller = route.controller;
            if (controller === "NewsCtrl") {
                return "Nouveautés";
            } else if (controller === "EventsCtrl") {
                return "Evènements";
            } else if (controller === "DocCtrl") {
                return "Document";
            } else if (controller === "CatalogCtrl") {
                return "Catalogue";
            } else if (controller === "BorrowsCtrl") {
                return "Tous les Emprunts";
            } else if (controller === "myBorrowsCtrl") {
                return "Vos Emprunts";
            }
            return;
        };

        // Quel route est active ?
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

        // Afficher le menu en mobile
        $scope.menu = function() {
            var navSecEl = document.getElementById('navSec');
            var mediatekLinkEl = document.getElementById('mediatekLink');

            navSecEl.classList.toggle('def-hidden');
            mediatekLinkEl.classList.toggle('link-color-black');
            mediatekLinkEl.classList.toggle('link-color-white');
        };

        // Ouvrir le modal
        $scope.openModal = function() {
            var el = document.getElementById('loginModal');
            el.style.display = "block";
        };
    }
});

