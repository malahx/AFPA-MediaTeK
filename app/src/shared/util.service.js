angular.module('myApp')

.factory('util', function ($location) {    
    return {

        // Sélectionner l'ordre en fonction de la route
        order: function(doc, date) {
            var route = $location.path().split('/')[1];
            if (doc.borrow != null && (route === 'myBorrows' || route === 'borrows')) {
                if (doc.borrow.isReserved) {
                    return doc.borrow.reservation;
                }
                return Math.abs(date.getTime() - doc.borrow.plannedReturn);
            } else {
                return date.getTime() - doc.document.date * 1000;
            }
        },

        // La route est-elle active ?
        isActive: function(path) {
            var currentPath = $location.path().split('/')[1];
            if (!currentPath) {
                return '' === path.split('/')[1];
            }
            if (currentPath.indexOf('?') !== -1) {
                currentPath = currentPath.split('?')[0];
            }
            return currentPath === path.split('/')[1];
        }
    }
});
