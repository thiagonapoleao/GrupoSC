(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["pages-analiseprodconf-analiseprodconf-module"],{

/***/ "./node_modules/raw-loader/index.js!./src/app/pages/analiseprodconf/analiseprodconf.page.html":
/*!*******************************************************************************************!*\
  !*** ./node_modules/raw-loader!./src/app/pages/analiseprodconf/analiseprodconf.page.html ***!
  \*******************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "<ion-header color=\"tertiary\">\r\n  <ion-toolbar color=\"tertiary\">\r\n    <ion-buttons slot=\"start\">\r\n      <ion-menu-button></ion-menu-button>\r\n    </ion-buttons>\r\n    <ion-title>\r\n      <span>Indicadores GrupoSC</span>\r\n    </ion-title>\r\n  </ion-toolbar>\r\n</ion-header>\r\n\r\n<ion-content class=\"alto\">\r\n  <ion-card>\r\n    <p>\r\n      <ion-card-subtitle style=\"text-align:center; color: aliceblue; font-size: 16px\">Analise da Produção por\r\n        Conferente</ion-card-subtitle>\r\n    </p>\r\n  </ion-card>\r\n</ion-content>\r\n\r\n<ion-content class=\"baixo\">\r\n  <div class=\"pincipal\">\r\n\r\n    <ion-card>\r\n      <ion-list *ngFor=\"let analise of analises\">\r\n        <ion-item>\r\n          <!-- <ion-icon name=\"nome\" slot=\"start\"></ion-icon> -->\r\n          <ion-card-content>{{analise.nome}}</ion-card-content>\r\n        </ion-item>\r\n        <ion-item>\r\n          <ion-label>Total Conferido</ion-label>\r\n          <ion-card-content>{{analise.total}}</ion-card-content>\r\n        </ion-item>\r\n        <ion-item>\r\n          <ion-label>Media</ion-label>\r\n          <ion-card-content>{{analise.media}}</ion-card-content>\r\n        </ion-item>\r\n        <ion-item>\r\n          <ion-label>Produtividade</ion-label>\r\n          <ion-card-content>{{analise.porcen}}</ion-card-content>\r\n        </ion-item>\r\n      </ion-list>\r\n    </ion-card>\r\n  </div>\r\n</ion-content>"

/***/ }),

/***/ "./src/app/pages/analiseprodconf/analiseprodconf.module.ts":
/*!*****************************************************************!*\
  !*** ./src/app/pages/analiseprodconf/analiseprodconf.module.ts ***!
  \*****************************************************************/
/*! exports provided: AnaliseprodconfPageModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AnaliseprodconfPageModule", function() { return AnaliseprodconfPageModule; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm2015/core.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/fesm2015/common.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/fesm2015/forms.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/fesm2015/router.js");
/* harmony import */ var _ionic_angular__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @ionic/angular */ "./node_modules/@ionic/angular/dist/fesm5.js");
/* harmony import */ var _analiseprodconf_page__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./analiseprodconf.page */ "./src/app/pages/analiseprodconf/analiseprodconf.page.ts");







const routes = [
    {
        path: '',
        component: _analiseprodconf_page__WEBPACK_IMPORTED_MODULE_6__["AnaliseprodconfPage"]
    }
];
let AnaliseprodconfPageModule = class AnaliseprodconfPageModule {
};
AnaliseprodconfPageModule = tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"]([
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["NgModule"])({
        imports: [
            _angular_common__WEBPACK_IMPORTED_MODULE_2__["CommonModule"],
            _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormsModule"],
            _ionic_angular__WEBPACK_IMPORTED_MODULE_5__["IonicModule"],
            _angular_router__WEBPACK_IMPORTED_MODULE_4__["RouterModule"].forChild(routes)
        ],
        declarations: [_analiseprodconf_page__WEBPACK_IMPORTED_MODULE_6__["AnaliseprodconfPage"]]
    })
], AnaliseprodconfPageModule);



/***/ }),

/***/ "./src/app/pages/analiseprodconf/analiseprodconf.page.scss":
/*!*****************************************************************!*\
  !*** ./src/app/pages/analiseprodconf/analiseprodconf.page.scss ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = ".alto {\n  --background: url(\"/assets/img/GrupoSC-top13.png\") 0 0/100% 100% no-repeat;\n  max-height: 60px;\n}\n\n.pincipal {\n  background-color: #004B84;\n}\n\n.pincipal ion-list {\n  background-color: #004B84;\n}\n\n.pincipal ion-item {\n  --border-radius: 5px;\n  font-size: 16px;\n  white-space: pre-line;\n}\n\n.pincipal span {\n  color: #ffffff;\n}\n\n.baixo {\n  --background: url(\"/assets/img/GrupoSC-top13.png\") 0 0/100% 100% no-repeat;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvcGFnZXMvYW5hbGlzZXByb2Rjb25mL0M6XFxEZXNlbnZvbHZpbWVudG9cXFRDQ1xcVjAwXFxHcnVwb1NDL3NyY1xcYXBwXFxwYWdlc1xcYW5hbGlzZXByb2Rjb25mXFxhbmFsaXNlcHJvZGNvbmYucGFnZS5zY3NzIiwic3JjL2FwcC9wYWdlcy9hbmFsaXNlcHJvZGNvbmYvYW5hbGlzZXByb2Rjb25mLnBhZ2Uuc2NzcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtFQUNFLDBFQUFBO0VBQ0EsZ0JBQUE7QUNDRjs7QURHQTtFQUNFLHlCQUFBO0FDQUY7O0FERUE7RUFDUSx5QkFBQTtBQ0FSOztBRElBO0VBQ0Usb0JBQUE7RUFDQSxlQUFBO0VBQ0EscUJBQUE7QUNGRjs7QURLSTtFQUNJLGNBQUE7QUNIUjs7QURRQTtFQUNFLDBFQUFBO0FDTEYiLCJmaWxlIjoic3JjL2FwcC9wYWdlcy9hbmFsaXNlcHJvZGNvbmYvYW5hbGlzZXByb2Rjb25mLnBhZ2Uuc2NzcyIsInNvdXJjZXNDb250ZW50IjpbIi5hbHRvIHtcclxuICAtLWJhY2tncm91bmQ6IHVybCgnL2Fzc2V0cy9pbWcvR3J1cG9TQy10b3AxMy5wbmcnKSAwIDAvMTAwJSAxMDAlIG5vLXJlcGVhdDtcclxuICBtYXgtaGVpZ2h0OiA2MHB4O1xyXG5cclxufVxyXG5cclxuLnBpbmNpcGFsIHtcclxuICBiYWNrZ3JvdW5kLWNvbG9yOiAgIzAwNEI4NDtcclxuXHJcbmlvbi1saXN0IHtcclxuICAgICAgICBiYWNrZ3JvdW5kLWNvbG9yOiAgIzAwNEI4NDtcclxuICAgICAgICBcclxuICAgIH1cclxuIFxyXG5pb24taXRlbSB7XHJcbiAgLS1ib3JkZXItcmFkaXVzOiA1cHg7ICBcclxuICBmb250LXNpemU6IDE2cHg7XHJcbiAgd2hpdGUtc3BhY2U6IHByZS1saW5lOyAgIFxyXG59ICAgIFxyXG4gICAgXHJcbiAgICBzcGFuIHtcclxuICAgICAgICBjb2xvcjogI2ZmZmZmZjsgICBcclxuICAgIH0gICAgXHJcbiAgICAgICAgICBcclxufVxyXG5cclxuLmJhaXhvIHsgICAgICBcclxuICAtLWJhY2tncm91bmQ6IHVybCgnL2Fzc2V0cy9pbWcvR3J1cG9TQy10b3AxMy5wbmcnKSAwIDAvMTAwJSAxMDAlIG5vLXJlcGVhdDtcclxuICAvLyBiYWNrZ3JvdW5kLXJlcGVhdDogbm8tcmVwZWF0OyAgICBcclxuICAvLyBiYWNrZ3JvdW5kLXNpemU6IGNvdmVyIDtcclxufSIsIi5hbHRvIHtcbiAgLS1iYWNrZ3JvdW5kOiB1cmwoXCIvYXNzZXRzL2ltZy9HcnVwb1NDLXRvcDEzLnBuZ1wiKSAwIDAvMTAwJSAxMDAlIG5vLXJlcGVhdDtcbiAgbWF4LWhlaWdodDogNjBweDtcbn1cblxuLnBpbmNpcGFsIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzAwNEI4NDtcbn1cbi5waW5jaXBhbCBpb24tbGlzdCB7XG4gIGJhY2tncm91bmQtY29sb3I6ICMwMDRCODQ7XG59XG4ucGluY2lwYWwgaW9uLWl0ZW0ge1xuICAtLWJvcmRlci1yYWRpdXM6IDVweDtcbiAgZm9udC1zaXplOiAxNnB4O1xuICB3aGl0ZS1zcGFjZTogcHJlLWxpbmU7XG59XG4ucGluY2lwYWwgc3BhbiB7XG4gIGNvbG9yOiAjZmZmZmZmO1xufVxuXG4uYmFpeG8ge1xuICAtLWJhY2tncm91bmQ6IHVybChcIi9hc3NldHMvaW1nL0dydXBvU0MtdG9wMTMucG5nXCIpIDAgMC8xMDAlIDEwMCUgbm8tcmVwZWF0O1xufSJdfQ== */"

/***/ }),

/***/ "./src/app/pages/analiseprodconf/analiseprodconf.page.ts":
/*!***************************************************************!*\
  !*** ./src/app/pages/analiseprodconf/analiseprodconf.page.ts ***!
  \***************************************************************/
/*! exports provided: AnaliseprodconfPage */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AnaliseprodconfPage", function() { return AnaliseprodconfPage; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm2015/core.js");
/* harmony import */ var _services_dados_sc_service__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../services/dados-sc.service */ "./src/app/pages/services/dados-sc.service.ts");
/* harmony import */ var _ionic_angular__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @ionic/angular */ "./node_modules/@ionic/angular/dist/fesm5.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/fesm2015/router.js");




//import da lib responsavel pelo recebimeto de parametros

let AnaliseprodconfPage = class AnaliseprodconfPage {
    //aciona o construtor para receber dados
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
AnaliseprodconfPage.ctorParameters = () => [
    { type: _ionic_angular__WEBPACK_IMPORTED_MODULE_3__["NavController"] },
    { type: _services_dados_sc_service__WEBPACK_IMPORTED_MODULE_2__["DadosSCService"] },
    { type: _angular_router__WEBPACK_IMPORTED_MODULE_4__["ActivatedRoute"] }
];
AnaliseprodconfPage = tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"]([
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
        selector: 'app-analiseprodconf',
        template: __webpack_require__(/*! raw-loader!./analiseprodconf.page.html */ "./node_modules/raw-loader/index.js!./src/app/pages/analiseprodconf/analiseprodconf.page.html"),
        styles: [__webpack_require__(/*! ./analiseprodconf.page.scss */ "./src/app/pages/analiseprodconf/analiseprodconf.page.scss")]
    }),
    tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"]("design:paramtypes", [_ionic_angular__WEBPACK_IMPORTED_MODULE_3__["NavController"], _services_dados_sc_service__WEBPACK_IMPORTED_MODULE_2__["DadosSCService"], _angular_router__WEBPACK_IMPORTED_MODULE_4__["ActivatedRoute"]])
], AnaliseprodconfPage);



/***/ })

}]);
//# sourceMappingURL=pages-analiseprodconf-analiseprodconf-module-es2015.js.map