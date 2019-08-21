(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["pages-analiseprodconf-analiseprodconf-module"],{

/***/ "./node_modules/raw-loader/index.js!./src/app/pages/analiseprodconf/analiseprodconf.page.html":
/*!*******************************************************************************************!*\
  !*** ./node_modules/raw-loader!./src/app/pages/analiseprodconf/analiseprodconf.page.html ***!
  \*******************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "<ion-content>\r\n\r\n  <ion-header color=\"secondary\">\r\n    <ion-toolbar color=\"secondary\">\r\n      <ion-buttons slot=\"start\">\r\n        <ion-menu-button></ion-menu-button>\r\n      </ion-buttons>\r\n      <ion-title>\r\n        <span>Indicadores GrupoSC</span>\r\n      </ion-title>\r\n    </ion-toolbar>\r\n  </ion-header>\r\n\r\n  <div class=\"pincipal\"> \r\n\r\n    <ion-card >\r\n      <ion-card-header>\r\n        <ion-card-subtitle style=\"text-align:center; color: aliceblue; font-size: 16px\" >Analise da Produção por Conferente.</ion-card-subtitle>\r\n      </ion-card-header>\r\n      <ion-list *ngFor=\"let analise of analises\">\r\n        <ion-item>\r\n          <!-- <ion-icon name=\"nome\" slot=\"start\"></ion-icon> -->\r\n          <ion-card-content>{{analise.nome}}</ion-card-content>\r\n        </ion-item>\r\n        <ion-item>         \r\n          <ion-label>Total Conferido</ion-label>\r\n          <ion-card-content>{{analise.total}}</ion-card-content>\r\n        </ion-item>\r\n        <ion-item>          \r\n          <ion-label>Media</ion-label>\r\n          <ion-card-content>{{analise.media}}</ion-card-content>\r\n        </ion-item>\r\n        <ion-item>         \r\n          <ion-label>Porcentagem</ion-label>\r\n          <ion-card-content>{{analise.porcen}}</ion-card-content>\r\n        </ion-item>\r\n        \r\n      </ion-list>\r\n\r\n\r\n    </ion-card>\r\n  </div>\r\n\r\n</ion-content>"

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

module.exports = ".pincipal {\n  background-color: #2A5695;\n}\n.pincipal ion-list {\n  background-color: #2A5695;\n}\n.pincipal span {\n  color: #ffffff;\n}\n.pincipal ion-label {\n  font-size: 16px;\n  white-space: pre-line;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvcGFnZXMvYW5hbGlzZXByb2Rjb25mL0M6XFxEZXNlbnZvbHZpbWVudG9cXFRDQ1xcVjAwXFxHcnVwb1NDL3NyY1xcYXBwXFxwYWdlc1xcYW5hbGlzZXByb2Rjb25mXFxhbmFsaXNlcHJvZGNvbmYucGFnZS5zY3NzIiwic3JjL2FwcC9wYWdlcy9hbmFsaXNlcHJvZGNvbmYvYW5hbGlzZXByb2Rjb25mLnBhZ2Uuc2NzcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFFQTtFQUNNLHlCQUFBO0FDRE47QURHSTtFQUNRLHlCQUFBO0FDRFo7QURJUTtFQUNJLGNBQUE7QUNGWjtBREtRO0VBQ0ksZUFBQTtFQUNBLHFCQUFBO0FDSFoiLCJmaWxlIjoic3JjL2FwcC9wYWdlcy9hbmFsaXNlcHJvZGNvbmYvYW5hbGlzZXByb2Rjb25mLnBhZ2Uuc2NzcyIsInNvdXJjZXNDb250ZW50IjpbIlxyXG5cclxuLnBpbmNpcGFsIHtcclxuICAgICAgYmFja2dyb3VuZC1jb2xvcjogICMyQTU2OTU7XHJcblxyXG4gICAgaW9uLWxpc3Qge1xyXG4gICAgICAgICAgICBiYWNrZ3JvdW5kLWNvbG9yOiAgIzJBNTY5NTtcclxuICAgICAgICB9XHJcbiAgICAgICAgXHJcbiAgICAgICAgc3BhbiB7XHJcbiAgICAgICAgICAgIGNvbG9yOiAjZmZmZmZmOyAgIFxyXG4gICAgICAgIH1cclxuICAgICAgICBcclxuICAgICAgICBpb24tbGFiZWwge1xyXG4gICAgICAgICAgICBmb250LXNpemU6IDE2cHg7XHJcbiAgICAgICAgICAgIHdoaXRlLXNwYWNlOiBwcmUtbGluZTsgICBcclxuICAgICAgICB9XHJcbiAgICAgICAgICAgXHJcbiAgICB9XHJcbiAgICBcclxuICAgICIsIi5waW5jaXBhbCB7XG4gIGJhY2tncm91bmQtY29sb3I6ICMyQTU2OTU7XG59XG4ucGluY2lwYWwgaW9uLWxpc3Qge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjMkE1Njk1O1xufVxuLnBpbmNpcGFsIHNwYW4ge1xuICBjb2xvcjogI2ZmZmZmZjtcbn1cbi5waW5jaXBhbCBpb24tbGFiZWwge1xuICBmb250LXNpemU6IDE2cHg7XG4gIHdoaXRlLXNwYWNlOiBwcmUtbGluZTtcbn0iXX0= */"

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