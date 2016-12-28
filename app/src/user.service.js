angular.module('myApp')

.factory('user', function ($http, $location) {
    var error = false;
    
    return {
        hasError: function() {
            return error;
        },
        login: function(username, password, scope = null) {
            var success = function(response) {
                error = false;
                sessionStorage.setItem("user", JSON.stringify(response.data));
                if (scope != null) {
                    scope.close();
                }
            }
            
            var error = function(response) {
                error = true;
                if (scope != null) {
                    scope.hasError = error;
                }
            }
            
            $http.post('http://localhost:8888/api/login', { '_username': username, '_password': password }).then(success, error);
        },
        logout: function() {
            sessionStorage.removeItem("user");
            $location.path("/");
        },
        isLogged: function() {
            return sessionStorage.getItem("user") != null;
        },
        isAdmin: function() {
            return this.isLogged() && this.getUser()["roles"].indexOf("ROLE_ADMIN") != -1;
        },
        getUser: function() {
            user = sessionStorage.getItem("user");
            return user ? JSON.parse(user) : null;
        }
    }
});
