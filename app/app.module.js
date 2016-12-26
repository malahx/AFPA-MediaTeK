(function(app) {
  var router = require("@angular/router");
  app.AppModule =
    ng.core.NgModule({
      imports: [ ng.platformBrowser.BrowserModule, router.RouterModule.forRoot([
                { path: '', name: 'News', component: NewsComponent,},
                { path: 'document/:id', name: 'document', component: DocumentComponent }
            ]) ],
      declarations: [ app.AppComponent, app.HeaderComponent, app.NavbarComponent, app.FooterComponent, app.ModalComponent ],
      bootstrap: [ app.AppComponent, app.HeaderComponent, app.NavbarComponent, app.FooterComponent, app.ModalComponent ]
    })
    .Class({
      constructor: function() {}
    });
})(window.app || (window.app = {}));
