(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["pages-home-home-module"],{

/***/ "./node_modules/raw-loader/index.js!./src/app/pages/home/home.page.html":
/*!*********************************************************************!*\
  !*** ./node_modules/raw-loader!./src/app/pages/home/home.page.html ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "<ion-content>\r\n\r\n  <ion-header>\r\n    <ion-toolbar color=\"secondary\">\r\n      <ion-buttons slot=\"start\">\r\n        <ion-menu-button></ion-menu-button>\r\n      </ion-buttons>\r\n      <ion-title>\r\n        <span>Indicadores GrupoSC</span>\r\n      </ion-title>\r\n    </ion-toolbar>\r\n  </ion-header>\r\n\r\n  <div class=\"pincipal\">\r\n\r\n    <ion-slides>\r\n      <ion-slide>\r\n      </ion-slide>\r\n    </ion-slides>\r\n\r\n    <ion-card>\r\n      <ion-item class=\"top\">\r\n        <ion-label>Indicador</ion-label>\r\n        <ion-button color=\"danger\" class=\"menu\">Meta Mensal</ion-button>\r\n        <ion-button color=\"danger\" class=\"menu\">Meta Até o Período</ion-button>\r\n        <ion-button color=\"danger\" class=\"menu\">Real Até o Período</ion-button>\r\n        <ion-button color=\"danger\" class=\"menu\">VAR% até o Período</ion-button>\r\n      </ion-item>\r\n      <P>\r\n        <ion-item >\r\n          <ion-label [routerLink]=\"['/upm']\">UPM Total</ion-label>\r\n          <ion-button>{{upmTotal?.Meta}}</ion-button>\r\n          <ion-button>{{upmTotal?.Meta}}</ion-button>\r\n          <ion-button>{{upmTotal?.UPM}}</ion-button>\r\n          <ion-button>{{upmTotal?.Meta}}</ion-button>\r\n        </ion-item>\r\n      </P>\r\n      <P>\r\n        <ion-item>\r\n          <ion-label>UPM Linha</ion-label>\r\n          <ion-button>900</ion-button>\r\n          <ion-button>900</ion-button>\r\n          <ion-button>1300</ion-button>\r\n          <ion-button>1300</ion-button>\r\n        </ion-item>\r\n      </P>\r\n      <P>\r\n        <ion-item>\r\n          <ion-label>UPM Psico</ion-label>\r\n          <ion-button>900</ion-button>\r\n          <ion-button>900</ion-button>\r\n          <ion-button>1300</ion-button>\r\n          <ion-button>1300</ion-button>\r\n        </ion-item>\r\n      </P>\r\n      <P>\r\n        <ion-item>\r\n          <ion-label>Cancelamento Total</ion-label>\r\n          <ion-button>0.05%</ion-button>\r\n          <ion-button>0.25%</ion-button>\r\n          <ion-button>0.05%</ion-button>\r\n          <ion-button>0.05%</ion-button>\r\n        </ion-item>\r\n      </P>\r\n      <P>\r\n        <ion-item>\r\n          <ion-label>Cancelamento Operacional</ion-label>\r\n          <ion-button>0.05%</ion-button>\r\n          <ion-button>0.25%</ion-button>\r\n          <ion-button>0.05%</ion-button>\r\n          <ion-button>0.05%</ion-button>\r\n        </ion-item>\r\n      </P>\r\n      <P>\r\n        <ion-item>\r\n          <ion-label>Cancelamento Comercial</ion-label>\r\n          <ion-button>0.05%</ion-button>\r\n          <ion-button>0.25%</ion-button>\r\n          <ion-button>0.05%</ion-button>\r\n          <ion-button>0.05%</ion-button>\r\n        </ion-item>\r\n      </P>\r\n\r\n\r\n    </ion-card>\r\n\r\n  </div>\r\n</ion-content>"

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
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm2015/core.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/fesm2015/common.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/fesm2015/forms.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/fesm2015/router.js");
/* harmony import */ var _ionic_angular__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @ionic/angular */ "./node_modules/@ionic/angular/dist/fesm5.js");
/* harmony import */ var _home_page__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./home.page */ "./src/app/pages/home/home.page.ts");







const routes = [
    {
        path: '',
        component: _home_page__WEBPACK_IMPORTED_MODULE_6__["HomePage"]
    }
];
let HomePageModule = class HomePageModule {
};
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



/***/ }),

/***/ "./src/app/pages/home/home.page.scss":
/*!*******************************************!*\
  !*** ./src/app/pages/home/home.page.scss ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = ".pincipal {\n  position: absolute;\n  left: 0;\n  right: 0;\n  bottom: 0;\n  height: 100%;\n  background-image: url(\"/assets/img/GrupoSC-d.png\");\n  background-repeat: no-repeat;\n  background-size: contain;\n}\n.pincipal ion-slides {\n  height: 10%;\n}\n.pincipal span {\n  color: #ffffff;\n}\n.pincipal ion-item {\n  --border-radius: 5px;\n}\n.pincipal ion-label {\n  font-size: 12px;\n  white-space: pre-line;\n}\n.pincipal ion-button {\n  width: 90;\n  height: 100;\n  max-height: 40px;\n  min-height: 40px;\n  max-width: 50px;\n  min-width: 50px;\n  font-size: 12px;\n  white-space: pre-line;\n  --border-radius: 6px;\n}\n.pincipal .menu {\n  font-size: 9px;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvcGFnZXMvaG9tZS9DOlxcRGVzZW52b2x2aW1lbnRvXFxUQ0NcXFYwMFxcR3J1cG9TQy9zcmNcXGFwcFxccGFnZXNcXGhvbWVcXGhvbWUucGFnZS5zY3NzIiwic3JjL2FwcC9wYWdlcy9ob21lL2hvbWUucGFnZS5zY3NzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUNBO0VBRUksa0JBQUE7RUFFQSxPQUFBO0VBQ0EsUUFBQTtFQUNBLFNBQUE7RUFDQSxZQUFBO0VBQ0Esa0RBQUE7RUFDQSw0QkFBQTtFQUNBLHdCQUFBO0FDRko7QURNUTtFQUNJLFdBQUE7QUNKWjtBRE9RO0VBQ0ksY0FBQTtBQ0xaO0FEU1E7RUFDSSxvQkFBQTtBQ1BaO0FEWVE7RUFDSSxlQUFBO0VBQ0EscUJBQUE7QUNWWjtBRGFRO0VBQ0ksU0FBQTtFQUNBLFdBQUE7RUFDQSxnQkFBQTtFQUNBLGdCQUFBO0VBQ0EsZUFBQTtFQUNBLGVBQUE7RUFDQSxlQUFBO0VBQ0EscUJBQUE7RUFDQSxvQkFBQTtBQ1haO0FEY007RUFDRSxjQUFBO0FDWlIiLCJmaWxlIjoic3JjL2FwcC9wYWdlcy9ob21lL2hvbWUucGFnZS5zY3NzIiwic291cmNlc0NvbnRlbnQiOlsiXHJcbi5waW5jaXBhbCB7XHJcbiAgICBcclxuICAgIHBvc2l0aW9uOiBhYnNvbHV0ZTtcclxuICAgXHJcbiAgICBsZWZ0OiAwO1xyXG4gICAgcmlnaHQ6IDA7XHJcbiAgICBib3R0b206IDA7XHJcbiAgICBoZWlnaHQ6IDEwMCU7XHJcbiAgICBiYWNrZ3JvdW5kLWltYWdlOiB1cmwoJy9hc3NldHMvaW1nL0dydXBvU0MtZC5wbmcnKTtcclxuICAgIGJhY2tncm91bmQtcmVwZWF0OiBuby1yZXBlYXQ7XHJcbiAgICBiYWNrZ3JvdW5kLXNpemU6IGNvbnRhaW47ICAgIFxyXG4gICBcclxuIFxyXG4gICAgXHJcbiAgICAgICAgaW9uLXNsaWRlcyB7XHJcbiAgICAgICAgICAgIGhlaWdodDogMTAlOyAgICAgICAgICAgICAgICBcclxuICAgICAgICB9XHJcbiAgICBcclxuICAgICAgICBzcGFuIHtcclxuICAgICAgICAgICAgY29sb3I6ICNmZmZmZmY7ICAgXHJcbiAgICAgICAgICAgIFxyXG4gICAgICAgIH1cclxuICAgICAgICBcclxuICAgICAgICBpb24taXRlbSB7ICBcclxuICAgICAgICAgICAgLS1ib3JkZXItcmFkaXVzOiA1cHg7ICAgICAgICAgICAgICAgICBcclxuXHJcbiAgICAgICAgXHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICBpb24tbGFiZWwge1xyXG4gICAgICAgICAgICBmb250LXNpemU6IDEycHg7XHJcbiAgICAgICAgICAgIHdoaXRlLXNwYWNlOiBwcmUtbGluZTsgICBcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIGlvbi1idXR0b24ge1xyXG4gICAgICAgICAgICB3aWR0aDo5MDtcclxuICAgICAgICAgICAgaGVpZ2h0OjEwMDtcclxuICAgICAgICAgICAgbWF4LWhlaWdodDogNDBweDtcclxuICAgICAgICAgICAgbWluLWhlaWdodDogNDBweDtcclxuICAgICAgICAgICAgbWF4LXdpZHRoOiA1MHB4O1xyXG4gICAgICAgICAgICBtaW4td2lkdGg6IDUwcHg7XHJcbiAgICAgICAgICAgIGZvbnQtc2l6ZTogMTJweDtcclxuICAgICAgICAgICAgd2hpdGUtc3BhY2U6IHByZS1saW5lOyAgICAgICAgICAgIFxyXG4gICAgICAgICAgICAtLWJvcmRlci1yYWRpdXM6IDZweDsgICAgIFxyXG4gICAgICAgIH1cclxuXHJcbiAgICAgIC5tZW51IHtcclxuICAgICAgICBmb250LXNpemU6IDlweDtcclxuICAgICAgfVxyXG4gICAgXHJcbiAgICB9XHJcbiAgICBcclxuICAgICIsIi5waW5jaXBhbCB7XG4gIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgbGVmdDogMDtcbiAgcmlnaHQ6IDA7XG4gIGJvdHRvbTogMDtcbiAgaGVpZ2h0OiAxMDAlO1xuICBiYWNrZ3JvdW5kLWltYWdlOiB1cmwoXCIvYXNzZXRzL2ltZy9HcnVwb1NDLWQucG5nXCIpO1xuICBiYWNrZ3JvdW5kLXJlcGVhdDogbm8tcmVwZWF0O1xuICBiYWNrZ3JvdW5kLXNpemU6IGNvbnRhaW47XG59XG4ucGluY2lwYWwgaW9uLXNsaWRlcyB7XG4gIGhlaWdodDogMTAlO1xufVxuLnBpbmNpcGFsIHNwYW4ge1xuICBjb2xvcjogI2ZmZmZmZjtcbn1cbi5waW5jaXBhbCBpb24taXRlbSB7XG4gIC0tYm9yZGVyLXJhZGl1czogNXB4O1xufVxuLnBpbmNpcGFsIGlvbi1sYWJlbCB7XG4gIGZvbnQtc2l6ZTogMTJweDtcbiAgd2hpdGUtc3BhY2U6IHByZS1saW5lO1xufVxuLnBpbmNpcGFsIGlvbi1idXR0b24ge1xuICB3aWR0aDogOTA7XG4gIGhlaWdodDogMTAwO1xuICBtYXgtaGVpZ2h0OiA0MHB4O1xuICBtaW4taGVpZ2h0OiA0MHB4O1xuICBtYXgtd2lkdGg6IDUwcHg7XG4gIG1pbi13aWR0aDogNTBweDtcbiAgZm9udC1zaXplOiAxMnB4O1xuICB3aGl0ZS1zcGFjZTogcHJlLWxpbmU7XG4gIC0tYm9yZGVyLXJhZGl1czogNnB4O1xufVxuLnBpbmNpcGFsIC5tZW51IHtcbiAgZm9udC1zaXplOiA5cHg7XG59Il19 */"

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
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm2015/core.js");
/* harmony import */ var _ionic_angular__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @ionic/angular */ "./node_modules/@ionic/angular/dist/fesm5.js");
/* harmony import */ var _services_dados_sc_service__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../services/dados-sc.service */ "./src/app/pages/services/dados-sc.service.ts");
/* harmony import */ var _upm_upm_model__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../upm/upm.model */ "./src/app/pages/upm/upm.model.ts");





let HomePage = class HomePage {
    constructor(service) {
        this.service = service;
        this.upmTotal = new _upm_upm_model__WEBPACK_IMPORTED_MODULE_4__["Upm"]();
    }
    ngOnInit() {
        this.getDados();
        console.log;
    }
    getDados() {
        this.service.getUpm().then((result) => {
            this.upms = result['upms'];
            console.log(this.upms);
            this.upms.forEach(u => {
                if (u.indicador == "Total") {
                    console.log(this.upmTotal);
                    this.upmTotal = u;
                }
            });
        }).catch((error) => {
            console.error("error: " + error);
        }).finally(() => {
            this.upms.forEach(u => {
                if (u.indicador == "Total") {
                    console.log(this.upmTotal);
                    this.upmTotal = u;
                }
            });
        });
    }
};
HomePage.ctorParameters = () => [
    { type: _services_dados_sc_service__WEBPACK_IMPORTED_MODULE_3__["DadosSCService"] }
];
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
class Upm {
}


/***/ })

}]);
//# sourceMappingURL=pages-home-home-module-es2015.js.map