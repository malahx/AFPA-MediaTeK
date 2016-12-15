var titleEl, navbarEl, returnEl, mediaEl, navSecEl, loginModalEl, loginModalBtnEl, loginModalCloseEl;

window.addEventListener('scroll', function (e) {
    titleEl = document.getElementById('title');
    navbarEl = document.getElementById('navbar');
    returnEl = document.getElementById('return');
    var bottomNavbar = navbarEl.getBoundingClientRect().bottom;
    var topTitle = titleEl.getBoundingClientRect().top;
    if (topTitle < 0) {
        titleEl.classList.add('fixed');
        returnEl.classList.add('right');
    } else if (bottomNavbar > 0) {
        titleEl.classList.remove('fixed');
        returnEl.classList.remove('right');
    }
});

window.onload = function (e) {
    loginModalEl = document.getElementById('loginModal');
    loginModalBtnEl = document.getElementById('loginModalBtn');
    loginModalCloseEl = document.getElementById('loginModalClose');
    mediaEl = document.getElementById('mediatek');
    navSecEl = document.getElementById('navSec');
    mediaEl.addEventListener('click', function (e) {
        navSecEl.classList.remove('hidden');
        location.hash = "#navSec";
    });
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
};