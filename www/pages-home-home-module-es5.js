(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["pages-home-home-module"],{

/***/ "./node_modules/raw-loader/index.js!./src/app/pages/home/home.page.html":
/*!*********************************************************************!*\
  !*** ./node_modules/raw-loader!./src/app/pages/home/home.page.html ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "<ion-header>\r\n  <ion-toolbar color=\"secondary\">\r\n    <ion-buttons slot=\"start\">\r\n      <ion-menu-button></ion-menu-button>\r\n    </ion-buttons>\r\n    <ion-title>\r\n      <span>Indicadores GrupoSC</span>\r\n    </ion-title>\r\n  </ion-toolbar>\r\n</ion-header>\r\n\r\n<ion-content>\r\n  <div class=\"pincipal\">\r\n    <ion-card>\r\n      <ion-item class=\"top\">\r\n        <ion-label>Indicador</ion-label>\r\n        <ion-button color=\"danger\" class=\"menu\">Meta Mensal</ion-button>\r\n        <ion-button color=\"danger\" class=\"menu\">Meta Até o Período</ion-button>\r\n        <ion-button color=\"danger\" class=\"menu\">Real Até o Período</ion-button>\r\n        <ion-button color=\"danger\" class=\"menu\">VAR% até o Período</ion-button>\r\n      </ion-item>\r\n\r\n      <P>\r\n        <ion-item>\r\n          <ion-label>Quebras GMD + CRI</ion-label>\r\n          <ion-button>{{upmTotal?.meta}}</ion-button>\r\n          <ion-button>{{upmTotal?.meta}}</ion-button>\r\n          <ion-button>{{upmTotal?.upm}}</ion-button>\r\n          <ion-button>{{upmTotal?.porcen}}</ion-button>\r\n        </ion-item>\r\n      </P>\r\n      <P>\r\n        <ion-item>\r\n          <ion-label>Chegadas CD</ion-label>\r\n          <ion-button>{{upmLinha?.meta}}</ion-button>\r\n          <ion-button>{{upmLinha?.meta}}</ion-button>\r\n          <ion-button>{{upmLinha?.upm}}</ion-button>\r\n          <ion-button>{{upmLinha?.porcen}}</ion-button>\r\n        </ion-item>\r\n      </P>\r\n      <P>\r\n        <ion-item>\r\n          <ion-label>Saídas CD</ion-label>\r\n          <ion-button>{{upmPsico?.meta}}</ion-button>\r\n          <ion-button>{{upmPsico?.meta}}</ion-button>\r\n          <ion-button>{{upmPsico?.upm}}</ion-button>\r\n          <ion-button>{{upmPsico?.porcen}}</ion-button>\r\n        </ion-item>\r\n      </P>\r\n      <P>\r\n        <ion-item>\r\n          <ion-label>Cancelamento Total</ion-label>\r\n          <ion-button>0.05%</ion-button>\r\n          <ion-button>0.25%</ion-button>\r\n          <ion-button>0.05%</ion-button>\r\n          <ion-button>0.05%</ion-button>\r\n        </ion-item>\r\n      </P>\r\n      <P>\r\n        <ion-item>\r\n          <ion-label>Cancelamento Operacional</ion-label>\r\n          <ion-button>0.05%</ion-button>\r\n          <ion-button>0.25%</ion-button>\r\n          <ion-button>0.05%</ion-button>\r\n          <ion-button>0.05%</ion-button>\r\n        </ion-item>\r\n      </P>\r\n      <P>\r\n        <ion-item>\r\n          <ion-label>Cancelamento Comercial</ion-label>\r\n          <ion-button>0.05%</ion-button>\r\n          <ion-button>0.25%</ion-button>\r\n          <ion-button>0.05%</ion-button>\r\n          <ion-button>0.05%</ion-button>\r\n        </ion-item>\r\n      </P>\r\n      <P>\r\n        <ion-item>\r\n          <ion-label>Devolução Total WEB + BO</ion-label>\r\n          <ion-button>{{upmTotal?.meta}}</ion-button>\r\n          <ion-button>{{upmTotal?.meta}}</ion-button>\r\n          <ion-button>{{upmTotal?.upm}}</ion-button>\r\n          <ion-button>{{upmTotal?.porcen}}</ion-button>\r\n        </ion-item>\r\n      </P>\r\n      <P>\r\n        <ion-item>\r\n          <ion-label>Devolução (BO Log)</ion-label>\r\n          <ion-button>{{upmLinha?.meta}}</ion-button>\r\n          <ion-button>{{upmLinha?.meta}}</ion-button>\r\n          <ion-button>{{upmLinha?.upm}}</ion-button>\r\n          <ion-button>{{upmLinha?.porcen}}</ion-button>\r\n        </ion-item>\r\n      </P>\r\n      <P>\r\n        <ion-item>\r\n          <ion-label>Devolução (BI Com)</ion-label>\r\n          <ion-button>{{upmPsico?.meta}}</ion-button>\r\n          <ion-button>{{upmPsico?.meta}}</ion-button>\r\n          <ion-button>{{upmPsico?.upm}}</ion-button>\r\n          <ion-button>{{upmPsico?.porcen}}</ion-button>\r\n        </ion-item>\r\n      </P>\r\n      <P>\r\n        <ion-item>\r\n          <ion-label>Devolução (WEB)</ion-label>\r\n          <ion-button>0.05%</ion-button>\r\n          <ion-button>0.25%</ion-button>\r\n          <ion-button>0.05%</ion-button>\r\n          <ion-button>0.05%</ion-button>\r\n        </ion-item>\r\n      </P>\r\n      <P>\r\n        <ion-item>\r\n          <ion-label>Bloqueio</ion-label>\r\n          <ion-button>0.05%</ion-button>\r\n          <ion-button>0.25%</ion-button>\r\n          <ion-button>0.05%</ion-button>\r\n          <ion-button>0.05%</ion-button>\r\n        </ion-item>\r\n      </P>\r\n      <P>\r\n        <ion-item>\r\n          <ion-label>Lead Time Interno Total (visão CD)</ion-label>\r\n          <ion-button>0.05%</ion-button>\r\n          <ion-button>0.25%</ion-button>\r\n          <ion-button>0.05%</ion-button>\r\n          <ion-button>0.05%</ion-button>\r\n        </ion-item>\r\n      </P>\r\n      <P>\r\n        <ion-item>\r\n          <ion-label [routerLink]=\"['/upm']\">UPM Separação Total</ion-label>\r\n          <ion-button>{{upmTotal?.meta}}</ion-button>\r\n          <ion-button>{{upmTotal?.meta}}</ion-button>\r\n          <ion-button>{{upmTotal?.upm}}</ion-button>\r\n          <ion-button>{{upmTotal?.porcen}}</ion-button>\r\n        </ion-item>\r\n      </P>\r\n      <P>\r\n        <ion-item>\r\n          <ion-label>UPM Auditoria Total</ion-label>\r\n          <ion-button>{{upmLinha?.meta}}</ion-button>\r\n          <ion-button>{{upmLinha?.meta}}</ion-button>\r\n          <ion-button>{{upmLinha?.upm}}</ion-button>\r\n          <ion-button>{{upmLinha?.porcen}}</ion-button>\r\n        </ion-item>\r\n      </P>\r\n      <P>\r\n        <ion-item>\r\n          <ion-label>UPM Separação Linha</ion-label>\r\n          <ion-button>{{upmLinha?.meta}}</ion-button>\r\n          <ion-button>{{upmLinha?.meta}}</ion-button>\r\n          <ion-button>{{upmLinha?.upm}}</ion-button>\r\n          <ion-button>{{upmLinha?.porcen}}</ion-button>\r\n        </ion-item>\r\n      </P>\r\n      <P>\r\n        <ion-item>\r\n          <ion-label>UPM Auditoria linha</ion-label>\r\n          <ion-button>{{upmLinha?.meta}}</ion-button>\r\n          <ion-button>{{upmLinha?.meta}}</ion-button>\r\n          <ion-button>{{upmLinha?.upm}}</ion-button>\r\n          <ion-button>{{upmLinha?.porcen}}</ion-button>\r\n        </ion-item>\r\n      </P>\r\n      <P>\r\n        <ion-item>\r\n          <ion-label>UPM Separação Psico</ion-label>\r\n          <ion-button>{{upmPsico?.meta}}</ion-button>\r\n          <ion-button>{{upmPsico?.meta}}</ion-button>\r\n          <ion-button>{{upmPsico?.upm}}</ion-button>\r\n          <ion-button>{{upmPsico?.porcen}}</ion-button>\r\n        </ion-item>\r\n      </P>\r\n      <P>\r\n        <ion-item>\r\n          <ion-label>UPM Auditoria Psico </ion-label>\r\n          <ion-button>{{upmPsico?.meta}}</ion-button>\r\n          <ion-button>{{upmPsico?.meta}}</ion-button>\r\n          <ion-button>{{upmPsico?.upm}}</ion-button>\r\n          <ion-button>{{upmPsico?.porcen}}</ion-button>\r\n        </ion-item>\r\n      </P>\r\n      <P>\r\n        <ion-item>\r\n          <ion-label>Acuracidade Lote</ion-label>\r\n          <ion-button>0.05%</ion-button>\r\n          <ion-button>0.25%</ion-button>\r\n          <ion-button>0.05%</ion-button>\r\n          <ion-button>0.05%</ion-button>\r\n        </ion-item>\r\n      </P>\r\n      <P>\r\n        <ion-item>\r\n          <ion-label>FEFO - Reposição Lote Antigo</ion-label>\r\n          <ion-button>0.05%</ion-button>\r\n          <ion-button>0.25%</ion-button>\r\n          <ion-button>0.05%</ion-button>\r\n          <ion-button>0.05%</ion-button>\r\n        </ion-item>\r\n      </P>\r\n      <P>\r\n        <ion-item>\r\n          <ion-label>Unidades Vendidas Total</ion-label>\r\n          <ion-button>0.05%</ion-button>\r\n          <ion-button>0.25%</ion-button>\r\n          <ion-button>0.05%</ion-button>\r\n          <ion-button>0.05%</ion-button>\r\n        </ion-item>\r\n      </P>\r\n      <P>\r\n        <ion-item>\r\n          <ion-label>Venda</ion-label>\r\n          <ion-button>0.05%</ion-button>\r\n          <ion-button>0.25%</ion-button>\r\n          <ion-button>0.05%</ion-button>\r\n          <ion-button>0.05%</ion-button>\r\n        </ion-item>\r\n      </P>\r\n\r\n\r\n    </ion-card>\r\n  </div>\r\n</ion-content>"

/***/ }),

/***/ "./src/app/pages/home/home.module.ts":
/*!*******************************************!*\
  !*** ./src/app/pages/home/home.module.ts ***!
  \*******************************************/
/*! exports provided: HomePageModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "HomePageModule", function() { return HomePageModule; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/fesm5/common.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/fesm5/forms.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/fesm5/router.js");
/* harmony import */ var _ionic_angular__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @ionic/angular */ "./node_modules/@ionic/angular/dist/fesm5.js");
/* harmony import */ var _home_page__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./home.page */ "./src/app/pages/home/home.page.ts");







var routes = [
    {
        path: '',
        component: _home_page__WEBPACK_IMPORTED_MODULE_6__["HomePage"]
    }
];
var HomePageModule = /** @class */ (function () {
    function HomePageModule() {
    }
    HomePageModule = tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"]([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["NgModule"])({
            imports: [
                _angular_common__WEBPACK_IMPORTED_MODULE_2__["CommonModule"],
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormsModule"],
                _ionic_angular__WEBPACK_IMPORTED_MODULE_5__["IonicModule"],
                _angular_router__WEBPACK_IMPORTED_MODULE_4__["RouterModule"].forChild(routes)
            ],
            declarations: [_home_page__WEBPACK_IMPORTED_MODULE_6__["HomePage"]]
        })
    ], HomePageModule);
    return HomePageModule;
}());



/***/ }),

/***/ "./src/app/pages/home/home.page.scss":
/*!*******************************************!*\
  !*** ./src/app/pages/home/home.page.scss ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = ".pincipal {\n  position: absolute;\n  left: 0;\n  right: 0;\n  bottom: 0;\n  height: 100%;\n}\n.pincipal ion-slides {\n  height: 10%;\n}\n.pincipal span {\n  color: #ffffff;\n}\n.pincipal ion-item {\n  --border-radius: 5px;\n}\n.pincipal ion-label {\n  font-size: 12px;\n  white-space: pre-line;\n}\n.pincipal ion-button {\n  width: 90;\n  height: 100;\n  max-height: 40px;\n  min-height: 40px;\n  max-width: 50px;\n  min-width: 50px;\n  font-size: 12px;\n  white-space: pre-line;\n  --border-radius: 6px;\n}\n.pincipal .menu {\n  font-size: 9px;\n}\nion-content {\n  --background: url(\"/assets/img/GrupoSC-d.png\") 0 0/100% 100% no-repeat;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvcGFnZXMvaG9tZS9DOlxcRGVzZW52b2x2aW1lbnRvXFxUQ0NcXFYwMFxcR3J1cG9TQy9zcmNcXGFwcFxccGFnZXNcXGhvbWVcXGhvbWUucGFnZS5zY3NzIiwic3JjL2FwcC9wYWdlcy9ob21lL2hvbWUucGFnZS5zY3NzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBO0VBRUksa0JBQUE7RUFDQSxPQUFBO0VBQ0EsUUFBQTtFQUNBLFNBQUE7RUFDQSxZQUFBO0FDQUo7QURFUTtFQUNJLFdBQUE7QUNBWjtBREdRO0VBQ0ksY0FBQTtBQ0RaO0FES1E7RUFDSSxvQkFBQTtBQ0haO0FEU1E7RUFDSSxlQUFBO0VBQ0EscUJBQUE7QUNQWjtBRFVRO0VBQ0ksU0FBQTtFQUNBLFdBQUE7RUFDQSxnQkFBQTtFQUNBLGdCQUFBO0VBQ0EsZUFBQTtFQUNBLGVBQUE7RUFDQSxlQUFBO0VBQ0EscUJBQUE7RUFDQSxvQkFBQTtBQ1JaO0FEV007RUFDRSxjQUFBO0FDVFI7QUQrQkE7RUFDSSxzRUFBQTtBQzVCSiIsImZpbGUiOiJzcmMvYXBwL3BhZ2VzL2hvbWUvaG9tZS5wYWdlLnNjc3MiLCJzb3VyY2VzQ29udGVudCI6WyIucGluY2lwYWwge1xyXG4gICAgXHJcbiAgICBwb3NpdGlvbjogYWJzb2x1dGU7XHJcbiAgICBsZWZ0OiAwO1xyXG4gICAgcmlnaHQ6IDA7XHJcbiAgICBib3R0b206IDA7XHJcbiAgICBoZWlnaHQ6IDEwMCU7ICBcclxuICAgIFxyXG4gICAgICAgIGlvbi1zbGlkZXMge1xyXG4gICAgICAgICAgICBoZWlnaHQ6IDEwJTsgICAgICAgICAgICAgICAgXHJcbiAgICAgICAgfVxyXG4gICAgXHJcbiAgICAgICAgc3BhbiB7XHJcbiAgICAgICAgICAgIGNvbG9yOiAjZmZmZmZmOyAgIFxyXG4gICAgICAgICAgICBcclxuICAgICAgICB9XHJcbiAgICAgICAgXHJcbiAgICAgICAgaW9uLWl0ZW0geyAgXHJcbiAgICAgICAgICAgIC0tYm9yZGVyLXJhZGl1czogNXB4OyAgXHJcbiAgICAgICAgICAgIFxyXG4gICAgICAgICAgICAgICAgICAgIFxyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICBcclxuICAgICAgICBpb24tbGFiZWwge1xyXG4gICAgICAgICAgICBmb250LXNpemU6IDEycHg7XHJcbiAgICAgICAgICAgIHdoaXRlLXNwYWNlOiBwcmUtbGluZTsgICBcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIGlvbi1idXR0b24ge1xyXG4gICAgICAgICAgICB3aWR0aDo5MDtcclxuICAgICAgICAgICAgaGVpZ2h0OjEwMDtcclxuICAgICAgICAgICAgbWF4LWhlaWdodDogNDBweDtcclxuICAgICAgICAgICAgbWluLWhlaWdodDogNDBweDtcclxuICAgICAgICAgICAgbWF4LXdpZHRoOiA1MHB4O1xyXG4gICAgICAgICAgICBtaW4td2lkdGg6IDUwcHg7XHJcbiAgICAgICAgICAgIGZvbnQtc2l6ZTogMTJweDtcclxuICAgICAgICAgICAgd2hpdGUtc3BhY2U6IHByZS1saW5lOyAgICAgICAgICAgIFxyXG4gICAgICAgICAgICAtLWJvcmRlci1yYWRpdXM6IDZweDsgICAgIFxyXG4gICAgICAgIH1cclxuXHJcbiAgICAgIC5tZW51IHtcclxuICAgICAgICBmb250LXNpemU6IDlweDtcclxuICAgICAgfVxyXG5cclxuICAgIC8vIGNhYmXDp2FsaG8gZGEgcGFnaW5hIGhvbWVcclxuICAgIC8vICAgLnRvcCB7XHJcbiAgICAvLyAgICAgcG9zaXRpb246IGZpeGVkO1xyXG4gICAgLy8gICAgIG1hcmdpbi1ib3R0b206IDQwcHggIWltcG9ydGFudDtcclxuICAgIC8vICAgICB6LWluZGV4OiA5OTk7XHJcbiAgICAgICAgXHJcbiAgICAvLyB9XHJcblxyXG4gICAgLy8gcHtcclxuICAgIC8vICAgICBtYXJnaW4tdG9wOiA2MHB4O1xyXG4gICAgLy8gICAgIG1hcmdpbi1ib3R0b206IC01MHB4O1xyXG4gICAgLy8gfVxyXG4gICAgXHJcbiAgICB9XHJcblxyXG5cclxuXHJcbiAgICBcclxuXHJcbmlvbi1jb250ZW50IHtcclxuICAgIC0tYmFja2dyb3VuZDogdXJsKCcvYXNzZXRzL2ltZy9HcnVwb1NDLWQucG5nJykgMCAwLzEwMCUgMTAwJSBuby1yZXBlYXQ7ICAgXHJcbn1cclxuICAgIFxyXG4gICAgICAiLCIucGluY2lwYWwge1xuICBwb3NpdGlvbjogYWJzb2x1dGU7XG4gIGxlZnQ6IDA7XG4gIHJpZ2h0OiAwO1xuICBib3R0b206IDA7XG4gIGhlaWdodDogMTAwJTtcbn1cbi5waW5jaXBhbCBpb24tc2xpZGVzIHtcbiAgaGVpZ2h0OiAxMCU7XG59XG4ucGluY2lwYWwgc3BhbiB7XG4gIGNvbG9yOiAjZmZmZmZmO1xufVxuLnBpbmNpcGFsIGlvbi1pdGVtIHtcbiAgLS1ib3JkZXItcmFkaXVzOiA1cHg7XG59XG4ucGluY2lwYWwgaW9uLWxhYmVsIHtcbiAgZm9udC1zaXplOiAxMnB4O1xuICB3aGl0ZS1zcGFjZTogcHJlLWxpbmU7XG59XG4ucGluY2lwYWwgaW9uLWJ1dHRvbiB7XG4gIHdpZHRoOiA5MDtcbiAgaGVpZ2h0OiAxMDA7XG4gIG1heC1oZWlnaHQ6IDQwcHg7XG4gIG1pbi1oZWlnaHQ6IDQwcHg7XG4gIG1heC13aWR0aDogNTBweDtcbiAgbWluLXdpZHRoOiA1MHB4O1xuICBmb250LXNpemU6IDEycHg7XG4gIHdoaXRlLXNwYWNlOiBwcmUtbGluZTtcbiAgLS1ib3JkZXItcmFkaXVzOiA2cHg7XG59XG4ucGluY2lwYWwgLm1lbnUge1xuICBmb250LXNpemU6IDlweDtcbn1cblxuaW9uLWNvbnRlbnQge1xuICAtLWJhY2tncm91bmQ6IHVybChcIi9hc3NldHMvaW1nL0dydXBvU0MtZC5wbmdcIikgMCAwLzEwMCUgMTAwJSBuby1yZXBlYXQ7XG59Il19 */"

/***/ }),

/***/ "./src/app/pages/home/home.page.ts":
/*!*****************************************!*\
  !*** ./src/app/pages/home/home.page.ts ***!
  \*****************************************/
/*! exports provided: HomePage */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "HomePage", function() { return HomePage; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _ionic_angular__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @ionic/angular */ "./node_modules/@ionic/angular/dist/fesm5.js");
/* harmony import */ var _services_dados_sc_service__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../services/dados-sc.service */ "./src/app/pages/services/dados-sc.service.ts");
/* harmony import */ var _upm_upm_model__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../upm/upm.model */ "./src/app/pages/upm/upm.model.ts");





var HomePage = /** @class */ (function () {
    function HomePage(service) {
        this.service = service;
        this.upmTotal = new _upm_upm_model__WEBPACK_IMPORTED_MODULE_4__["Upm"]();
        this.upmLinha = new _upm_upm_model__WEBPACK_IMPORTED_MODULE_4__["Upm"]();
        this.upmPsico = new _upm_upm_model__WEBPACK_IMPORTED_MODULE_4__["Upm"]();
    }
    HomePage.prototype.ngOnInit = function () {
        this.getDados();
        console.log;
    };
    HomePage.prototype.getDados = function () {
        var _this = this;
        this.service.getUpm().then(function (result) {
            _this.upms = result['upms'];
            console.log(_this.upms);
        }).catch(function (error) {
            console.error("error: " + error);
        }).finally(function () {
            _this.upms.forEach(function (u) {
                if (u.indicador == "Total") {
                    console.log(_this.upmTotal);
                    _this.upmTotal = u;
                }
                if (u.indicador == "Linha") {
                    console.log(_this.upmLinha);
                    _this.upmLinha = u;
                }
                if (u.indicador == "Psico") {
                    console.log(_this.upmPsico);
                    _this.upmPsico = u;
                }
            });
        });
    };
    HomePage.ctorParameters = function () { return [
        { type: _services_dados_sc_service__WEBPACK_IMPORTED_MODULE_3__["DadosSCService"] }
    ]; };
    tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"]([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["ViewChild"])(_ionic_angular__WEBPACK_IMPORTED_MODULE_2__["IonSlides"], { static: false }),
        tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"]("design:type", _ionic_angular__WEBPACK_IMPORTED_MODULE_2__["IonSlides"])
    ], HomePage.prototype, "slides", void 0);
    HomePage = tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"]([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: 'app-home',
            template: __webpack_require__(/*! raw-loader!./home.page.html */ "./node_modules/raw-loader/index.js!./src/app/pages/home/home.page.html"),
            styles: [__webpack_require__(/*! ./home.page.scss */ "./src/app/pages/home/home.page.scss")]
        }),
        tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"]("design:paramtypes", [_services_dados_sc_service__WEBPACK_IMPORTED_MODULE_3__["DadosSCService"]])
    ], HomePage);
    return HomePage;
}());



/***/ }),

/***/ "./src/app/pages/upm/upm.model.ts":
/*!****************************************!*\
  !*** ./src/app/pages/upm/upm.model.ts ***!
  \****************************************/
/*! exports provided: Upm */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Upm", function() { return Upm; });
var Upm = /** @class */ (function () {
    function Upm() {
    }
    return Upm;
}());



/***/ })

}]);
//# sourceMappingURL=pages-home-home-module-es5.js.map