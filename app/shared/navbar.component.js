(function(app) {
  app.NavbarComponent =
    ng.core.Component({
      selector: 'my-navbar',
      templateUrl: 'app/shared/navbar.component.html',
      styleUrls: ['app/shared/navbar.component.css']
    })
    .Class({
      constructor: function() {}
    });
})(window.app || (window.app = {}));
