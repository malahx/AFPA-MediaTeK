var titleEl, navbarEl, returnEl, mediaEl, navSecEl, loginModalEl, loginModalBtnEl, loginModalCloseEl, accEl, accLinkEl, mediaLinkEl;

// Déplacement de la barre de titre en fonction du scroll
window.addEventListener('scroll', function (e) {
    
    // Initialisation des variables
    titleEl = document.getElementById('title');
    navbarEl = document.getElementById('navbar');
    returnEl = document.getElementById('return');
    navSecEl = document.getElementById('navSec');
    
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

// Au chargement
window.addEventListener('load', function (e) {
    
    // Initialisation des variables
    loginModalEl = document.getElementById('loginModal');
    loginModalBtnEl = document.getElementById('loginModalBtn');
    loginModalCloseEl = document.getElementById('loginModalClose');
    mediaEl = document.getElementById('mediatek');
    mediaLinkEl = document.getElementById('mediatekLink');
    navSecEl = document.getElementById('navSec');
    
    // Lors du clique sur le bouton de la médiathèque (mobile)
    mediaEl.onclick = function (e) {
        navSecEl.classList.toggle('hidden');
        mediaLinkEl.classList.toggle('link-color-black');
        mediaLinkEl.classList.toggle('link-color-white');
        location.hash = "#navSec";
    };
    
    // Ajout des fonctions du modal de login
    if (loginModalBtnEl !== null) {
        loginModalBtnEl.onclick = function () {
            loginModalEl.style.display = "block";
        };
        loginModalCloseEl.onclick = function () {
            loginModalEl.style.display = "none";
        };
        window.onclick = function (event) {
            if (event.target == loginModalBtnEl) {
                loginModalBtnEl.style.display = "none";
            }
        };
    }
});