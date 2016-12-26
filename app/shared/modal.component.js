(function(app) {
  app.ModalComponent =
    ng.core.Component({
      selector: 'my-modal',
      templateUrl: 'app/shared/modal.component.html',
      styleUrls: ['app/shared/modal.component.css']
    })
    .Class({
      constructor: function() {}
    });
})(window.app || (window.app = {}));
