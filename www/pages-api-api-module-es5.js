(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["pages-api-api-module"],{

/***/ "./node_modules/raw-loader/index.js!./src/app/pages/api/api.page.html":
/*!*******************************************************************!*\
  !*** ./node_modules/raw-loader!./src/app/pages/api/api.page.html ***!
  \*******************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "<ion-header>\r\n  <ion-toolbar>\r\n    <ion-title>api</ion-title>\r\n  </ion-toolbar>\r\n</ion-header>\r\n\r\n<ion-content>\r\n\r\n</ion-content>\r\n"

/***/ }),

/***/ "./src/app/pages/api/api.module.ts":
/*!*****************************************!*\
  !*** ./src/app/pages/api/api.module.ts ***!
  \*****************************************/
/*! exports provided: ApiPageModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ApiPageModule", function() { return ApiPageModule; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/fesm5/common.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/fesm5/forms.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/fesm5/router.js");
/* harmony import */ var _ionic_angular__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @ionic/angular */ "./node_modules/@ionic/angular/dist/fesm5.js");
/* harmony import */ var _api_page__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./api.page */ "./src/app/pages/api/api.page.ts");







var routes = [
    {
        path: '',
        component: _api_page__WEBPACK_IMPORTED_MODULE_6__["ApiPage"]
    }
];
var ApiPageModule = /** @class */ (function () {
    function ApiPageModule() {
    }
    ApiPageModule = tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"]([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["NgModule"])({
            imports: [
                _angular_common__WEBPACK_IMPORTED_MODULE_2__["CommonModule"],
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormsModule"],
                _ionic_angular__WEBPACK_IMPORTED_MODULE_5__["IonicModule"],
                _angular_router__WEBPACK_IMPORTED_MODULE_4__["RouterModule"].forChild(routes)
            ],
            declarations: [_api_page__WEBPACK_IMPORTED_MODULE_6__["ApiPage"]]
        })
    ], ApiPageModule);
    return ApiPageModule;
}());



/***/ }),

/***/ "./src/app/pages/api/api.page.scss":
/*!*****************************************!*\
  !*** ./src/app/pages/api/api.page.scss ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IiIsImZpbGUiOiJzcmMvYXBwL3BhZ2VzL2FwaS9hcGkucGFnZS5zY3NzIn0= */"

/***/ }),

/***/ "./src/app/pages/api/api.page.ts":
/*!***************************************!*\
  !*** ./src/app/pages/api/api.page.ts ***!
  \***************************************/
/*! exports provided: ApiPage */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ApiPage", function() { return ApiPage; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _services_dados_sc_service__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../services/dados-sc.service */ "./src/app/pages/services/dados-sc.service.ts");



var ApiPage = /** @class */ (function () {
    function ApiPage(servico) {
        this.servico = servico;
    }
    ApiPage.prototype.ngOnInit = function () {
        this.getDados();
    };
    ApiPage.prototype.getDados = function () {
        var _this = this;
        this.servico.getAlluser().then(function (result) {
            _this.users = result;
        }).catch(function (error) {
            console.error("Erro: " + error);
        });
    };
    ApiPage.prototype.filterList = function (evt) {
        var searchTerm = evt.srcElement.value;
        if (!searchTerm) {
            this.ngOnInit();
            return;
        }
        this.users = this.users.filter(function (termo) {
            if (termo.name && searchTerm) {
                if (termo.name.toLowerCase().indexOf(searchTerm.toLowerCase()) > -1) {
                    return true;
                }
                return false;
            }
        });
    };
    ApiPage.ctorParameters = function () { return [
        { type: _services_dados_sc_service__WEBPACK_IMPORTED_MODULE_2__["DadosSCService"] }
    ]; };
    ApiPage = tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"]([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: 'app-api',
            template: __webpack_require__(/*! raw-loader!./api.page.html */ "./node_modules/raw-loader/index.js!./src/app/pages/api/api.page.html"),
            styles: [__webpack_require__(/*! ./api.page.scss */ "./src/app/pages/api/api.page.scss")]
        }),
        tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"]("design:paramtypes", [_services_dados_sc_service__WEBPACK_IMPORTED_MODULE_2__["DadosSCService"]])
    ], ApiPage);
    return ApiPage;
}());



/***/ })

}]);
//# sourceMappingURL=pages-api-api-module-es5.js.map