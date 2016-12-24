(function(app) {
  app.NavbarComponent =
    ng.core.Component({
      selector: 'my-navbar',
      templateUrl: 'app/shared/navbar.component.html'
    })
    .Class({
      constructor: function() {}
    });
})(window.app || (window.app = {}));
