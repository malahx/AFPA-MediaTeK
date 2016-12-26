(function(app) {
  app.AppModule =
    ng.core.NgModule({
      imports: [ ng.platformBrowser.BrowserModule ],
      declarations: [ app.AppComponent, app.HeaderComponent, app.NavbarComponent, app.FooterComponent, app.ModalComponent ],
      bootstrap: [ app.AppComponent, app.HeaderComponent, app.NavbarComponent, app.FooterComponent, app.ModalComponent ]
    })
    .Class({
      constructor: function() {}
    });
})(window.app || (window.app = {}));
