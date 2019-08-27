(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["pages-conferencia-conferencia-module"],{

/***/ "./node_modules/raw-loader/index.js!./src/app/pages/conferencia/conferencia.page.html":
/*!***********************************************************************************!*\
  !*** ./node_modules/raw-loader!./src/app/pages/conferencia/conferencia.page.html ***!
  \***********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "\r\n\r\n  <ion-header color=\"secondary\">\r\n    <ion-toolbar color=\"secondary\">\r\n      <ion-buttons slot=\"start\">\r\n        <ion-menu-button></ion-menu-button>\r\n      </ion-buttons>\r\n      <ion-title>\r\n        <span>Indicadores GrupoSC</span>\r\n      </ion-title>\r\n    </ion-toolbar>\r\n  </ion-header>\r\n  \r\n    <ion-content>\r\n    <ion-card class=\"pincipal\">\r\n      <p>\r\n        <ion-card-subtitle style=\"text-align:center; color: aliceblue; font-size: 16px\">Analise da Produção por\r\n          Conferente</ion-card-subtitle>\r\n      </p>\r\n      <ion-item class=\"top\">\r\n        <ion-label>Conferente</ion-label>\r\n        <ion-button color=\"danger\" class=\"menu\">Unidades</ion-button>\r\n        <ion-button color=\"danger\" class=\"menu\">Media</ion-button>\r\n        <ion-button color=\"danger\" class=\"menu\">% da Meta</ion-button>\r\n      </ion-item>\r\n  \r\n        <p>\r\n          <ion-item *ngFor=\"let analise of analises\">\r\n            <ion-label>{{analise.nome}}</ion-label>\r\n            <ion-button>{{analise.total}}</ion-button>\r\n            <ion-button>{{analise.media}}</ion-button>\r\n            <ion-button>{{analise.porcen}}</ion-button>\r\n          </ion-item>\r\n        </p>\r\n\r\n    </ion-card>  \r\n</ion-content>"

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

module.exports = ".pincipal ion-slides {\n  height: 7%;\n}\n.pincipal span {\n  color: #ffffff;\n}\n.pincipal ion-item {\n  --border-radius: 5px;\n}\n.pincipal ion-label {\n  font-size: 12px;\n  white-space: pre-line;\n}\n.pincipal ion-button {\n  width: 90;\n  height: 100;\n  max-height: 40px;\n  min-height: 40px;\n  max-width: 60px;\n  min-width: 60px;\n  font-size: 12px;\n  white-space: pre-line;\n  --border-radius: 6px;\n}\n.pincipal .menu {\n  font-size: 9px;\n}\nion-content {\n  --background: url(\"/assets/img/GrupoSC-d.png\") 0 0/100% 100% no-repeat;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvcGFnZXMvY29uZmVyZW5jaWEvQzpcXERlc2Vudm9sdmltZW50b1xcVENDXFxWMDBcXEdydXBvU0Mvc3JjXFxhcHBcXHBhZ2VzXFxjb25mZXJlbmNpYVxcY29uZmVyZW5jaWEucGFnZS5zY3NzIiwic3JjL2FwcC9wYWdlcy9jb25mZXJlbmNpYS9jb25mZXJlbmNpYS5wYWdlLnNjc3MiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBRUk7RUFDSSxVQUFBO0FDRFI7QURJSTtFQUNJLGNBQUE7QUNGUjtBRE1JO0VBQ0ksb0JBQUE7QUNKUjtBRE9JO0VBQ0ksZUFBQTtFQUNBLHFCQUFBO0FDTFI7QURRSTtFQUNJLFNBQUE7RUFDQSxXQUFBO0VBQ0EsZ0JBQUE7RUFDQSxnQkFBQTtFQUNBLGVBQUE7RUFDQSxlQUFBO0VBQ0EsZUFBQTtFQUNBLHFCQUFBO0VBQ0Esb0JBQUE7QUNOUjtBRFNFO0VBQ0UsY0FBQTtBQ1BKO0FEWUE7RUFDSSxzRUFBQTtBQ1RKIiwiZmlsZSI6InNyYy9hcHAvcGFnZXMvY29uZmVyZW5jaWEvY29uZmVyZW5jaWEucGFnZS5zY3NzIiwic291cmNlc0NvbnRlbnQiOlsiLnBpbmNpcGFsIHtcclxuXHJcbiAgICBpb24tc2xpZGVzIHtcclxuICAgICAgICBoZWlnaHQ6IDclOyAgICAgICAgICAgICAgICBcclxuICAgIH1cclxuXHJcbiAgICBzcGFuIHtcclxuICAgICAgICBjb2xvcjogI2ZmZmZmZjsgICBcclxuICAgICAgICBcclxuICAgIH1cclxuICAgIFxyXG4gICAgaW9uLWl0ZW0geyAgXHJcbiAgICAgICAgLS1ib3JkZXItcmFkaXVzOiA1cHg7ICAgICAgICAgICAgIFxyXG4gICAgfVxyXG5cclxuICAgIGlvbi1sYWJlbCB7XHJcbiAgICAgICAgZm9udC1zaXplOiAxMnB4O1xyXG4gICAgICAgIHdoaXRlLXNwYWNlOiBwcmUtbGluZTsgICBcclxuICAgIH1cclxuXHJcbiAgICBpb24tYnV0dG9uIHtcclxuICAgICAgICB3aWR0aDo5MDtcclxuICAgICAgICBoZWlnaHQ6MTAwO1xyXG4gICAgICAgIG1heC1oZWlnaHQ6IDQwcHg7XHJcbiAgICAgICAgbWluLWhlaWdodDogNDBweDtcclxuICAgICAgICBtYXgtd2lkdGg6IDYwcHg7XHJcbiAgICAgICAgbWluLXdpZHRoOiA2MHB4O1xyXG4gICAgICAgIGZvbnQtc2l6ZTogMTJweDtcclxuICAgICAgICB3aGl0ZS1zcGFjZTogcHJlLWxpbmU7ICAgICAgICAgICAgXHJcbiAgICAgICAgLS1ib3JkZXItcmFkaXVzOiA2cHg7ICAgICBcclxuICAgIH1cclxuXHJcbiAgLm1lbnUge1xyXG4gICAgZm9udC1zaXplOiA5cHg7XHJcbiAgfVxyXG4gICAgICAgIFxyXG59XHJcblxyXG5pb24tY29udGVudCB7XHJcbiAgICAtLWJhY2tncm91bmQ6IHVybCgnL2Fzc2V0cy9pbWcvR3J1cG9TQy1kLnBuZycpIDAgMC8xMDAlIDEwMCUgbm8tcmVwZWF0O1xyXG4gICAgLy8gYmFja2dyb3VuZC1yZXBlYXQ6IG5vLXJlcGVhdDsgICAgXHJcbiAgICAvLyBiYWNrZ3JvdW5kLXNpemU6IGNvdmVyIDtcclxufVxyXG4gICAgXHJcbiAgICAgICIsIi5waW5jaXBhbCBpb24tc2xpZGVzIHtcbiAgaGVpZ2h0OiA3JTtcbn1cbi5waW5jaXBhbCBzcGFuIHtcbiAgY29sb3I6ICNmZmZmZmY7XG59XG4ucGluY2lwYWwgaW9uLWl0ZW0ge1xuICAtLWJvcmRlci1yYWRpdXM6IDVweDtcbn1cbi5waW5jaXBhbCBpb24tbGFiZWwge1xuICBmb250LXNpemU6IDEycHg7XG4gIHdoaXRlLXNwYWNlOiBwcmUtbGluZTtcbn1cbi5waW5jaXBhbCBpb24tYnV0dG9uIHtcbiAgd2lkdGg6IDkwO1xuICBoZWlnaHQ6IDEwMDtcbiAgbWF4LWhlaWdodDogNDBweDtcbiAgbWluLWhlaWdodDogNDBweDtcbiAgbWF4LXdpZHRoOiA2MHB4O1xuICBtaW4td2lkdGg6IDYwcHg7XG4gIGZvbnQtc2l6ZTogMTJweDtcbiAgd2hpdGUtc3BhY2U6IHByZS1saW5lO1xuICAtLWJvcmRlci1yYWRpdXM6IDZweDtcbn1cbi5waW5jaXBhbCAubWVudSB7XG4gIGZvbnQtc2l6ZTogOXB4O1xufVxuXG5pb24tY29udGVudCB7XG4gIC0tYmFja2dyb3VuZDogdXJsKFwiL2Fzc2V0cy9pbWcvR3J1cG9TQy1kLnBuZ1wiKSAwIDAvMTAwJSAxMDAlIG5vLXJlcGVhdDtcbn0iXX0= */"

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