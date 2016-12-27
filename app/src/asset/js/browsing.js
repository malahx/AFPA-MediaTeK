// Déplacement de la barre de titre en fonction du scroll
window.addEventListener('scroll', function (e) {
    
    // Initialisation des variables
    var titleEl = document.getElementById('title');
    var navbarEl = document.getElementById('navbar');
    var returnEl = document.getElementById('return');
    var navSecEl = document.getElementById('navSec');
    
    // Initialisation des positions
    var bottomNavbar = navbarEl.getBoundingClientRect().bottom;
    var bottomNavSecEl = navSecEl.getBoundingClientRect().bottom;
    var topTitle = titleEl.getBoundingClientRect().top;
    
    // Traitement des données
    if (topTitle < 0) {
        titleEl.classList.add('fixed');
        returnEl.classList.add('right');
    } else if (bottomNavbar > 0 || bottomNavSecEl > 0) {
        titleEl.classList.remove('fixed');
        returnEl.classList.remove('right');
    }
});

var modal = {
    dom: function() {
        return document.getElementById('loginModal');
    },
    closeDom: function() {
        return document.getElementById('loginModalClose');
    },
    open: function() {
        modal.dom().style.display = "block";
    },
    close: function() {
        modal.dom().style.display = "none";
    },
    init: function() {
        window.onclick = function (event) {
            if (event.target == modal.dom() || event.target == modal.closeDom()) {
                modal.close();
            }
        };
    }
}
modal.init();
