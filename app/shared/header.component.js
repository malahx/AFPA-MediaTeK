(function(app) {
  app.HeaderComponent =
    ng.core.Component({
      selector: 'my-header',
      templateUrl: 'app/shared/header.component.html'
    })
    .Class({
      constructor: function() {}
    });
})(window.app || (window.app = {}));
