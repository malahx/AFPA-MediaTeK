(function(app) {
  app.FooterComponent =
    ng.core.Component({
      selector: 'my-footer',
      templateUrl: 'app/shared/footer.component.html'
    })
    .Class({
      constructor: function() {}
    });
})(window.app || (window.app = {}));
