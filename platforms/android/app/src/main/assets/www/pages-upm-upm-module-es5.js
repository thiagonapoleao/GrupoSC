(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["pages-upm-upm-module"],{

/***/ "./node_modules/raw-loader/index.js!./src/app/pages/upm/upm.page.html":
/*!*******************************************************************!*\
  !*** ./node_modules/raw-loader!./src/app/pages/upm/upm.page.html ***!
  \*******************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "<ion-header color=\"secondary\">\r\n  <ion-toolbar color=\"secondary\">\r\n    <ion-buttons slot=\"start\">\r\n      <ion-menu-button></ion-menu-button>\r\n    </ion-buttons>\r\n    <ion-title>\r\n      <span>Indicadores GrupoSC</span>\r\n    </ion-title>\r\n  </ion-toolbar>\r\n</ion-header>\r\n\r\n<ion-content>\r\n  <ion-card class=\"pincipal\">\r\n    <p>\r\n      <ion-card-subtitle style=\"text-align:center; color: aliceblue; font-size: 16px\">Analise da UPM\r\n      </ion-card-subtitle>\r\n    </p>\r\n    <ion-item class=\"top\">\r\n      <ion-label>UPM</ion-label>\r\n      <ion-button color=\"danger\" class=\"menu\">Meta Mensal</ion-button>\r\n      <ion-button color=\"danger\" class=\"menu\">UPM</ion-button>\r\n      <ion-button color=\"danger\" class=\"menu\">Erros</ion-button>\r\n    </ion-item>\r\n    <P>\r\n      <p>\r\n        <ion-item *ngFor=\"let upm of upms\">\r\n          <ion-label>{{upm.indicador}}</ion-label>\r\n          <ion-button>{{upm.meta}}</ion-button>\r\n          <ion-button>{{upm.upm}}</ion-button>\r\n          <ion-button>{{upm.erros}}</ion-button>\r\n        </ion-item>\r\n\r\n      </p>\r\n\r\n  </ion-card>\r\n</ion-content>"

/***/ }),

/***/ "./src/app/pages/upm/upm.module.ts":
/*!*****************************************!*\
  !*** ./src/app/pages/upm/upm.module.ts ***!
  \*****************************************/
/*! exports provided: UpmPageModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "UpmPageModule", function() { return UpmPageModule; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/fesm5/common.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/fesm5/forms.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/fesm5/router.js");
/* harmony import */ var _ionic_angular__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @ionic/angular */ "./node_modules/@ionic/angular/dist/fesm5.js");
/* harmony import */ var _upm_page__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./upm.page */ "./src/app/pages/upm/upm.page.ts");







var routes = [
    {
        path: '',
        component: _upm_page__WEBPACK_IMPORTED_MODULE_6__["UpmPage"]
    }
];
var UpmPageModule = /** @class */ (function () {
    function UpmPageModule() {
    }
    UpmPageModule = tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"]([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["NgModule"])({
            imports: [
                _angular_common__WEBPACK_IMPORTED_MODULE_2__["CommonModule"],
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormsModule"],
                _ionic_angular__WEBPACK_IMPORTED_MODULE_5__["IonicModule"],
                _angular_router__WEBPACK_IMPORTED_MODULE_4__["RouterModule"].forChild(routes)
            ],
            declarations: [_upm_page__WEBPACK_IMPORTED_MODULE_6__["UpmPage"]]
        })
    ], UpmPageModule);
    return UpmPageModule;
}());



/***/ }),

/***/ "./src/app/pages/upm/upm.page.scss":
/*!*****************************************!*\
  !*** ./src/app/pages/upm/upm.page.scss ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = ".pincipal ion-slides {\n  height: 7%;\n}\n.pincipal span {\n  color: #ffffff;\n}\n.pincipal ion-item {\n  --border-radius: 5px;\n}\n.pincipal ion-label {\n  font-size: 12px;\n  white-space: pre-line;\n}\n.pincipal ion-button {\n  width: 90;\n  height: 100;\n  max-height: 40px;\n  min-height: 40px;\n  max-width: 60px;\n  min-width: 60px;\n  font-size: 12px;\n  white-space: pre-line;\n  --border-radius: 6px;\n}\n.pincipal .menu {\n  font-size: 9px;\n}\nion-content {\n  --background: url(\"/assets/img/GrupoSC-d.png\") 0 0/100% 100% no-repeat;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvcGFnZXMvdXBtL0M6XFxEZXNlbnZvbHZpbWVudG9cXFRDQ1xcVjAwXFxHcnVwb1NDL3NyY1xcYXBwXFxwYWdlc1xcdXBtXFx1cG0ucGFnZS5zY3NzIiwic3JjL2FwcC9wYWdlcy91cG0vdXBtLnBhZ2Uuc2NzcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFFSTtFQUNJLFVBQUE7QUNEUjtBRElJO0VBQ0ksY0FBQTtBQ0ZSO0FETUk7RUFDSSxvQkFBQTtBQ0pSO0FET0k7RUFDSSxlQUFBO0VBQ0EscUJBQUE7QUNMUjtBRFFJO0VBQ0ksU0FBQTtFQUNBLFdBQUE7RUFDQSxnQkFBQTtFQUNBLGdCQUFBO0VBQ0EsZUFBQTtFQUNBLGVBQUE7RUFDQSxlQUFBO0VBQ0EscUJBQUE7RUFDQSxvQkFBQTtBQ05SO0FEU0U7RUFDRSxjQUFBO0FDUEo7QURZQTtFQUNJLHNFQUFBO0FDVEoiLCJmaWxlIjoic3JjL2FwcC9wYWdlcy91cG0vdXBtLnBhZ2Uuc2NzcyIsInNvdXJjZXNDb250ZW50IjpbIi5waW5jaXBhbCB7XHJcblxyXG4gICAgaW9uLXNsaWRlcyB7XHJcbiAgICAgICAgaGVpZ2h0OiA3JTsgICAgICAgICAgICAgICAgXHJcbiAgICB9XHJcblxyXG4gICAgc3BhbiB7XHJcbiAgICAgICAgY29sb3I6ICNmZmZmZmY7ICAgXHJcbiAgICAgICAgXHJcbiAgICB9XHJcbiAgICBcclxuICAgIGlvbi1pdGVtIHsgIFxyXG4gICAgICAgIC0tYm9yZGVyLXJhZGl1czogNXB4OyAgICAgICAgICAgICBcclxuICAgIH1cclxuXHJcbiAgICBpb24tbGFiZWwge1xyXG4gICAgICAgIGZvbnQtc2l6ZTogMTJweDtcclxuICAgICAgICB3aGl0ZS1zcGFjZTogcHJlLWxpbmU7ICAgXHJcbiAgICB9XHJcblxyXG4gICAgaW9uLWJ1dHRvbiB7XHJcbiAgICAgICAgd2lkdGg6OTA7XHJcbiAgICAgICAgaGVpZ2h0OjEwMDtcclxuICAgICAgICBtYXgtaGVpZ2h0OiA0MHB4O1xyXG4gICAgICAgIG1pbi1oZWlnaHQ6IDQwcHg7XHJcbiAgICAgICAgbWF4LXdpZHRoOiA2MHB4O1xyXG4gICAgICAgIG1pbi13aWR0aDogNjBweDtcclxuICAgICAgICBmb250LXNpemU6IDEycHg7XHJcbiAgICAgICAgd2hpdGUtc3BhY2U6IHByZS1saW5lOyAgICAgICAgICAgIFxyXG4gICAgICAgIC0tYm9yZGVyLXJhZGl1czogNnB4OyAgICAgXHJcbiAgICB9XHJcblxyXG4gIC5tZW51IHtcclxuICAgIGZvbnQtc2l6ZTogOXB4O1xyXG4gIH1cclxuICAgICAgICBcclxufVxyXG5cclxuaW9uLWNvbnRlbnQge1xyXG4gICAgLS1iYWNrZ3JvdW5kOiB1cmwoJy9hc3NldHMvaW1nL0dydXBvU0MtZC5wbmcnKSAwIDAvMTAwJSAxMDAlIG5vLXJlcGVhdDtcclxuICAgIC8vIGJhY2tncm91bmQtcmVwZWF0OiBuby1yZXBlYXQ7ICAgIFxyXG4gICAgLy8gYmFja2dyb3VuZC1zaXplOiBjb3ZlciA7XHJcbn1cclxuICAgIFxyXG4gICAgICAiLCIucGluY2lwYWwgaW9uLXNsaWRlcyB7XG4gIGhlaWdodDogNyU7XG59XG4ucGluY2lwYWwgc3BhbiB7XG4gIGNvbG9yOiAjZmZmZmZmO1xufVxuLnBpbmNpcGFsIGlvbi1pdGVtIHtcbiAgLS1ib3JkZXItcmFkaXVzOiA1cHg7XG59XG4ucGluY2lwYWwgaW9uLWxhYmVsIHtcbiAgZm9udC1zaXplOiAxMnB4O1xuICB3aGl0ZS1zcGFjZTogcHJlLWxpbmU7XG59XG4ucGluY2lwYWwgaW9uLWJ1dHRvbiB7XG4gIHdpZHRoOiA5MDtcbiAgaGVpZ2h0OiAxMDA7XG4gIG1heC1oZWlnaHQ6IDQwcHg7XG4gIG1pbi1oZWlnaHQ6IDQwcHg7XG4gIG1heC13aWR0aDogNjBweDtcbiAgbWluLXdpZHRoOiA2MHB4O1xuICBmb250LXNpemU6IDEycHg7XG4gIHdoaXRlLXNwYWNlOiBwcmUtbGluZTtcbiAgLS1ib3JkZXItcmFkaXVzOiA2cHg7XG59XG4ucGluY2lwYWwgLm1lbnUge1xuICBmb250LXNpemU6IDlweDtcbn1cblxuaW9uLWNvbnRlbnQge1xuICAtLWJhY2tncm91bmQ6IHVybChcIi9hc3NldHMvaW1nL0dydXBvU0MtZC5wbmdcIikgMCAwLzEwMCUgMTAwJSBuby1yZXBlYXQ7XG59Il19 */"

/***/ }),

/***/ "./src/app/pages/upm/upm.page.ts":
/*!***************************************!*\
  !*** ./src/app/pages/upm/upm.page.ts ***!
  \***************************************/
/*! exports provided: UpmPage */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "UpmPage", function() { return UpmPage; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _services_dados_sc_service__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../services/dados-sc.service */ "./src/app/pages/services/dados-sc.service.ts");
/* harmony import */ var _ionic_angular__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @ionic/angular */ "./node_modules/@ionic/angular/dist/fesm5.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/fesm5/router.js");





var UpmPage = /** @class */ (function () {
    function UpmPage(navCtrl, service, route) {
        this.navCtrl = navCtrl;
        this.service = service;
        this.route = route;
        this.getDados();
    }
    UpmPage.prototype.getDados = function () {
        var _this = this;
        this.service.getUpm().then(function (result) {
            _this.upms = result['upms'];
        }).catch(function (error) {
            console.error("error: " + error);
        });
    };
    UpmPage.prototype.ngOnInit = function () {
    };
    UpmPage.ctorParameters = function () { return [
        { type: _ionic_angular__WEBPACK_IMPORTED_MODULE_3__["NavController"] },
        { type: _services_dados_sc_service__WEBPACK_IMPORTED_MODULE_2__["DadosSCService"] },
        { type: _angular_router__WEBPACK_IMPORTED_MODULE_4__["ActivatedRoute"] }
    ]; };
    UpmPage = tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"]([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: 'app-upm',
            template: __webpack_require__(/*! raw-loader!./upm.page.html */ "./node_modules/raw-loader/index.js!./src/app/pages/upm/upm.page.html"),
            styles: [__webpack_require__(/*! ./upm.page.scss */ "./src/app/pages/upm/upm.page.scss")]
        }),
        tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"]("design:paramtypes", [_ionic_angular__WEBPACK_IMPORTED_MODULE_3__["NavController"], _services_dados_sc_service__WEBPACK_IMPORTED_MODULE_2__["DadosSCService"], _angular_router__WEBPACK_IMPORTED_MODULE_4__["ActivatedRoute"]])
    ], UpmPage);
    return UpmPage;
}());



/***/ })

}]);
//# sourceMappingURL=pages-upm-upm-module-es5.js.map