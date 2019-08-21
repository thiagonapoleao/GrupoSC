(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["pages-upmlinha-upmlinha-module"],{

/***/ "./node_modules/raw-loader/index.js!./src/app/pages/upmlinha/upmlinha.page.html":
/*!*****************************************************************************!*\
  !*** ./node_modules/raw-loader!./src/app/pages/upmlinha/upmlinha.page.html ***!
  \*****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "<ion-content [scrollEvents]=\"true\" (ionScrollStart)=\"logScrollStart()\" (ionScroll)=\"logScrolling($event)\"\r\n  (ionScrollEnd)=\"logScrollEnd()\">\r\n\r\n  <ion-header >\r\n      <ion-toolbar color=\"secondary\">\r\n          <ion-buttons slot=\"start\">\r\n            <ion-menu-button></ion-menu-button>\r\n          </ion-buttons>\r\n          <ion-title>\r\n              <span>Indicadores GrupoSC</span>\r\n          </ion-title>\r\n        </ion-toolbar>\r\n      </ion-header>\r\n\r\n  <div class=\"pincipal\">\r\n    <ion-slides>\r\n      <ion-slide>      \r\n      </ion-slide>\r\n    </ion-slides>\r\n\r\n    <ion-card>\r\n      <ion-item class=\"top\">\r\n        <ion-label>Indicador</ion-label>\r\n        <ion-button color=\"danger\" class=\"menu\">Meta Mensal</ion-button>\r\n        <ion-button color=\"danger\" class=\"menu\">Meta Até o Período</ion-button>\r\n        <ion-button color=\"danger\" class=\"menu\">Real Até o Período</ion-button>\r\n        <ion-button color=\"danger\" class=\"menu\">VAR% até o Período</ion-button>\r\n      </ion-item>\r\n      <P>\r\n\r\n\r\n        <P>\r\n          <ion-item>\r\n            <ion-label>UPM Total</ion-label>\r\n            <ion-button>900</ion-button>\r\n            <ion-button>900</ion-button>\r\n            <ion-button>1300</ion-button>\r\n            <ion-button>1300</ion-button>\r\n          </ion-item>\r\n        </P>\r\n\r\n\r\n\r\n    </ion-card>\r\n\r\n  </div>\r\n</ion-content>"

/***/ }),

/***/ "./src/app/pages/upmlinha/upmlinha.module.ts":
/*!***************************************************!*\
  !*** ./src/app/pages/upmlinha/upmlinha.module.ts ***!
  \***************************************************/
/*! exports provided: UpmlinhaPageModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "UpmlinhaPageModule", function() { return UpmlinhaPageModule; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/fesm5/common.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/fesm5/forms.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/fesm5/router.js");
/* harmony import */ var _ionic_angular__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @ionic/angular */ "./node_modules/@ionic/angular/dist/fesm5.js");
/* harmony import */ var _upmlinha_page__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./upmlinha.page */ "./src/app/pages/upmlinha/upmlinha.page.ts");







var routes = [
    {
        path: '',
        component: _upmlinha_page__WEBPACK_IMPORTED_MODULE_6__["UpmlinhaPage"]
    }
];
var UpmlinhaPageModule = /** @class */ (function () {
    function UpmlinhaPageModule() {
    }
    UpmlinhaPageModule = tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"]([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["NgModule"])({
            imports: [
                _angular_common__WEBPACK_IMPORTED_MODULE_2__["CommonModule"],
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormsModule"],
                _ionic_angular__WEBPACK_IMPORTED_MODULE_5__["IonicModule"],
                _angular_router__WEBPACK_IMPORTED_MODULE_4__["RouterModule"].forChild(routes)
            ],
            declarations: [_upmlinha_page__WEBPACK_IMPORTED_MODULE_6__["UpmlinhaPage"]]
        })
    ], UpmlinhaPageModule);
    return UpmlinhaPageModule;
}());



/***/ }),

/***/ "./src/app/pages/upmlinha/upmlinha.page.scss":
/*!***************************************************!*\
  !*** ./src/app/pages/upmlinha/upmlinha.page.scss ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = ".pincipal {\n  position: absolute;\n  left: 0;\n  right: 0;\n  bottom: 0;\n  height: 100%;\n  background-image: url(\"/assets/img/GrupoSC-d.png\");\n  background-repeat: no-repeat;\n  background-size: contain;\n}\n.pincipal ion-slides {\n  height: 10%;\n}\n.pincipal span {\n  color: #ffffff;\n}\n.pincipal ion-item {\n  --border-radius: 10px;\n}\n.pincipal ion-label {\n  font-size: 12px;\n  white-space: pre-line;\n}\n.pincipal ion-button {\n  width: 90;\n  height: 100;\n  max-height: 40px;\n  min-height: 40px;\n  max-width: 50px;\n  min-width: 50px;\n  font-size: 12px;\n  white-space: pre-line;\n  --border-radius: 6px;\n}\n.pincipal .menu {\n  font-size: 9px;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvcGFnZXMvdXBtbGluaGEvQzpcXERlc2Vudm9sdmltZW50b1xcVENDXFxWMDBcXEdydXBvU0Mvc3JjXFxhcHBcXHBhZ2VzXFx1cG1saW5oYVxcdXBtbGluaGEucGFnZS5zY3NzIiwic3JjL2FwcC9wYWdlcy91cG1saW5oYS91cG1saW5oYS5wYWdlLnNjc3MiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7RUFFSSxrQkFBQTtFQUNBLE9BQUE7RUFDQSxRQUFBO0VBQ0EsU0FBQTtFQUNBLFlBQUE7RUFDQSxrREFBQTtFQUNBLDRCQUFBO0VBQ0Esd0JBQUE7QUNBSjtBRElRO0VBQ0ksV0FBQTtBQ0ZaO0FES1E7RUFDSSxjQUFBO0FDSFo7QURPUTtFQUNJLHFCQUFBO0FDTFo7QURVUTtFQUNJLGVBQUE7RUFDQSxxQkFBQTtBQ1JaO0FEV1E7RUFDSSxTQUFBO0VBQ0EsV0FBQTtFQUNBLGdCQUFBO0VBQ0EsZ0JBQUE7RUFDQSxlQUFBO0VBQ0EsZUFBQTtFQUNBLGVBQUE7RUFDQSxxQkFBQTtFQUNBLG9CQUFBO0FDVFo7QURZTTtFQUNFLGNBQUE7QUNWUiIsImZpbGUiOiJzcmMvYXBwL3BhZ2VzL3VwbWxpbmhhL3VwbWxpbmhhLnBhZ2Uuc2NzcyIsInNvdXJjZXNDb250ZW50IjpbIi5waW5jaXBhbCB7XHJcbiAgICBcclxuICAgIHBvc2l0aW9uOiBhYnNvbHV0ZTtcclxuICAgIGxlZnQ6IDA7XHJcbiAgICByaWdodDogMDtcclxuICAgIGJvdHRvbTogMDtcclxuICAgIGhlaWdodDogMTAwJTtcclxuICAgIGJhY2tncm91bmQtaW1hZ2U6IHVybCgnL2Fzc2V0cy9pbWcvR3J1cG9TQy1kLnBuZycpO1xyXG4gICAgYmFja2dyb3VuZC1yZXBlYXQ6IG5vLXJlcGVhdDtcclxuICAgIGJhY2tncm91bmQtc2l6ZTogY29udGFpbjsgICAgXHJcbiAgIFxyXG4gXHJcbiAgICBcclxuICAgICAgICBpb24tc2xpZGVzIHtcclxuICAgICAgICAgICAgaGVpZ2h0OiAxMCU7ICAgICAgICAgICAgICAgIFxyXG4gICAgICAgIH1cclxuICAgIFxyXG4gICAgICAgIHNwYW4ge1xyXG4gICAgICAgICAgICBjb2xvcjogI2ZmZmZmZjsgICBcclxuICAgICAgICAgICAgXHJcbiAgICAgICAgfVxyXG4gICAgICAgIFxyXG4gICAgICAgIGlvbi1pdGVtIHsgIFxyXG4gICAgICAgICAgICAtLWJvcmRlci1yYWRpdXM6IDEwcHg7ICAgICAgICAgICAgICAgICBcclxuXHJcbiAgICAgICAgXHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICBpb24tbGFiZWwge1xyXG4gICAgICAgICAgICBmb250LXNpemU6IDEycHg7XHJcbiAgICAgICAgICAgIHdoaXRlLXNwYWNlOiBwcmUtbGluZTsgICBcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIGlvbi1idXR0b24ge1xyXG4gICAgICAgICAgICB3aWR0aDo5MDtcclxuICAgICAgICAgICAgaGVpZ2h0OjEwMDtcclxuICAgICAgICAgICAgbWF4LWhlaWdodDogNDBweDtcclxuICAgICAgICAgICAgbWluLWhlaWdodDogNDBweDtcclxuICAgICAgICAgICAgbWF4LXdpZHRoOiA1MHB4O1xyXG4gICAgICAgICAgICBtaW4td2lkdGg6IDUwcHg7XHJcbiAgICAgICAgICAgIGZvbnQtc2l6ZTogMTJweDtcclxuICAgICAgICAgICAgd2hpdGUtc3BhY2U6IHByZS1saW5lOyAgICAgICAgICAgIFxyXG4gICAgICAgICAgICAtLWJvcmRlci1yYWRpdXM6IDZweDsgICAgIFxyXG4gICAgICAgIH1cclxuXHJcbiAgICAgIC5tZW51IHtcclxuICAgICAgICBmb250LXNpemU6IDlweDtcclxuICAgICAgfVxyXG4gICAgXHJcbiAgICB9XHJcbiAgICBcclxuICAgICIsIi5waW5jaXBhbCB7XG4gIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgbGVmdDogMDtcbiAgcmlnaHQ6IDA7XG4gIGJvdHRvbTogMDtcbiAgaGVpZ2h0OiAxMDAlO1xuICBiYWNrZ3JvdW5kLWltYWdlOiB1cmwoXCIvYXNzZXRzL2ltZy9HcnVwb1NDLWQucG5nXCIpO1xuICBiYWNrZ3JvdW5kLXJlcGVhdDogbm8tcmVwZWF0O1xuICBiYWNrZ3JvdW5kLXNpemU6IGNvbnRhaW47XG59XG4ucGluY2lwYWwgaW9uLXNsaWRlcyB7XG4gIGhlaWdodDogMTAlO1xufVxuLnBpbmNpcGFsIHNwYW4ge1xuICBjb2xvcjogI2ZmZmZmZjtcbn1cbi5waW5jaXBhbCBpb24taXRlbSB7XG4gIC0tYm9yZGVyLXJhZGl1czogMTBweDtcbn1cbi5waW5jaXBhbCBpb24tbGFiZWwge1xuICBmb250LXNpemU6IDEycHg7XG4gIHdoaXRlLXNwYWNlOiBwcmUtbGluZTtcbn1cbi5waW5jaXBhbCBpb24tYnV0dG9uIHtcbiAgd2lkdGg6IDkwO1xuICBoZWlnaHQ6IDEwMDtcbiAgbWF4LWhlaWdodDogNDBweDtcbiAgbWluLWhlaWdodDogNDBweDtcbiAgbWF4LXdpZHRoOiA1MHB4O1xuICBtaW4td2lkdGg6IDUwcHg7XG4gIGZvbnQtc2l6ZTogMTJweDtcbiAgd2hpdGUtc3BhY2U6IHByZS1saW5lO1xuICAtLWJvcmRlci1yYWRpdXM6IDZweDtcbn1cbi5waW5jaXBhbCAubWVudSB7XG4gIGZvbnQtc2l6ZTogOXB4O1xufSJdfQ== */"

/***/ }),

/***/ "./src/app/pages/upmlinha/upmlinha.page.ts":
/*!*************************************************!*\
  !*** ./src/app/pages/upmlinha/upmlinha.page.ts ***!
  \*************************************************/
/*! exports provided: UpmlinhaPage */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "UpmlinhaPage", function() { return UpmlinhaPage; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");


var UpmlinhaPage = /** @class */ (function () {
    function UpmlinhaPage() {
    }
    UpmlinhaPage.prototype.ngOnInit = function () {
    };
    UpmlinhaPage = tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"]([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: 'app-upmlinha',
            template: __webpack_require__(/*! raw-loader!./upmlinha.page.html */ "./node_modules/raw-loader/index.js!./src/app/pages/upmlinha/upmlinha.page.html"),
            styles: [__webpack_require__(/*! ./upmlinha.page.scss */ "./src/app/pages/upmlinha/upmlinha.page.scss")]
        }),
        tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"]("design:paramtypes", [])
    ], UpmlinhaPage);
    return UpmlinhaPage;
}());



/***/ })

}]);
//# sourceMappingURL=pages-upmlinha-upmlinha-module-es5.js.map