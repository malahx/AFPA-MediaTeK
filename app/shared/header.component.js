(function(app) {
  app.HeaderComponent =
    ng.core.Component({
      selector: 'my-header',
      templateUrl: 'app/shared/header.component.html',
      styleUrls: ['app/shared/header.component.css']
    })
    .Class({
      constructor: function() {}
    });
})(window.app || (window.app = {}));
