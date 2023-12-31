(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["pages-errseparacao-errseparacao-module"],{

/***/ "./node_modules/raw-loader/index.js!./src/app/pages/errseparacao/errseparacao.page.html":
/*!*************************************************************************************!*\
  !*** ./node_modules/raw-loader!./src/app/pages/errseparacao/errseparacao.page.html ***!
  \*************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "<ion-header color=\"tertiary\">\r\n  <ion-toolbar color=\"tertiary\">\r\n    <ion-buttons slot=\"start\">\r\n      <ion-menu-button></ion-menu-button>\r\n    </ion-buttons>\r\n    <ion-title>\r\n      <span>Indicadores GrupoSC</span>\r\n    </ion-title>\r\n  </ion-toolbar>\r\n</ion-header>\r\n\r\n\r\n<ion-content class=\"alto\">\r\n  <ion-card class=\"pincipal\">\r\n    <p>\r\n      <ion-card-subtitle style=\"text-align:center; color: aliceblue; font-size: 16px\">Analise de Erros por Separador\r\n      </ion-card-subtitle>\r\n    </p>\r\n    <ion-item class=\"top\">\r\n      <ion-label>Separador</ion-label>\r\n      <ion-button color=\"danger\" class=\"menu\">Erros</ion-button>\r\n    </ion-item>\r\n  </ion-card>\r\n</ion-content>\r\n\r\n<ion-content class=\"baixo\">\r\n  <ion-card class=\"dados\">\r\n    <ion-item *ngFor=\"let analise of analises\">\r\n      <ion-label>{{analise.nome}}</ion-label>\r\n      <ion-button>{{analise.total}}</ion-button>\r\n    </ion-item>\r\n  </ion-card>\r\n</ion-content>"

/***/ }),

/***/ "./src/app/pages/errseparacao/errseparacao.module.ts":
/*!***********************************************************!*\
  !*** ./src/app/pages/errseparacao/errseparacao.module.ts ***!
  \***********************************************************/
/*! exports provided: ErrseparacaoPageModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ErrseparacaoPageModule", function() { return ErrseparacaoPageModule; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm2015/core.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/fesm2015/common.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/fesm2015/forms.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/fesm2015/router.js");
/* harmony import */ var _ionic_angular__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @ionic/angular */ "./node_modules/@ionic/angular/dist/fesm5.js");
/* harmony import */ var _errseparacao_page__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./errseparacao.page */ "./src/app/pages/errseparacao/errseparacao.page.ts");







const routes = [
    {
        path: '',
        component: _errseparacao_page__WEBPACK_IMPORTED_MODULE_6__["ErrseparacaoPage"]
    }
];
let ErrseparacaoPageModule = class ErrseparacaoPageModule {
};
ErrseparacaoPageModule = tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"]([
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["NgModule"])({
        imports: [
            _angular_common__WEBPACK_IMPORTED_MODULE_2__["CommonModule"],
            _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormsModule"],
            _ionic_angular__WEBPACK_IMPORTED_MODULE_5__["IonicModule"],
            _angular_router__WEBPACK_IMPORTED_MODULE_4__["RouterModule"].forChild(routes)
        ],
        declarations: [_errseparacao_page__WEBPACK_IMPORTED_MODULE_6__["ErrseparacaoPage"]]
    })
], ErrseparacaoPageModule);



/***/ }),

/***/ "./src/app/pages/errseparacao/errseparacao.page.scss":
/*!***********************************************************!*\
  !*** ./src/app/pages/errseparacao/errseparacao.page.scss ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "@charset \"UTF-8\";\ncabeçalho da pagina home .top {\n  position: fixed;\n  margin-bottom: 40px !important;\n  z-index: 999;\n}\np {\n  margin-top: 8px;\n  margin-bottom: 0px;\n}\n.alto {\n  --background: url(\"/assets/img/GrupoSC-top13.png\") 0 0/100% 100% no-repeat;\n  max-height: 90px;\n}\n.pincipal ion-slides {\n  height: 7%;\n}\n.pincipal span {\n  color: #ffffff;\n}\n.pincipal ion-item {\n  --border-radius: 5px;\n}\n.pincipal ion-label {\n  font-size: 12px;\n  white-space: pre-line;\n}\n.pincipal ion-button {\n  width: 90;\n  height: 100;\n  max-height: 40px;\n  min-height: 40px;\n  max-width: 60px;\n  min-width: 60px;\n  font-size: 12px;\n  white-space: pre-line;\n  --border-radius: 6px;\n}\n.pincipal .menu {\n  font-size: 9px;\n}\n.dados {\n  margin-top: 8px;\n}\n.dados ion-slides {\n  height: 7%;\n}\n.dados span {\n  color: #ffffff;\n}\n.dados ion-item {\n  --border-radius: 5px;\n}\n.dados ion-label {\n  font-size: 12px;\n  white-space: pre-line;\n}\n.dados ion-button {\n  width: 90;\n  height: 100;\n  max-height: 40px;\n  min-height: 40px;\n  max-width: 60px;\n  min-width: 60px;\n  font-size: 12px;\n  white-space: pre-line;\n  --border-radius: 6px;\n}\n.dados .menu {\n  font-size: 9px;\n}\n.baixo {\n  --background: url(\"/assets/img/GrupoSC-top13.png\") 0 0/100% 100% no-repeat;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvcGFnZXMvZXJyc2VwYXJhY2FvL2VycnNlcGFyYWNhby5wYWdlLnNjc3MiLCJzcmMvYXBwL3BhZ2VzL2VycnNlcGFyYWNhby9DOlxcRGVzZW52b2x2aW1lbnRvXFxUQ0NcXFYwMFxcR3J1cG9TQy9zcmNcXGFwcFxccGFnZXNcXGVycnNlcGFyYWNhb1xcZXJyc2VwYXJhY2FvLnBhZ2Uuc2NzcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQSxnQkFBZ0I7QUNDaEI7RUFFRSxlQUFBO0VBQ0EsOEJBQUE7RUFDQSxZQUFBO0FEQUY7QUNHQTtFQUNFLGVBQUE7RUFDQSxrQkFBQTtBREFGO0FDR0E7RUFDRSwwRUFBQTtFQUNBLGdCQUFBO0FEQUY7QUNNQTtFQUNFLFVBQUE7QURIRjtBQ01BO0VBQ0UsY0FBQTtBREpGO0FDUUE7RUFDRSxvQkFBQTtBRE5GO0FDVUE7RUFDRSxlQUFBO0VBQ0EscUJBQUE7QURSRjtBQ1dBO0VBQ0UsU0FBQTtFQUNBLFdBQUE7RUFDQSxnQkFBQTtFQUNBLGdCQUFBO0VBQ0EsZUFBQTtFQUNBLGVBQUE7RUFDQSxlQUFBO0VBQ0EscUJBQUE7RUFDQSxvQkFBQTtBRFRGO0FDWUE7RUFDQSxjQUFBO0FEVkE7QUNlQTtFQUVBLGVBQUE7QURiQTtBQ2VBO0VBQ0UsVUFBQTtBRGJGO0FDZ0JBO0VBQ0UsY0FBQTtBRGRGO0FDa0JBO0VBQ0Usb0JBQUE7QURoQkY7QUNvQkE7RUFDRSxlQUFBO0VBQ0EscUJBQUE7QURsQkY7QUNxQkE7RUFDRSxTQUFBO0VBQ0EsV0FBQTtFQUNBLGdCQUFBO0VBQ0EsZ0JBQUE7RUFDQSxlQUFBO0VBQ0EsZUFBQTtFQUNBLGVBQUE7RUFDQSxxQkFBQTtFQUNBLG9CQUFBO0FEbkJGO0FDc0JBO0VBQ0EsY0FBQTtBRHBCQTtBQ3lCQTtFQUNFLDBFQUFBO0FEdEJGIiwiZmlsZSI6InNyYy9hcHAvcGFnZXMvZXJyc2VwYXJhY2FvL2VycnNlcGFyYWNhby5wYWdlLnNjc3MiLCJzb3VyY2VzQ29udGVudCI6WyJAY2hhcnNldCBcIlVURi04XCI7XG5jYWJlw6dhbGhvIGRhIHBhZ2luYSBob21lIC50b3Age1xuICBwb3NpdGlvbjogZml4ZWQ7XG4gIG1hcmdpbi1ib3R0b206IDQwcHggIWltcG9ydGFudDtcbiAgei1pbmRleDogOTk5O1xufVxuXG5wIHtcbiAgbWFyZ2luLXRvcDogOHB4O1xuICBtYXJnaW4tYm90dG9tOiAwcHg7XG59XG5cbi5hbHRvIHtcbiAgLS1iYWNrZ3JvdW5kOiB1cmwoXCIvYXNzZXRzL2ltZy9HcnVwb1NDLXRvcDEzLnBuZ1wiKSAwIDAvMTAwJSAxMDAlIG5vLXJlcGVhdDtcbiAgbWF4LWhlaWdodDogOTBweDtcbn1cblxuLnBpbmNpcGFsIGlvbi1zbGlkZXMge1xuICBoZWlnaHQ6IDclO1xufVxuLnBpbmNpcGFsIHNwYW4ge1xuICBjb2xvcjogI2ZmZmZmZjtcbn1cbi5waW5jaXBhbCBpb24taXRlbSB7XG4gIC0tYm9yZGVyLXJhZGl1czogNXB4O1xufVxuLnBpbmNpcGFsIGlvbi1sYWJlbCB7XG4gIGZvbnQtc2l6ZTogMTJweDtcbiAgd2hpdGUtc3BhY2U6IHByZS1saW5lO1xufVxuLnBpbmNpcGFsIGlvbi1idXR0b24ge1xuICB3aWR0aDogOTA7XG4gIGhlaWdodDogMTAwO1xuICBtYXgtaGVpZ2h0OiA0MHB4O1xuICBtaW4taGVpZ2h0OiA0MHB4O1xuICBtYXgtd2lkdGg6IDYwcHg7XG4gIG1pbi13aWR0aDogNjBweDtcbiAgZm9udC1zaXplOiAxMnB4O1xuICB3aGl0ZS1zcGFjZTogcHJlLWxpbmU7XG4gIC0tYm9yZGVyLXJhZGl1czogNnB4O1xufVxuLnBpbmNpcGFsIC5tZW51IHtcbiAgZm9udC1zaXplOiA5cHg7XG59XG5cbi5kYWRvcyB7XG4gIG1hcmdpbi10b3A6IDhweDtcbn1cbi5kYWRvcyBpb24tc2xpZGVzIHtcbiAgaGVpZ2h0OiA3JTtcbn1cbi5kYWRvcyBzcGFuIHtcbiAgY29sb3I6ICNmZmZmZmY7XG59XG4uZGFkb3MgaW9uLWl0ZW0ge1xuICAtLWJvcmRlci1yYWRpdXM6IDVweDtcbn1cbi5kYWRvcyBpb24tbGFiZWwge1xuICBmb250LXNpemU6IDEycHg7XG4gIHdoaXRlLXNwYWNlOiBwcmUtbGluZTtcbn1cbi5kYWRvcyBpb24tYnV0dG9uIHtcbiAgd2lkdGg6IDkwO1xuICBoZWlnaHQ6IDEwMDtcbiAgbWF4LWhlaWdodDogNDBweDtcbiAgbWluLWhlaWdodDogNDBweDtcbiAgbWF4LXdpZHRoOiA2MHB4O1xuICBtaW4td2lkdGg6IDYwcHg7XG4gIGZvbnQtc2l6ZTogMTJweDtcbiAgd2hpdGUtc3BhY2U6IHByZS1saW5lO1xuICAtLWJvcmRlci1yYWRpdXM6IDZweDtcbn1cbi5kYWRvcyAubWVudSB7XG4gIGZvbnQtc2l6ZTogOXB4O1xufVxuXG4uYmFpeG8ge1xuICAtLWJhY2tncm91bmQ6IHVybChcIi9hc3NldHMvaW1nL0dydXBvU0MtdG9wMTMucG5nXCIpIDAgMC8xMDAlIDEwMCUgbm8tcmVwZWF0O1xufSIsIlxyXG5jYWJlw6dhbGhvIGRhIHBhZ2luYSBob21lXHJcbi50b3Age1xyXG4gIHBvc2l0aW9uOiBmaXhlZDtcclxuICBtYXJnaW4tYm90dG9tOiA0MHB4ICFpbXBvcnRhbnQ7XHJcbiAgei1pbmRleDogOTk5OyAgICAgICBcclxufVxyXG5cclxucHtcclxuICBtYXJnaW4tdG9wOiA4cHg7XHJcbiAgbWFyZ2luLWJvdHRvbTogMHB4O1xyXG59XHJcblxyXG4uYWx0byB7XHJcbiAgLS1iYWNrZ3JvdW5kOiB1cmwoJy9hc3NldHMvaW1nL0dydXBvU0MtdG9wMTMucG5nJykgMCAwLzEwMCUgMTAwJSBuby1yZXBlYXQ7XHJcbiAgbWF4LWhlaWdodDogOTBweDtcclxufVxyXG5cclxuXHJcbi5waW5jaXBhbCB7ICAgIFxyXG5cclxuaW9uLXNsaWRlcyB7XHJcbiAgaGVpZ2h0OiA3JTsgICAgICAgICAgICAgICAgXHJcbn1cclxuXHJcbnNwYW4ge1xyXG4gIGNvbG9yOiAjZmZmZmZmOyAgIFxyXG4gIFxyXG59XHJcblxyXG5pb24taXRlbSB7ICBcclxuICAtLWJvcmRlci1yYWRpdXM6IDVweDsgICAgXHJcbiAgICAgICBcclxufVxyXG5cclxuaW9uLWxhYmVsIHtcclxuICBmb250LXNpemU6IDEycHg7XHJcbiAgd2hpdGUtc3BhY2U6IHByZS1saW5lOyAgIFxyXG59XHJcblxyXG5pb24tYnV0dG9uIHsgICAgICBcclxuICB3aWR0aDo5MDtcclxuICBoZWlnaHQ6MTAwO1xyXG4gIG1heC1oZWlnaHQ6IDQwcHg7XHJcbiAgbWluLWhlaWdodDogNDBweDtcclxuICBtYXgtd2lkdGg6IDYwcHg7XHJcbiAgbWluLXdpZHRoOiA2MHB4O1xyXG4gIGZvbnQtc2l6ZTogMTJweDtcclxuICB3aGl0ZS1zcGFjZTogcHJlLWxpbmU7ICAgICAgICAgICAgXHJcbiAgLS1ib3JkZXItcmFkaXVzOiA2cHg7ICAgICBcclxufVxyXG5cclxuLm1lbnUge1xyXG5mb250LXNpemU6IDlweDtcclxufVxyXG4gIFxyXG59XHJcblxyXG4uZGFkb3Mge1xyXG5cclxubWFyZ2luLXRvcDogOHB4O1xyXG5cclxuaW9uLXNsaWRlcyB7XHJcbiAgaGVpZ2h0OiA3JTsgICAgICAgICAgICAgICAgXHJcbn1cclxuXHJcbnNwYW4ge1xyXG4gIGNvbG9yOiAjZmZmZmZmOyAgIFxyXG4gIFxyXG59XHJcblxyXG5pb24taXRlbSB7ICBcclxuICAtLWJvcmRlci1yYWRpdXM6IDVweDsgICAgXHJcbiAgICAgICBcclxufVxyXG5cclxuaW9uLWxhYmVsIHtcclxuICBmb250LXNpemU6IDEycHg7XHJcbiAgd2hpdGUtc3BhY2U6IHByZS1saW5lOyAgIFxyXG59XHJcblxyXG5pb24tYnV0dG9uIHsgICAgICBcclxuICB3aWR0aDo5MDtcclxuICBoZWlnaHQ6MTAwO1xyXG4gIG1heC1oZWlnaHQ6IDQwcHg7XHJcbiAgbWluLWhlaWdodDogNDBweDtcclxuICBtYXgtd2lkdGg6IDYwcHg7XHJcbiAgbWluLXdpZHRoOiA2MHB4O1xyXG4gIGZvbnQtc2l6ZTogMTJweDtcclxuICB3aGl0ZS1zcGFjZTogcHJlLWxpbmU7ICAgICAgICAgICAgXHJcbiAgLS1ib3JkZXItcmFkaXVzOiA2cHg7ICAgICBcclxufVxyXG5cclxuLm1lbnUge1xyXG5mb250LXNpemU6IDlweDtcclxufVxyXG4gIFxyXG59XHJcblxyXG4uYmFpeG8geyAgICAgIFxyXG4gIC0tYmFja2dyb3VuZDogdXJsKCcvYXNzZXRzL2ltZy9HcnVwb1NDLXRvcDEzLnBuZycpIDAgMC8xMDAlIDEwMCUgbm8tcmVwZWF0O1xyXG4vLyBiYWNrZ3JvdW5kLXJlcGVhdDogbm8tcmVwZWF0OyAgICBcclxuLy8gYmFja2dyb3VuZC1zaXplOiBjb3ZlciA7XHJcbn0iXX0= */"

/***/ }),

/***/ "./src/app/pages/errseparacao/errseparacao.page.ts":
/*!*********************************************************!*\
  !*** ./src/app/pages/errseparacao/errseparacao.page.ts ***!
  \*********************************************************/
/*! exports provided: ErrseparacaoPage */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ErrseparacaoPage", function() { return ErrseparacaoPage; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm2015/core.js");
/* harmony import */ var _services_dados_sc_service__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../services/dados-sc.service */ "./src/app/pages/services/dados-sc.service.ts");
/* harmony import */ var _ionic_angular__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @ionic/angular */ "./node_modules/@ionic/angular/dist/fesm5.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/fesm2015/router.js");




//import da lib responsavel pelo recebimeto de parametros

let ErrseparacaoPage = class ErrseparacaoPage {
    constructor(navCtrl, service, route) {
        this.navCtrl = navCtrl;
        this.service = service;
        this.route = route;
        this.getDados();
    }
    getDados() {
        this.service.getErrseparacao().then((result) => {
            this.analises = result['erros'];
            console.log(result['erros']);
        }).catch((error) => {
            console.error("error: " + error);
        });
    }
    ngOnInit() {
    }
};
ErrseparacaoPage.ctorParameters = () => [
    { type: _ionic_angular__WEBPACK_IMPORTED_MODULE_3__["NavController"] },
    { type: _services_dados_sc_service__WEBPACK_IMPORTED_MODULE_2__["DadosSCService"] },
    { type: _angular_router__WEBPACK_IMPORTED_MODULE_4__["ActivatedRoute"] }
];
ErrseparacaoPage = tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"]([
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
        selector: 'app-errseparacao',
        template: __webpack_require__(/*! raw-loader!./errseparacao.page.html */ "./node_modules/raw-loader/index.js!./src/app/pages/errseparacao/errseparacao.page.html"),
        styles: [__webpack_require__(/*! ./errseparacao.page.scss */ "./src/app/pages/errseparacao/errseparacao.page.scss")]
    }),
    tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"]("design:paramtypes", [_ionic_angular__WEBPACK_IMPORTED_MODULE_3__["NavController"], _services_dados_sc_service__WEBPACK_IMPORTED_MODULE_2__["DadosSCService"], _angular_router__WEBPACK_IMPORTED_MODULE_4__["ActivatedRoute"]])
], ErrseparacaoPage);



/***/ })

}]);
//# sourceMappingURL=pages-errseparacao-errseparacao-module-es2015.js.map