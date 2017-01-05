'use strict';

angular.module('myApp')

.component('modal', {
    templateUrl: 'src/shared/modal.component.html',
    controller: function ModalCtrl($scope, user) {

        $scope.hasError = user.hasError();
        
        $scope.open = function() {
            var el = document.getElementById('loginModal');
            el.style.display = "block";
        };
        
        $scope.close = function() {
            var el = document.getElementById('loginModal');
            el.style.display = "none";
        };
        
        $scope.login = function() {

            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            user.login(username, password, $scope);

        };
        
        window.addEventListener('click', function (event) {
            var el = document.getElementById('loginModal');
            var btn = document.getElementById('loginModalClose');
            if (event.target == el || event.target == btn) {
                ($scope.close)();
            }
        });
    }
});
