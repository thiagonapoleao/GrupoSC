(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["pages-conferencia-conferencia-module"],{

/***/ "./node_modules/raw-loader/index.js!./src/app/pages/conferencia/conferencia.page.html":
/*!***********************************************************************************!*\
  !*** ./node_modules/raw-loader!./src/app/pages/conferencia/conferencia.page.html ***!
  \***********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "<ion-header color=\"secondary\">\n  <ion-toolbar color=\"secondary\">\n    <ion-buttons slot=\"start\">\n      <ion-menu-button></ion-menu-button>\n    </ion-buttons>\n    <ion-title>\n      <span>Indicadores GrupoSC</span>\n    </ion-title>\n  </ion-toolbar>\n</ion-header>\n\n\n<ion-content class=\"alto\">\n  <ion-card class=\"pincipal\">\n    <p>\n      <ion-card-subtitle style=\"text-align:center; color: aliceblue; font-size: 16px\">Analise da Produção por\n        Conferente</ion-card-subtitle>\n    </p>\n    <ion-item class=\"top\">\n      <ion-label>Conferente</ion-label>\n      <ion-button color=\"danger\" class=\"menu\">Unidades</ion-button>\n      <ion-button color=\"danger\" class=\"menu\">Media</ion-button>\n      <ion-button color=\"danger\" class=\"menu\">% da Meta</ion-button>\n    </ion-item>\n  </ion-card>\n</ion-content>\n\n<ion-content class=\"baixo\">\n  <ion-card class=\"dados\">\n\n    <ion-item *ngFor=\"let analise of analises\">\n      <ion-label>{{analise.nome}}</ion-label>\n      <ion-button>{{analise.total}}</ion-button>\n      <ion-button>{{analise.media}}</ion-button>\n      <ion-button>{{analise.porcen}}</ion-button>\n    </ion-item>\n\n\n  </ion-card>\n</ion-content>"

/***/ }),

/***/ "./src/app/pages/conferencia/conferencia.module.ts":
/*!*********************************************************!*\
  !*** ./src/app/pages/conferencia/conferencia.module.ts ***!
  \*********************************************************/
/*! exports provided: ConferenciaPageModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ConferenciaPageModule", function() { return ConferenciaPageModule; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm2015/core.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/fesm2015/common.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/fesm2015/forms.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/fesm2015/router.js");
/* harmony import */ var _ionic_angular__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @ionic/angular */ "./node_modules/@ionic/angular/dist/fesm5.js");
/* harmony import */ var _conferencia_page__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./conferencia.page */ "./src/app/pages/conferencia/conferencia.page.ts");







const routes = [
    {
        path: '',
        component: _conferencia_page__WEBPACK_IMPORTED_MODULE_6__["ConferenciaPage"]
    }
];
let ConferenciaPageModule = class ConferenciaPageModule {
};
ConferenciaPageModule = tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"]([
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["NgModule"])({
        imports: [
            _angular_common__WEBPACK_IMPORTED_MODULE_2__["CommonModule"],
            _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormsModule"],
            _ionic_angular__WEBPACK_IMPORTED_MODULE_5__["IonicModule"],
            _angular_router__WEBPACK_IMPORTED_MODULE_4__["RouterModule"].forChild(routes)
        ],
        declarations: [_conferencia_page__WEBPACK_IMPORTED_MODULE_6__["ConferenciaPage"]]
    })
], ConferenciaPageModule);



/***/ }),

/***/ "./src/app/pages/conferencia/conferencia.page.scss":
/*!*********************************************************!*\
  !*** ./src/app/pages/conferencia/conferencia.page.scss ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "@charset \"UTF-8\";\ncabeçalho da pagina home .top {\n  position: fixed;\n  margin-bottom: 40px !important;\n  z-index: 999;\n}\np {\n  margin-top: 8px;\n  margin-bottom: 0px;\n}\n.alto {\n  --background: url(\"/assets/img/GrupoSC-top.png\") 0 0/100% 100% no-repeat;\n  max-height: 90px;\n}\n.pincipal ion-slides {\n  height: 7%;\n}\n.pincipal span {\n  color: #ffffff;\n}\n.pincipal ion-item {\n  --border-radius: 5px;\n}\n.pincipal ion-label {\n  font-size: 12px;\n  white-space: pre-line;\n}\n.pincipal ion-button {\n  width: 90;\n  height: 100;\n  max-height: 40px;\n  min-height: 40px;\n  max-width: 60px;\n  min-width: 60px;\n  font-size: 12px;\n  white-space: pre-line;\n  --border-radius: 6px;\n}\n.pincipal .menu {\n  font-size: 9px;\n}\n.dados {\n  margin-top: 8px;\n}\n.dados ion-slides {\n  height: 7%;\n}\n.dados span {\n  color: #ffffff;\n}\n.dados ion-item {\n  --border-radius: 5px;\n}\n.dados ion-label {\n  font-size: 12px;\n  white-space: pre-line;\n}\n.dados ion-button {\n  width: 90;\n  height: 100;\n  max-height: 40px;\n  min-height: 40px;\n  max-width: 60px;\n  min-width: 60px;\n  font-size: 12px;\n  white-space: pre-line;\n  --border-radius: 6px;\n}\n.baixo {\n  --background: url(\"/assets/img/GrupoSC-d.png\") 0 0/100% 100% no-repeat;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvcGFnZXMvY29uZmVyZW5jaWEvY29uZmVyZW5jaWEucGFnZS5zY3NzIiwic3JjL2FwcC9wYWdlcy9jb25mZXJlbmNpYS9DOlxcRGVzZW52b2x2aW1lbnRvXFxUQ0NcXFYwMFxcR3J1cG9TQy9zcmNcXGFwcFxccGFnZXNcXGNvbmZlcmVuY2lhXFxjb25mZXJlbmNpYS5wYWdlLnNjc3MiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUEsZ0JBQWdCO0FDQ2hCO0VBRVEsZUFBQTtFQUNBLDhCQUFBO0VBQ0EsWUFBQTtBREFSO0FDR0k7RUFDSSxlQUFBO0VBQ0Esa0JBQUE7QURBUjtBQ0dJO0VBQ0ksd0VBQUE7RUFDQSxnQkFBQTtBREFSO0FDTUk7RUFDSSxVQUFBO0FESFI7QUNNRztFQUNLLGNBQUE7QURKUjtBQ1FJO0VBQ0ksb0JBQUE7QUROUjtBQ1VJO0VBQ0ksZUFBQTtFQUNBLHFCQUFBO0FEUlI7QUNXSTtFQUNJLFNBQUE7RUFDQSxXQUFBO0VBQ0EsZ0JBQUE7RUFDQSxnQkFBQTtFQUNBLGVBQUE7RUFDQSxlQUFBO0VBQ0EsZUFBQTtFQUNBLHFCQUFBO0VBQ0Esb0JBQUE7QURUUjtBQ1lFO0VBQ0UsY0FBQTtBRFZKO0FDZUE7RUFFSSxlQUFBO0FEYko7QUNlSTtFQUNJLFVBQUE7QURiUjtBQ2dCSTtFQUNJLGNBQUE7QURkUjtBQ2tCSTtFQUNJLG9CQUFBO0FEaEJSO0FDb0JJO0VBQ0ksZUFBQTtFQUNBLHFCQUFBO0FEbEJSO0FDcUJJO0VBQ0ksU0FBQTtFQUNBLFdBQUE7RUFDQSxnQkFBQTtFQUNBLGdCQUFBO0VBQ0EsZUFBQTtFQUNBLGVBQUE7RUFDQSxlQUFBO0VBQ0EscUJBQUE7RUFDQSxvQkFBQTtBRG5CUjtBQ3VCQTtFQUNJLHNFQUFBO0FEcEJKIiwiZmlsZSI6InNyYy9hcHAvcGFnZXMvY29uZmVyZW5jaWEvY29uZmVyZW5jaWEucGFnZS5zY3NzIiwic291cmNlc0NvbnRlbnQiOlsiQGNoYXJzZXQgXCJVVEYtOFwiO1xuY2FiZcOnYWxobyBkYSBwYWdpbmEgaG9tZSAudG9wIHtcbiAgcG9zaXRpb246IGZpeGVkO1xuICBtYXJnaW4tYm90dG9tOiA0MHB4ICFpbXBvcnRhbnQ7XG4gIHotaW5kZXg6IDk5OTtcbn1cblxucCB7XG4gIG1hcmdpbi10b3A6IDhweDtcbiAgbWFyZ2luLWJvdHRvbTogMHB4O1xufVxuXG4uYWx0byB7XG4gIC0tYmFja2dyb3VuZDogdXJsKFwiL2Fzc2V0cy9pbWcvR3J1cG9TQy10b3AucG5nXCIpIDAgMC8xMDAlIDEwMCUgbm8tcmVwZWF0O1xuICBtYXgtaGVpZ2h0OiA5MHB4O1xufVxuXG4ucGluY2lwYWwgaW9uLXNsaWRlcyB7XG4gIGhlaWdodDogNyU7XG59XG4ucGluY2lwYWwgc3BhbiB7XG4gIGNvbG9yOiAjZmZmZmZmO1xufVxuLnBpbmNpcGFsIGlvbi1pdGVtIHtcbiAgLS1ib3JkZXItcmFkaXVzOiA1cHg7XG59XG4ucGluY2lwYWwgaW9uLWxhYmVsIHtcbiAgZm9udC1zaXplOiAxMnB4O1xuICB3aGl0ZS1zcGFjZTogcHJlLWxpbmU7XG59XG4ucGluY2lwYWwgaW9uLWJ1dHRvbiB7XG4gIHdpZHRoOiA5MDtcbiAgaGVpZ2h0OiAxMDA7XG4gIG1heC1oZWlnaHQ6IDQwcHg7XG4gIG1pbi1oZWlnaHQ6IDQwcHg7XG4gIG1heC13aWR0aDogNjBweDtcbiAgbWluLXdpZHRoOiA2MHB4O1xuICBmb250LXNpemU6IDEycHg7XG4gIHdoaXRlLXNwYWNlOiBwcmUtbGluZTtcbiAgLS1ib3JkZXItcmFkaXVzOiA2cHg7XG59XG4ucGluY2lwYWwgLm1lbnUge1xuICBmb250LXNpemU6IDlweDtcbn1cblxuLmRhZG9zIHtcbiAgbWFyZ2luLXRvcDogOHB4O1xufVxuLmRhZG9zIGlvbi1zbGlkZXMge1xuICBoZWlnaHQ6IDclO1xufVxuLmRhZG9zIHNwYW4ge1xuICBjb2xvcjogI2ZmZmZmZjtcbn1cbi5kYWRvcyBpb24taXRlbSB7XG4gIC0tYm9yZGVyLXJhZGl1czogNXB4O1xufVxuLmRhZG9zIGlvbi1sYWJlbCB7XG4gIGZvbnQtc2l6ZTogMTJweDtcbiAgd2hpdGUtc3BhY2U6IHByZS1saW5lO1xufVxuLmRhZG9zIGlvbi1idXR0b24ge1xuICB3aWR0aDogOTA7XG4gIGhlaWdodDogMTAwO1xuICBtYXgtaGVpZ2h0OiA0MHB4O1xuICBtaW4taGVpZ2h0OiA0MHB4O1xuICBtYXgtd2lkdGg6IDYwcHg7XG4gIG1pbi13aWR0aDogNjBweDtcbiAgZm9udC1zaXplOiAxMnB4O1xuICB3aGl0ZS1zcGFjZTogcHJlLWxpbmU7XG4gIC0tYm9yZGVyLXJhZGl1czogNnB4O1xufVxuXG4uYmFpeG8ge1xuICAtLWJhY2tncm91bmQ6IHVybChcIi9hc3NldHMvaW1nL0dydXBvU0MtZC5wbmdcIikgMCAwLzEwMCUgMTAwJSBuby1yZXBlYXQ7XG59IiwiXHJcbmNhYmXDp2FsaG8gZGEgcGFnaW5hIGhvbWVcclxuICAgICAgLnRvcCB7XHJcbiAgICAgICAgcG9zaXRpb246IGZpeGVkO1xyXG4gICAgICAgIG1hcmdpbi1ib3R0b206IDQwcHggIWltcG9ydGFudDtcclxuICAgICAgICB6LWluZGV4OiA5OTk7ICAgICAgIFxyXG4gICAgfVxyXG5cclxuICAgIHB7XHJcbiAgICAgICAgbWFyZ2luLXRvcDogOHB4O1xyXG4gICAgICAgIG1hcmdpbi1ib3R0b206IDBweDtcclxuICAgIH1cclxuXHJcbiAgICAuYWx0byB7XHJcbiAgICAgICAgLS1iYWNrZ3JvdW5kOiB1cmwoJy9hc3NldHMvaW1nL0dydXBvU0MtdG9wLnBuZycpIDAgMC8xMDAlIDEwMCUgbm8tcmVwZWF0O1xyXG4gICAgICAgIG1heC1oZWlnaHQ6IDkwcHg7XHJcbiAgICB9XHJcblxyXG5cclxuLnBpbmNpcGFsIHsgICAgXHJcblxyXG4gICAgaW9uLXNsaWRlcyB7XHJcbiAgICAgICAgaGVpZ2h0OiA3JTsgICAgICAgICAgICAgICAgXHJcbiAgICB9XHJcblxyXG4gICBzcGFuIHtcclxuICAgICAgICBjb2xvcjogI2ZmZmZmZjsgICBcclxuICAgICAgICBcclxuICAgIH1cclxuICAgIFxyXG4gICAgaW9uLWl0ZW0geyAgXHJcbiAgICAgICAgLS1ib3JkZXItcmFkaXVzOiA1cHg7ICAgIFxyXG4gICAgICAgICAgICAgXHJcbiAgICB9XHJcblxyXG4gICAgaW9uLWxhYmVsIHtcclxuICAgICAgICBmb250LXNpemU6IDEycHg7XHJcbiAgICAgICAgd2hpdGUtc3BhY2U6IHByZS1saW5lOyAgIFxyXG4gICAgfVxyXG5cclxuICAgIGlvbi1idXR0b24geyAgICAgIFxyXG4gICAgICAgIHdpZHRoOjkwO1xyXG4gICAgICAgIGhlaWdodDoxMDA7XHJcbiAgICAgICAgbWF4LWhlaWdodDogNDBweDtcclxuICAgICAgICBtaW4taGVpZ2h0OiA0MHB4O1xyXG4gICAgICAgIG1heC13aWR0aDogNjBweDtcclxuICAgICAgICBtaW4td2lkdGg6IDYwcHg7XHJcbiAgICAgICAgZm9udC1zaXplOiAxMnB4O1xyXG4gICAgICAgIHdoaXRlLXNwYWNlOiBwcmUtbGluZTsgICAgICAgICAgICBcclxuICAgICAgICAtLWJvcmRlci1yYWRpdXM6IDZweDsgICAgIFxyXG4gICAgfVxyXG5cclxuICAubWVudSB7XHJcbiAgICBmb250LXNpemU6IDlweDtcclxuICB9XHJcbiAgICAgICAgXHJcbn1cclxuXHJcbi5kYWRvcyB7XHJcblxyXG4gICAgbWFyZ2luLXRvcDogOHB4O1xyXG5cclxuICAgIGlvbi1zbGlkZXMge1xyXG4gICAgICAgIGhlaWdodDogNyU7ICAgICAgICAgICAgICAgIFxyXG4gICAgfVxyXG5cclxuICAgIHNwYW4ge1xyXG4gICAgICAgIGNvbG9yOiAjZmZmZmZmOyAgIFxyXG4gICAgICAgIFxyXG4gICAgfVxyXG4gICAgXHJcbiAgICBpb24taXRlbSB7ICBcclxuICAgICAgICAtLWJvcmRlci1yYWRpdXM6IDVweDsgICAgXHJcbiAgICAgICAgICAgICBcclxuICAgIH1cclxuXHJcbiAgICBpb24tbGFiZWwge1xyXG4gICAgICAgIGZvbnQtc2l6ZTogMTJweDtcclxuICAgICAgICB3aGl0ZS1zcGFjZTogcHJlLWxpbmU7ICAgXHJcbiAgICB9XHJcblxyXG4gICAgaW9uLWJ1dHRvbiB7ICAgICAgXHJcbiAgICAgICAgd2lkdGg6OTA7XHJcbiAgICAgICAgaGVpZ2h0OjEwMDtcclxuICAgICAgICBtYXgtaGVpZ2h0OiA0MHB4O1xyXG4gICAgICAgIG1pbi1oZWlnaHQ6IDQwcHg7XHJcbiAgICAgICAgbWF4LXdpZHRoOiA2MHB4O1xyXG4gICAgICAgIG1pbi13aWR0aDogNjBweDtcclxuICAgICAgICBmb250LXNpemU6IDEycHg7XHJcbiAgICAgICAgd2hpdGUtc3BhY2U6IHByZS1saW5lOyAgICAgICAgICAgIFxyXG4gICAgICAgIC0tYm9yZGVyLXJhZGl1czogNnB4OyAgICAgXHJcbiAgICB9ICAgICAgICBcclxufVxyXG5cclxuLmJhaXhvIHsgICAgICBcclxuICAgIC0tYmFja2dyb3VuZDogdXJsKCcvYXNzZXRzL2ltZy9HcnVwb1NDLWQucG5nJykgMCAwLzEwMCUgMTAwJSBuby1yZXBlYXQ7XHJcbiAgICAvLyBiYWNrZ3JvdW5kLXJlcGVhdDogbm8tcmVwZWF0OyAgICBcclxuICAgIC8vIGJhY2tncm91bmQtc2l6ZTogY292ZXIgO1xyXG59Il19 */"

/***/ }),

/***/ "./src/app/pages/conferencia/conferencia.page.ts":
/*!*******************************************************!*\
  !*** ./src/app/pages/conferencia/conferencia.page.ts ***!
  \*******************************************************/
/*! exports provided: ConferenciaPage */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ConferenciaPage", function() { return ConferenciaPage; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm2015/core.js");
/* harmony import */ var _services_dados_sc_service__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../services/dados-sc.service */ "./src/app/pages/services/dados-sc.service.ts");
/* harmony import */ var _ionic_angular__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @ionic/angular */ "./node_modules/@ionic/angular/dist/fesm5.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/fesm2015/router.js");




//import da lib responsavel pelo recebimeto de parametros

let ConferenciaPage = class ConferenciaPage {
    constructor(navCtrl, service, route) {
        this.navCtrl = navCtrl;
        this.service = service;
        this.route = route;
        this.getDados();
    }
    getDados() {
        this.service.getAlluser().then((result) => {
            this.analises = result['analises'];
            console.log(this.analises);
        }).catch((error) => {
            console.error("error: " + error);
        });
    }
    ngOnInit() {
    }
};
ConferenciaPage.ctorParameters = () => [
    { type: _ionic_angular__WEBPACK_IMPORTED_MODULE_3__["NavController"] },
    { type: _services_dados_sc_service__WEBPACK_IMPORTED_MODULE_2__["DadosSCService"] },
    { type: _angular_router__WEBPACK_IMPORTED_MODULE_4__["ActivatedRoute"] }
];
ConferenciaPage = tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"]([
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
        selector: 'app-conferencia',
        template: __webpack_require__(/*! raw-loader!./conferencia.page.html */ "./node_modules/raw-loader/index.js!./src/app/pages/conferencia/conferencia.page.html"),
        styles: [__webpack_require__(/*! ./conferencia.page.scss */ "./src/app/pages/conferencia/conferencia.page.scss")]
    }),
    tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"]("design:paramtypes", [_ionic_angular__WEBPACK_IMPORTED_MODULE_3__["NavController"], _services_dados_sc_service__WEBPACK_IMPORTED_MODULE_2__["DadosSCService"], _angular_router__WEBPACK_IMPORTED_MODULE_4__["ActivatedRoute"]])
], ConferenciaPage);



/***/ })

}]);
//# sourceMappingURL=pages-conferencia-conferencia-module-es2015.js.map