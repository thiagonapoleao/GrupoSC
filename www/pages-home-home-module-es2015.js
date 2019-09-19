(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["pages-home-home-module"],{

/***/ "./node_modules/raw-loader/index.js!./src/app/pages/home/home.page.html":
/*!*********************************************************************!*\
  !*** ./node_modules/raw-loader!./src/app/pages/home/home.page.html ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "<ion-header>\r\n  <ion-toolbar color=\"secondary\">\r\n    <ion-buttons slot=\"start\">\r\n      <ion-menu-button></ion-menu-button>\r\n    </ion-buttons>\r\n    <ion-title>\r\n      <span>Indicadores GrupoSC</span>\r\n    </ion-title>\r\n  </ion-toolbar>\r\n</ion-header>\r\n\r\n<ion-content class=\"alto\">\r\n  <ion-card class=\"pincipal\">\r\n    <ion-item class=\"top\">\r\n      <ion-label>Indicador</ion-label>\r\n      <ion-button color=\"danger\" class=\"menu\">Meta Mensal</ion-button>\r\n      <ion-button color=\"danger\" class=\"menu\">Meta Até o Período</ion-button>\r\n      <ion-button color=\"danger\" class=\"menu\">Real Até o Período</ion-button>\r\n      <ion-button color=\"danger\" class=\"menu\">VAR% até o Período</ion-button>\r\n    </ion-item>\r\n  </ion-card>\r\n</ion-content>\r\n\r\n<ion-content class=\"baixo\">\r\n  <ion-card class=\"dados\">\r\n    <P>\r\n      <ion-item class=\"top\">\r\n        <ion-label>Quebras GMD + CRI</ion-label>\r\n        <ion-button>R$ {{anlQuebra.meta}}</ion-button>\r\n        <ion-button>R$ {{anlQuebra?.meta}}</ion-button>\r\n        <ion-button>R$ {{anlQuebra?.realizado}}</ion-button>\r\n        <ion-button>{{((anlQuebra?.realizado - anlQuebra?.meta) / anlQuebra?.meta) | number : '1.2-2' }} %</ion-button>\r\n      </ion-item>\r\n    </P>\r\n    <P>\r\n      <ion-item class=\"top\">\r\n        <ion-label>Chegadas CD</ion-label>\r\n        <ion-button>{{anlChegada?.meta * 100 }} %</ion-button>\r\n        <ion-button>{{anlChegada?.meta * 100 }} %</ion-button>\r\n        <ion-button>{{anlChegada?.realizado * 100 }} %</ion-button>\r\n        <ion-button>{{(anlChegada?.realizado - anlChegada?.meta) / anlChegada?.meta | number : '1.2-2' }} %</ion-button>\r\n      </ion-item>\r\n    </P>\r\n    <P>\r\n      <ion-item class=\"top\">\r\n        <ion-label>Saídas CD</ion-label>\r\n        <ion-button>{{anlSaida?.meta * 100 }} %</ion-button>\r\n        <ion-button>{{anlSaida?.meta * 100 }} %</ion-button>\r\n        <ion-button>{{anlSaida?.realizado * 100 }} %</ion-button>\r\n        <ion-button>{{(anlSaida?.realizado - anlSaida?.meta) / anlSaida?.meta | number : '1.2-2' }} %</ion-button>\r\n      </ion-item>\r\n    </P>\r\n    <P>\r\n      <ion-item class=\"top\"> \r\n        <ion-label>Cancelamento Total</ion-label>\r\n        <ion-button>{{anlCancT?.meta * 100 | number : '1.2-2'  }} %</ion-button>\r\n        <ion-button>{{anlCancT?.meta * 100 | number : '1.2-2' }} %</ion-button>\r\n        <ion-button>{{anlCancT?.realizado * 100 | number : '1.2-2'  }} %</ion-button>\r\n        <ion-button>{{(anlCancT?.realizado - anlCancT?.meta) / anlCancT?.meta | number : '1.2-2' }} %</ion-button>\r\n      </ion-item>\r\n    </P>\r\n    <P>\r\n      <ion-item class=\"top\">\r\n        <ion-label>Cancelamento Operacional</ion-label>\r\n        <ion-button>{{anlCancO?.meta * 100 | number : '1.2-2' }} %</ion-button>\r\n        <ion-button>{{anlCancO?.meta * 100 | number : '1.2-2' }} %</ion-button>\r\n        <ion-button>{{anlCancO?.realizado * 100 | number : '1.2-2' }} %</ion-button>\r\n        <ion-button>{{(anlCancO?.realizado - anlCancO?.meta) / anlCancO?.meta | number : '1.2-2' }} %</ion-button>\r\n      </ion-item>\r\n    </P>\r\n    <P>\r\n      <ion-item class=\"top\">\r\n        <ion-label>Cancelamento Comercial</ion-label>\r\n        <ion-button>{{anlCancC?.meta * 100 | number : '1.2-2'  }} %</ion-button>\r\n        <ion-button>{{anlCancC?.meta * 100 | number : '1.2-2' }} %</ion-button>\r\n        <ion-button>{{anlCancC?.realizado * 100 | number : '1.2-2' }} %</ion-button>\r\n        <ion-button>{{(anlCancC?.realizado - anlCancC?.meta) / anlCancC?.meta | number : '1.2-2' }} %</ion-button>\r\n      </ion-item>\r\n    </P>\r\n    <P>\r\n      <ion-item class=\"top\">\r\n        <ion-label>Devolução Total WEB + BO</ion-label>\r\n        <ion-button>{{anlDevT?.meta * 100 | number : '1.2-2' }} %</ion-button>\r\n        <ion-button>{{anlDevT?.meta * 100 | number : '1.2-2' }} %</ion-button>\r\n        <ion-button>{{anlDevT?.realizado * 100 | number : '1.2-2' }} %</ion-button>\r\n        <ion-button>{{(anlDevT?.realizado - anlDevT?.meta) / anlDevT?.meta | number : '1.2-2' }} %</ion-button>\r\n      </ion-item>\r\n    </P>\r\n    <P>\r\n      <ion-item class=\"top\">\r\n        <ion-label>Devolução (BO Log)</ion-label>\r\n        <ion-button>{{anlDevLog?.meta * 100 | number : '1.2-2' }} %</ion-button>\r\n        <ion-button>{{anlDevLog?.meta * 100 | number : '1.2-2'  }} %</ion-button>\r\n        <ion-button>{{anlDevLog?.realizado * 100 | number : '1.2-2' }} %</ion-button>\r\n        <ion-button>{{(anlDevLog?.realizado - anlDevLog?.meta) / anlDevLog?.meta | number : '1.2-2' }} %</ion-button>\r\n      </ion-item>\r\n    </P>\r\n    <P>\r\n      <ion-item class=\"top\">\r\n        <ion-label>Devolução (BI Com)</ion-label>\r\n        <ion-button>{{anlDevCom?.meta * 100 | number : '1.2-2' }} %</ion-button>\r\n        <ion-button>{{anlDevCom?.meta * 100 | number : '1.2-2' }} %</ion-button>\r\n        <ion-button>{{anlDevCom?.realizado * 100 | number : '1.2-2' }} %</ion-button>\r\n        <ion-button>{{(anlDevCom?.realizado - anlDevCom?.meta) / anlDevCom?.meta | number : '1.2-2' }} %</ion-button>\r\n      </ion-item>\r\n    </P>\r\n    <P>\r\n      <ion-item class=\"top\">\r\n        <ion-label>Devolução (WEB)</ion-label>\r\n        <ion-button>{{anlDevWeb?.meta * 100 | number : '1.2-2' }} %</ion-button>\r\n        <ion-button>{{anlDevWeb?.meta * 100 | number : '1.2-2' }} %</ion-button>\r\n        <ion-button>{{anlDevWeb?.realizado * 100 | number : '1.2-2' }} %</ion-button>\r\n        <ion-button>{{(anlDevWeb?.realizado - anlDevWeb?.meta) / anlDevWeb?.meta | number : '1.2-2' }} %</ion-button>\r\n      </ion-item>\r\n    </P>\r\n    <P>\r\n      <ion-item class=\"top\">\r\n        <ion-label>Bloqueio</ion-label>\r\n        <ion-button>{{anlBloq?.meta * 100 | number : '1.2-2' }} %</ion-button>\r\n        <ion-button>{{anlBloq?.meta * 100 | number : '1.2-2' }} %</ion-button>\r\n        <ion-button>{{anlBloq?.realizado * 100 | number : '1.2-2' }} %</ion-button>\r\n        <ion-button>{{(anlBloq?.realizado - anlBloq?.meta) / anlBloq?.meta | number : '1.2-2' }} %</ion-button>\r\n      </ion-item>\r\n    </P>\r\n    <P>\r\n      <ion-item class=\"top\">\r\n        <ion-label>Lead Time Interno Total (visão CD)</ion-label>\r\n        <ion-button>{{anlLeadTime?.meta}}</ion-button>\r\n        <ion-button>{{anlLeadTime?.meta}}</ion-button>\r\n        <ion-button>{{anlLeadTime?.realizado}}</ion-button>\r\n        <ion-button>{{(anlLeadTime?.realizado - anlLeadTime?.meta) / anlLeadTime?.meta | number : '1.2-2' }} %\r\n        </ion-button>\r\n      </ion-item>\r\n    </P>\r\n    <P>\r\n      <ion-item class=\"top\">\r\n        <ion-label [routerLink]=\"['/upm']\">UPM Separação Total</ion-label>\r\n        <ion-button>{{anlUpmSepTotal?.meta | number : '1.0-0' }}</ion-button>\r\n        <ion-button>{{anlUpmSepTotal?.meta | number : '1.0-0' }}</ion-button>\r\n        <ion-button>{{anlUpmSepTotal?.realizado | number : '1.0-0' }}</ion-button>\r\n        <ion-button>{{(anlUpmSepTotal?.realizado - anlUpmSepTotal?.meta) / anlUpmSepTotal?.meta | number : '1.2-2' }} %\r\n        </ion-button>\r\n      </ion-item>\r\n    </P>\r\n    <P>\r\n      <ion-item class=\"top\">\r\n        <ion-label>UPM Auditoria Total</ion-label>\r\n        <ion-button>{{anlUpmAudTotal?.meta | number : '1.0-0' }}</ion-button>\r\n        <ion-button>{{anlUpmAudTotal?.meta | number : '1.0-0' }}</ion-button>\r\n        <ion-button>{{anlUpmAudTotal?.realizado | number : '1.0-0' }}</ion-button>\r\n        <ion-button>{{(anlUpmAudTotal?.realizado - anlUpmAudTotal?.meta) / anlUpmAudTotal?.meta | number : '1.2-2' }} %\r\n        </ion-button>\r\n      </ion-item>\r\n    </P>\r\n    <P>\r\n      <ion-item class=\"top\">\r\n        <ion-label>UPM Separação Linha</ion-label>\r\n        <ion-button>{{anlUpmSepLinha?.meta | number : '1.0-0' }}</ion-button>\r\n        <ion-button>{{anlUpmSepLinha?.meta | number : '1.0-0' }}</ion-button>\r\n        <ion-button>{{anlUpmSepLinha?.realizado | number : '1.0-0' }}</ion-button>\r\n        <ion-button>{{(anlUpmSepLinha?.realizado - anlUpmSepLinha?.meta) / anlUpmSepLinha?.meta | number : '1.2-2' }} %\r\n        </ion-button>\r\n      </ion-item>\r\n    </P>\r\n    <P>\r\n      <ion-item class=\"top\">\r\n        <ion-label>UPM Auditoria linha</ion-label>\r\n        <ion-button>{{anlUpmAudLinha?.meta | number : '1.0-0' }}</ion-button>\r\n        <ion-button>{{anlUpmAudLinha?.meta | number : '1.0-0' }}</ion-button>\r\n        <ion-button>{{anlUpmAudLinha?.realizado | number : '1.0-0' }}</ion-button>\r\n        <ion-button>{{(anlUpmAudLinha?.realizado - anlUpmAudLinha?.meta) / anlUpmAudLinha?.meta | number : '1.2-2' }} %\r\n        </ion-button>\r\n      </ion-item>\r\n    </P>\r\n    <P>\r\n      <ion-item class=\"top\">\r\n        <ion-label>UPM Separação Psico</ion-label>\r\n        <ion-button>{{anlUpmSepPsico?.meta | number : '1.0-0' }}</ion-button>\r\n        <ion-button>{{anlUpmSepPsico?.meta | number : '1.0-0' }}</ion-button>\r\n        <ion-button>{{anlUpmSepPsico?.realizado | number : '1.0-0' }}</ion-button>\r\n        <ion-button>{{(anlUpmSepPsico?.realizado - anlUpmSepPsico?.meta) / anlUpmSepPsico?.meta | number : '1.2-2' }} %\r\n        </ion-button>\r\n      </ion-item>\r\n    </P>\r\n    <P>\r\n      <ion-item class=\"top\"> \r\n        <ion-label>UPM Auditoria Psico </ion-label>\r\n        <ion-button>{{anlUpmAudPsico?.meta | number : '1.0-0' }}</ion-button>\r\n        <ion-button>{{anlUpmAudPsico?.meta | number : '1.0-0' }}</ion-button>\r\n        <ion-button>{{anlUpmAudPsico?.realizado | number : '1.0-0' }}</ion-button>\r\n        <ion-button>{{(anlUpmAudPsico?.realizado - anlUpmAudPsico?.meta) / anlUpmAudPsico?.meta | number : '1.2-2' }} %\r\n        </ion-button>\r\n      </ion-item>\r\n    </P>\r\n    <P>\r\n      <ion-item class=\"top\">\r\n        <ion-label>Acuracidade Lote</ion-label>\r\n        <ion-button>{{anlAcuLote?.meta * 100 }} %</ion-button>\r\n        <ion-button>{{anlAcuLote?.meta * 100 }} %</ion-button>\r\n        <ion-button>{{anlAcuLote?.realizado * 100 }} %</ion-button>\r\n        <ion-button>{{(anlAcuLote?.realizado - anlAcuLote?.meta) / anlAcuLote?.meta | number : '1.2-2' }} %</ion-button>\r\n      </ion-item>\r\n    </P>\r\n    <P>\r\n      <ion-item class=\"top\">\r\n        <ion-label>FEFO - Reposição Lote Antigo</ion-label>\r\n        <ion-button>{{anlFefo?.meta * 100 }} %</ion-button>\r\n        <ion-button>{{anlFefo?.meta * 100 }} %</ion-button>\r\n        <ion-button>{{anlFefo?.realizado * 100 }} %</ion-button>\r\n        <ion-button>{{(anlFefo?.realizado - anlFefo?.meta) / anlFefo?.meta | number : '1.2-2' }} %</ion-button>\r\n      </ion-item>\r\n    </P>\r\n    <P>\r\n      <ion-item class=\"top\">\r\n        <ion-label>Unidades Vendidas Total</ion-label>\r\n        <ion-button>{{anlUnidades?.meta}}</ion-button>\r\n        <ion-button>{{anlUnidades?.meta}}</ion-button>\r\n        <ion-button>{{anlUnidades?.realizado}}</ion-button>\r\n        <ion-button>{{(anlUnidades?.realizado - anlUnidades?.meta) / anlUnidades?.meta }} %</ion-button>\r\n      </ion-item>\r\n    </P>\r\n    <P>\r\n      <ion-item class=\"top\">\r\n        <ion-label>Venda</ion-label>\r\n        <ion-button>R${{anlVenda?.meta }}</ion-button>\r\n        <ion-button>R${{anlVenda?.meta}}</ion-button>\r\n        <ion-button>R${{anlVenda?.realizado}}</ion-button>\r\n        <ion-button>{{(anlVenda?.realizado - anlVenda?.meta) / anlVenda?.meta  }} %</ion-button>\r\n      </ion-item>\r\n    </P>\r\n\r\n\r\n  </ion-card> \r\n</ion-content>"

/***/ }),

/***/ "./src/app/pages/home/home.model.ts":
/*!******************************************!*\
  !*** ./src/app/pages/home/home.model.ts ***!
  \******************************************/
/*! exports provided: Analise */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Analise", function() { return Analise; });
class Analise {
}


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

module.exports = "@charset \"UTF-8\";\ncabeçalho da pagina home .top {\n  position: fixed;\n  margin-bottom: 600px !important;\n  z-index: 999;\n}\np {\n  margin-top: 60px;\n  margin-bottom: -50px;\n}\n.alto {\n  --background: url(\"/assets/img/GrupoSC-top.png\") 0 0/100% 100% no-repeat;\n  max-height: 65px;\n}\n.pincipal span {\n  color: #ffffff;\n}\n.pincipal ion-item {\n  --border-radius: 5px;\n}\n.pincipal ion-label {\n  font-size: 9px;\n  white-space: pre-line;\n}\n.pincipal ion-button {\n  width: 90;\n  height: 100;\n  max-height: 40px;\n  min-height: 40px;\n  max-width: 50px;\n  min-width: 50px;\n  font-size: 9px;\n  white-space: pre-line;\n  --border-radius: 6px;\n}\n.dados {\n  margin-top: -50px;\n}\n.dados ion-slides {\n  height: 7%;\n}\n.dados span {\n  color: #ffffff;\n}\n.dados ion-item {\n  --border-radius: 5px;\n}\n.dados ion-label {\n  font-size: 9px;\n  white-space: pre-line;\n}\n.dados ion-button {\n  width: 90;\n  height: 100;\n  max-height: 40px;\n  min-height: 40px;\n  max-width: 50px;\n  min-width: 50px;\n  font-size: 9px;\n  white-space: pre-line;\n  --border-radius: 6px;\n}\n.baixo {\n  --background: url(\"/assets/img/GrupoSC-d.png\") 0 0/100% 100% no-repeat;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvcGFnZXMvaG9tZS9ob21lLnBhZ2Uuc2NzcyIsInNyYy9hcHAvcGFnZXMvaG9tZS9DOlxcRGVzZW52b2x2aW1lbnRvXFxUQ0NcXFYwMFxcR3J1cG9TQy9zcmNcXGFwcFxccGFnZXNcXGhvbWVcXGhvbWUucGFnZS5zY3NzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBLGdCQUFnQjtBQ0FoQjtFQUVRLGVBQUE7RUFDQSwrQkFBQTtFQUNBLFlBQUE7QURDUjtBQ0VJO0VBQ0ksZ0JBQUE7RUFDQSxvQkFBQTtBRENSO0FDRUk7RUFDSSx3RUFBQTtFQUNBLGdCQUFBO0FEQ1I7QUNNRztFQUNLLGNBQUE7QURIUjtBQ09JO0VBQ0ksb0JBQUE7QURMUjtBQ1NJO0VBQ0ksY0FBQTtFQUNBLHFCQUFBO0FEUFI7QUNVVTtFQUNFLFNBQUE7RUFDQSxXQUFBO0VBQ0EsZ0JBQUE7RUFDQSxnQkFBQTtFQUNBLGVBQUE7RUFDQSxlQUFBO0VBQ0EsY0FBQTtFQUNBLHFCQUFBO0VBQ0Esb0JBQUE7QURSWjtBQ2FBO0VBRUksaUJBQUE7QURYSjtBQ2FJO0VBQ0ksVUFBQTtBRFhSO0FDY0k7RUFDSSxjQUFBO0FEWlI7QUNnQkk7RUFDSSxvQkFBQTtBRGRSO0FDa0JJO0VBQ0ksY0FBQTtFQUNBLHFCQUFBO0FEaEJSO0FDbUJJO0VBQ0ksU0FBQTtFQUNBLFdBQUE7RUFDQSxnQkFBQTtFQUNBLGdCQUFBO0VBQ0EsZUFBQTtFQUNBLGVBQUE7RUFDQSxjQUFBO0VBQ0EscUJBQUE7RUFDQSxvQkFBQTtBRGpCUjtBQ3VCQTtFQUNJLHNFQUFBO0FEcEJKIiwiZmlsZSI6InNyYy9hcHAvcGFnZXMvaG9tZS9ob21lLnBhZ2Uuc2NzcyIsInNvdXJjZXNDb250ZW50IjpbIkBjaGFyc2V0IFwiVVRGLThcIjtcbmNhYmXDp2FsaG8gZGEgcGFnaW5hIGhvbWUgLnRvcCB7XG4gIHBvc2l0aW9uOiBmaXhlZDtcbiAgbWFyZ2luLWJvdHRvbTogNjAwcHggIWltcG9ydGFudDtcbiAgei1pbmRleDogOTk5O1xufVxuXG5wIHtcbiAgbWFyZ2luLXRvcDogNjBweDtcbiAgbWFyZ2luLWJvdHRvbTogLTUwcHg7XG59XG5cbi5hbHRvIHtcbiAgLS1iYWNrZ3JvdW5kOiB1cmwoXCIvYXNzZXRzL2ltZy9HcnVwb1NDLXRvcC5wbmdcIikgMCAwLzEwMCUgMTAwJSBuby1yZXBlYXQ7XG4gIG1heC1oZWlnaHQ6IDY1cHg7XG59XG5cbi5waW5jaXBhbCBzcGFuIHtcbiAgY29sb3I6ICNmZmZmZmY7XG59XG4ucGluY2lwYWwgaW9uLWl0ZW0ge1xuICAtLWJvcmRlci1yYWRpdXM6IDVweDtcbn1cbi5waW5jaXBhbCBpb24tbGFiZWwge1xuICBmb250LXNpemU6IDlweDtcbiAgd2hpdGUtc3BhY2U6IHByZS1saW5lO1xufVxuLnBpbmNpcGFsIGlvbi1idXR0b24ge1xuICB3aWR0aDogOTA7XG4gIGhlaWdodDogMTAwO1xuICBtYXgtaGVpZ2h0OiA0MHB4O1xuICBtaW4taGVpZ2h0OiA0MHB4O1xuICBtYXgtd2lkdGg6IDUwcHg7XG4gIG1pbi13aWR0aDogNTBweDtcbiAgZm9udC1zaXplOiA5cHg7XG4gIHdoaXRlLXNwYWNlOiBwcmUtbGluZTtcbiAgLS1ib3JkZXItcmFkaXVzOiA2cHg7XG59XG5cbi5kYWRvcyB7XG4gIG1hcmdpbi10b3A6IC01MHB4O1xufVxuLmRhZG9zIGlvbi1zbGlkZXMge1xuICBoZWlnaHQ6IDclO1xufVxuLmRhZG9zIHNwYW4ge1xuICBjb2xvcjogI2ZmZmZmZjtcbn1cbi5kYWRvcyBpb24taXRlbSB7XG4gIC0tYm9yZGVyLXJhZGl1czogNXB4O1xufVxuLmRhZG9zIGlvbi1sYWJlbCB7XG4gIGZvbnQtc2l6ZTogOXB4O1xuICB3aGl0ZS1zcGFjZTogcHJlLWxpbmU7XG59XG4uZGFkb3MgaW9uLWJ1dHRvbiB7XG4gIHdpZHRoOiA5MDtcbiAgaGVpZ2h0OiAxMDA7XG4gIG1heC1oZWlnaHQ6IDQwcHg7XG4gIG1pbi1oZWlnaHQ6IDQwcHg7XG4gIG1heC13aWR0aDogNTBweDtcbiAgbWluLXdpZHRoOiA1MHB4O1xuICBmb250LXNpemU6IDlweDtcbiAgd2hpdGUtc3BhY2U6IHByZS1saW5lO1xuICAtLWJvcmRlci1yYWRpdXM6IDZweDtcbn1cblxuLmJhaXhvIHtcbiAgLS1iYWNrZ3JvdW5kOiB1cmwoXCIvYXNzZXRzL2ltZy9HcnVwb1NDLWQucG5nXCIpIDAgMC8xMDAlIDEwMCUgbm8tcmVwZWF0O1xufSIsImNhYmXDp2FsaG8gZGEgcGFnaW5hIGhvbWVcclxuICAgIC50b3Age1xyXG4gICAgICAgIHBvc2l0aW9uOiBmaXhlZDtcclxuICAgICAgICBtYXJnaW4tYm90dG9tOiA2MDBweCAhaW1wb3J0YW50O1xyXG4gICAgICAgIHotaW5kZXg6IDk5OTsgICAgICAgXHJcbiAgICB9XHJcblxyXG4gICAgcHtcclxuICAgICAgICBtYXJnaW4tdG9wOiA2MHB4O1xyXG4gICAgICAgIG1hcmdpbi1ib3R0b206IC01MHB4O1xyXG4gICAgfVxyXG5cclxuICAgIC5hbHRvIHtcclxuICAgICAgICAtLWJhY2tncm91bmQ6IHVybCgnL2Fzc2V0cy9pbWcvR3J1cG9TQy10b3AucG5nJykgMCAwLzEwMCUgMTAwJSBuby1yZXBlYXQ7XHJcbiAgICAgICAgbWF4LWhlaWdodDogNjVweDtcclxuICAgIH1cclxuXHJcblxyXG4ucGluY2lwYWwgeyAgICBcclxuXHJcbiAgICBcclxuICAgc3BhbiB7XHJcbiAgICAgICAgY29sb3I6ICNmZmZmZmY7ICAgXHJcbiAgICAgICAgXHJcbiAgICB9XHJcbiAgICBcclxuICAgIGlvbi1pdGVtIHsgIFxyXG4gICAgICAgIC0tYm9yZGVyLXJhZGl1czogNXB4OyAgICBcclxuICAgICAgICAgICAgIFxyXG4gICAgfVxyXG5cclxuICAgIGlvbi1sYWJlbCB7XHJcbiAgICAgICAgZm9udC1zaXplOiA5cHg7XHJcbiAgICAgICAgd2hpdGUtc3BhY2U6IHByZS1saW5lOyAgIFxyXG4gICAgfVxyXG5cclxuICAgICAgICAgIGlvbi1idXR0b24ge1xyXG4gICAgICAgICAgICB3aWR0aDo5MDtcclxuICAgICAgICAgICAgaGVpZ2h0OjEwMDtcclxuICAgICAgICAgICAgbWF4LWhlaWdodDogNDBweDtcclxuICAgICAgICAgICAgbWluLWhlaWdodDogNDBweDtcclxuICAgICAgICAgICAgbWF4LXdpZHRoOiA1MHB4O1xyXG4gICAgICAgICAgICBtaW4td2lkdGg6IDUwcHg7XHJcbiAgICAgICAgICAgIGZvbnQtc2l6ZTogOXB4O1xyXG4gICAgICAgICAgICB3aGl0ZS1zcGFjZTogcHJlLWxpbmU7ICAgICAgICAgICAgXHJcbiAgICAgICAgICAgIC0tYm9yZGVyLXJhZGl1czogNnB4OyAgICAgXHJcbiAgICAgICAgfVxyXG5cclxufVxyXG5cclxuLmRhZG9zIHtcclxuXHJcbiAgICBtYXJnaW4tdG9wOiAtNTBweDtcclxuXHJcbiAgICBpb24tc2xpZGVzIHtcclxuICAgICAgICBoZWlnaHQ6IDclOyAgICAgICAgICAgICAgICBcclxuICAgIH1cclxuXHJcbiAgICBzcGFuIHtcclxuICAgICAgICBjb2xvcjogI2ZmZmZmZjsgICBcclxuICAgICAgICBcclxuICAgIH1cclxuICAgIFxyXG4gICAgaW9uLWl0ZW0geyAgXHJcbiAgICAgICAgLS1ib3JkZXItcmFkaXVzOiA1cHg7ICAgIFxyXG4gICAgICAgICAgICAgXHJcbiAgICB9XHJcblxyXG4gICAgaW9uLWxhYmVsIHtcclxuICAgICAgICBmb250LXNpemU6IDlweDtcclxuICAgICAgICB3aGl0ZS1zcGFjZTogcHJlLWxpbmU7ICAgXHJcbiAgICB9XHJcblxyXG4gICAgaW9uLWJ1dHRvbiB7XHJcbiAgICAgICAgd2lkdGg6OTA7XHJcbiAgICAgICAgaGVpZ2h0OjEwMDtcclxuICAgICAgICBtYXgtaGVpZ2h0OiA0MHB4O1xyXG4gICAgICAgIG1pbi1oZWlnaHQ6IDQwcHg7XHJcbiAgICAgICAgbWF4LXdpZHRoOiA1MHB4O1xyXG4gICAgICAgIG1pbi13aWR0aDogNTBweDtcclxuICAgICAgICBmb250LXNpemU6IDlweDtcclxuICAgICAgICB3aGl0ZS1zcGFjZTogcHJlLWxpbmU7ICAgICAgICAgICAgXHJcbiAgICAgICAgLS1ib3JkZXItcmFkaXVzOiA2cHg7ICAgICBcclxuICAgIH1cclxuXHJcbiAgICAgIFxyXG59XHJcblxyXG4uYmFpeG8geyAgICAgIFxyXG4gICAgLS1iYWNrZ3JvdW5kOiB1cmwoJy9hc3NldHMvaW1nL0dydXBvU0MtZC5wbmcnKSAwIDAvMTAwJSAxMDAlIG5vLXJlcGVhdDtcclxuICAgIC8vIGJhY2tncm91bmQtcmVwZWF0OiBuby1yZXBlYXQ7ICAgIFxyXG4gICAgLy8gYmFja2dyb3VuZC1zaXplOiBjb3ZlciA7XHJcbn1cclxuICAgICAgIl19 */"

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
/* harmony import */ var _home_home_model__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../home/home.model */ "./src/app/pages/home/home.model.ts");





let HomePage = class HomePage {
    constructor(service) {
        this.service = service;
        this.anlQuebra = new _home_home_model__WEBPACK_IMPORTED_MODULE_4__["Analise"]();
        this.anlChegada = new _home_home_model__WEBPACK_IMPORTED_MODULE_4__["Analise"]();
        this.anlSaida = new _home_home_model__WEBPACK_IMPORTED_MODULE_4__["Analise"]();
        this.anlCancT = new _home_home_model__WEBPACK_IMPORTED_MODULE_4__["Analise"]();
        this.anlCancO = new _home_home_model__WEBPACK_IMPORTED_MODULE_4__["Analise"]();
        this.anlCancC = new _home_home_model__WEBPACK_IMPORTED_MODULE_4__["Analise"]();
        this.anlDevT = new _home_home_model__WEBPACK_IMPORTED_MODULE_4__["Analise"]();
        this.anlDevLog = new _home_home_model__WEBPACK_IMPORTED_MODULE_4__["Analise"]();
        this.anlDevCom = new _home_home_model__WEBPACK_IMPORTED_MODULE_4__["Analise"]();
        this.anlDevWeb = new _home_home_model__WEBPACK_IMPORTED_MODULE_4__["Analise"]();
        this.anlBloq = new _home_home_model__WEBPACK_IMPORTED_MODULE_4__["Analise"]();
        this.anlLeadTime = new _home_home_model__WEBPACK_IMPORTED_MODULE_4__["Analise"]();
        this.anlUpmSepTotal = new _home_home_model__WEBPACK_IMPORTED_MODULE_4__["Analise"]();
        this.anlUpmSepLinha = new _home_home_model__WEBPACK_IMPORTED_MODULE_4__["Analise"]();
        this.anlUpmSepPsico = new _home_home_model__WEBPACK_IMPORTED_MODULE_4__["Analise"]();
        this.anlUpmAudTotal = new _home_home_model__WEBPACK_IMPORTED_MODULE_4__["Analise"]();
        this.anlUpmAudLinha = new _home_home_model__WEBPACK_IMPORTED_MODULE_4__["Analise"]();
        this.anlUpmAudPsico = new _home_home_model__WEBPACK_IMPORTED_MODULE_4__["Analise"]();
        this.anlAcuLote = new _home_home_model__WEBPACK_IMPORTED_MODULE_4__["Analise"]();
        this.anlFefo = new _home_home_model__WEBPACK_IMPORTED_MODULE_4__["Analise"]();
        this.anlUnidades = new _home_home_model__WEBPACK_IMPORTED_MODULE_4__["Analise"]();
        this.anlVenda = new _home_home_model__WEBPACK_IMPORTED_MODULE_4__["Analise"]();
    }
    ngOnInit() {
        this.getDados();
        console.log;
    }
    getDados() {
        this.service.getFarol().then((result) => {
            this.analises = result['analises'];
            // console.log(this.analises);
        }).catch((error) => {
            console.error("error: " + error);
        }).finally(() => {
            this.analises.forEach(u => {
                if (u.indicadores == "Quebras GMD + CRI") {
                    this.anlQuebra = u;
                }
                else if (u.indicadores == "Chegadas CD (D ?2)") {
                    this.anlChegada = u;
                }
                else if (u.indicadores == "Saidas CD") {
                    this.anlSaida = u;
                }
                else if (u.indicadores == "Canc. Total") {
                    this.anlCancT = u;
                }
                else if (u.indicadores == "Canc. Operacional") {
                    this.anlCancO = u;
                }
                else if (u.indicadores == "Canc. Comercial") {
                    this.anlCancC = u;
                }
                else if (u.indicadores == "Devolucao Total WEB + BO") {
                    this.anlDevT = u;
                }
                else if (u.indicadores == "Devolucao BO Log") {
                    this.anlDevLog = u;
                }
                else if (u.indicadores == "Devolucao BO Com") {
                    this.anlDevCom = u;
                }
                else if (u.indicadores == "Devolucao (WEB)") {
                    this.anlDevWeb = u;
                }
                else if (u.indicadores == "Bloqueio") {
                    this.anlBloq = u;
                }
                else if (u.indicadores == "Lead Time Interno Total (visao CD)") {
                    this.anlLeadTime = u;
                }
                else if (u.indicadores == "UPM Separacao Total") {
                    this.anlUpmSepTotal = u;
                }
                else if (u.indicadores == "UPM Separacao linha") {
                    this.anlUpmSepLinha = u;
                }
                else if (u.indicadores == "UPM Separacao Psico") {
                    this.anlUpmSepPsico = u;
                }
                else if (u.indicadores == "UPM Auditoria Total") {
                    this.anlUpmAudTotal = u;
                }
                else if (u.indicadores == "UPM Auditoria linha") {
                    this.anlUpmAudLinha = u;
                }
                else if (u.indicadores == "UPM Auditoria Psico") {
                    this.anlUpmAudPsico = u;
                }
                else if (u.indicadores == "Acuracidade Lote") {
                    this.anlAcuLote = u;
                }
                else if (u.indicadores == "FEFO - Reposicao Lote Antigo") {
                    this.anlFefo = u;
                }
                else if (u.indicadores == "Unidades Separadas Total") {
                    this.anlUnidades = u;
                }
                else if (u.indicadores == "Venda") {
                    this.anlVenda = u;
                }
                else {
                    console.log();
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



/***/ })

}]);
//# sourceMappingURL=pages-home-home-module-es2015.js.map