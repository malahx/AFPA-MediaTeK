(function(app) {
  app.ModalComponent =
    ng.core.Component({
      selector: 'my-modal',
      templateUrl: 'app/shared/modal.component.html'
    })
    .Class({
      constructor: function() {}
    });
})(window.app || (window.app = {}));
