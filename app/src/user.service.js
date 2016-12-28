angular.module('myApp')

.factory('user', function ($http) {
    var error = false;
    var user;
    
    return {
        hasError: function() {
            return error;
        },
        login: function(username, password, scope = null) {
            var success = function(response) {
                error = false;
                user = response.data;
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
            user = null;
        },
        isLogged: function() {
            return user != null;
        },
        getUser: function() {
            return user;
        }
    }
});
