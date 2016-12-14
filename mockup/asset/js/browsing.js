window.addEventListener('scroll', function (e) {
    var titleEl = document.getElementById('title');
    var navbarEl = document.getElementById('navbar');
    var returnEl = document.getElementById('return');
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
