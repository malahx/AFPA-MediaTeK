(function(app) {
  app.FooterComponent =
    ng.core.Component({
      selector: 'my-footer',
      templateUrl: 'app/shared/footer.component.html',
      styleUrls: ['app/shared/footer.component.css']
    })
    .Class({
      constructor: function() {}
    });
})(window.app || (window.app = {}));
