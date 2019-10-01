(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["pages-fechamento-fechamento-module"],{

/***/ "./node_modules/raw-loader/index.js!./src/app/pages/fechamento/fechamento.page.html":
/*!*********************************************************************************!*\
  !*** ./node_modules/raw-loader!./src/app/pages/fechamento/fechamento.page.html ***!
  \*********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "<ion-header color=\"tertiary\">\n  <ion-toolbar color=\"tertiary\">\n    <ion-buttons slot=\"start\">\n      <ion-menu-button></ion-menu-button>\n    </ion-buttons>\n    <ion-title>\n      <span>Indicadores GrupoSC</span>\n    </ion-title>\n  </ion-toolbar>\n</ion-header>\n\n<ion-content class=\"alto\">\n  <ion-card class=\"pincipal\">\n    <ion-item class=\"top\">\n      <ion-label style=\"text-align: center; font-size: 16px\">Fechamento Operacional</ion-label>\n    </ion-item>\n  </ion-card>\n</ion-content>\n\n<ion-content class=\"baixo\">\n  <ion-card class=\"dados\">\n    <P>\n      <ion-item class=\"top\">\n        <ion-label style=\"font-size: 14px\">Data do Fechamento: </ion-label>\n        <ion-input type=\"date\" [(ngModel)]=data></ion-input>\n      </ion-item>\n    </P>\n    <P>\n      <ion-item class=\"top\">\n        <ion-label style=\"font-size: 14px\">Captação Total: </ion-label>\n        <ion-input type=\"number\" [(ngModel)]=total></ion-input>\n      </ion-item>\n    </P>\n    <P>\n      <ion-item class=\"top\">\n        <ion-label style=\"font-size: 14px\">Captação Comercial: </ion-label>\n        <ion-input type=\"number\" [(ngModel)]=comercial></ion-input>\n      </ion-item>\n    </P>\n    <P>\n      <ion-item class=\"top\">\n        <ion-label style=\"font-size: 14px\">Captação Linha: </ion-label>\n        <ion-input type=\"number\" [(ngModel)]=linha></ion-input>\n      </ion-item>\n    </P>\n    <P>\n      <ion-item class=\"top\">\n        <ion-label style=\"font-size: 14px\">Captação Psico: </ion-label>\n        <ion-input type=\"number\" [(ngModel)]=psico></ion-input>\n      </ion-item>\n    </P>\n    <P>\n      <ion-item class=\"top\">\n        <ion-label style=\"font-size: 14px\">Pedido G Unidades: </ion-label>\n        <ion-input type=\"number\" [(ngModel)]=pgunidades></ion-input>\n      </ion-item>\n    </P>\n    <P>\n      <ion-item class=\"top\">\n        <ion-label style=\"font-size: 14px\">Pedido G Volumes: </ion-label>\n        <ion-input type=\"number\" [(ngModel)]=pgvolumes></ion-input>\n      </ion-item>\n    </P>\n    <P>\n      <ion-item class=\"top\">\n        <ion-label style=\"font-size: 14px\">Entrada Incio de Linha: </ion-label>\n        <ion-input type=\"number\" [(ngModel)]=inciolinha></ion-input>\n      </ion-item>\n    </P>\n    <P>\n      <ion-item class=\"top\">\n        <ion-label style=\"font-size: 14px\">Falta Incio de Linha: </ion-label>\n        <ion-input type=\"number\" [(ngModel)]=faltalinha></ion-input>\n      </ion-item>\n    </P>\n    <P>\n      <ion-item class=\"top\">\n        <ion-label style=\"font-size: 14px\">Unidades Conferidas: </ion-label>\n        <ion-input type=\"number\" [(ngModel)]=conferido></ion-input>\n      </ion-item>\n    </P>\n    <P>\n      <ion-item class=\"top\">\n        <ion-label style=\"font-size: 14px\">Falta Confeir: </ion-label>\n        <ion-input type=\"number\" [(ngModel)]=faltaconferir></ion-input>\n      </ion-item>\n    </P>\n    <P>\n      <ion-item class=\"top\">\n        <ion-label style=\"font-size: 14px\">Prev. Termino Linha: </ion-label>\n        <ion-input type=\"number\" [(ngModel)]=tlinha></ion-input>\n      </ion-item>\n    </P>\n    <P>\n      <ion-item class=\"top\">\n        <ion-label style=\"font-size: 14px\">Prev. Termino Conferência: </ion-label>\n        <ion-input type=\"number\" [(ngModel)]=tconferencia></ion-input>\n      </ion-item>\n    </P>\n    <P>\n      <ion-item class=\"top\">\n        <ion-label style=\"font-size: 14px\">Volumes Rota 762: </ion-label>\n        <ion-input type=\"number\" [(ngModel)]=v762></ion-input>\n      </ion-item>\n    </P>\n    <P>\n      <ion-item class=\"top\">\n        <ion-label style=\"font-size: 14px\">Volumes Rota 766: </ion-label>\n        <ion-input type=\"number\" [(ngModel)]=v766></ion-input>\n      </ion-item>\n    </P>\n    <P>\n      <ion-item class=\"top\">\n        <ion-label style=\"font-size: 14px\">Volumes Rota 790: </ion-label>\n        <ion-input type=\"number\" [(ngModel)]=v790></ion-input>\n      </ion-item>\n    </P>\n    <p></p>\n  </ion-card>\n \n    <ion-button class=\"ion-margin-top\" (click)=\"Fechamento()\" color=\"light\" expand=\"block\">Lançar Dados</ion-button>\n  <p></p>\n</ion-content>"

/***/ }),

/***/ "./src/app/pages/fechamento/fechamento.module.ts":
/*!*******************************************************!*\
  !*** ./src/app/pages/fechamento/fechamento.module.ts ***!
  \*******************************************************/
/*! exports provided: FechamentoPageModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "FechamentoPageModule", function() { return FechamentoPageModule; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm2015/core.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/fesm2015/common.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/fesm2015/forms.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/fesm2015/router.js");
/* harmony import */ var _ionic_angular__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @ionic/angular */ "./node_modules/@ionic/angular/dist/fesm5.js");
/* harmony import */ var _fechamento_page__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./fechamento.page */ "./src/app/pages/fechamento/fechamento.page.ts");







const routes = [
    {
        path: '',
        component: _fechamento_page__WEBPACK_IMPORTED_MODULE_6__["FechamentoPage"]
    }
];
let FechamentoPageModule = class FechamentoPageModule {
};
FechamentoPageModule = tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"]([
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["NgModule"])({
        imports: [
            _angular_common__WEBPACK_IMPORTED_MODULE_2__["CommonModule"],
            _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormsModule"],
            _ionic_angular__WEBPACK_IMPORTED_MODULE_5__["IonicModule"],
            _angular_router__WEBPACK_IMPORTED_MODULE_4__["RouterModule"].forChild(routes)
        ],
        declarations: [_fechamento_page__WEBPACK_IMPORTED_MODULE_6__["FechamentoPage"]]
    })
], FechamentoPageModule);



/***/ }),

/***/ "./src/app/pages/fechamento/fechamento.page.scss":
/*!*******************************************************!*\
  !*** ./src/app/pages/fechamento/fechamento.page.scss ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "@charset \"UTF-8\";\ncabeçalho da pagina home .top {\n  position: fixed;\n  margin-bottom: 600px !important;\n  z-index: 999;\n}\np {\n  margin-top: 60px;\n  margin-bottom: -50px;\n}\n.alto {\n  --background: url(\"/assets/img/GrupoSC-top13.png\") 0 0/100% 100% no-repeat;\n  max-height: 65px;\n}\n.pincipal span {\n  color: #ffffff;\n}\n.pincipal ion-item {\n  --border-radius: 5px;\n}\n.pincipal ion-label {\n  font-size: 20px;\n  white-space: pre-line;\n}\n.dados {\n  margin-top: -50px;\n}\n.dados ion-slides {\n  height: 7%;\n}\n.dados span {\n  color: #ffffff;\n}\n.dados ion-item {\n  --border-radius: 5px;\n}\n.dados ion-label {\n  font-size: 9px;\n  white-space: pre-line;\n}\n.dados ion-button {\n  width: 90;\n  height: 100;\n  max-height: 40px;\n  min-height: 40px;\n  max-width: 50px;\n  min-width: 50px;\n  font-size: 9px;\n  white-space: pre-line;\n  --border-radius: 6px;\n}\n.baixo {\n  --background: url(\"/assets/img/GrupoSC-top13.png\") 0 0/100% 100% no-repeat;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvcGFnZXMvZmVjaGFtZW50by9mZWNoYW1lbnRvLnBhZ2Uuc2NzcyIsInNyYy9hcHAvcGFnZXMvZmVjaGFtZW50by9DOlxcRGVzZW52b2x2aW1lbnRvXFxUQ0NcXFYwMFxcR3J1cG9TQy9zcmNcXGFwcFxccGFnZXNcXGZlY2hhbWVudG9cXGZlY2hhbWVudG8ucGFnZS5zY3NzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBLGdCQUFnQjtBQ0FoQjtFQUVRLGVBQUE7RUFDQSwrQkFBQTtFQUNBLFlBQUE7QURDUjtBQ0VJO0VBQ0ksZ0JBQUE7RUFDQSxvQkFBQTtBRENSO0FDRUk7RUFDSSwwRUFBQTtFQUNBLGdCQUFBO0FEQ1I7QUNNRztFQUNLLGNBQUE7QURIUjtBQ09JO0VBQ0ksb0JBQUE7QURMUjtBQ1NJO0VBQ0ksZUFBQTtFQUNBLHFCQUFBO0FEUFI7QUNhQTtFQUVJLGlCQUFBO0FEWEo7QUNhSTtFQUNJLFVBQUE7QURYUjtBQ2NJO0VBQ0ksY0FBQTtBRFpSO0FDZ0JJO0VBQ0ksb0JBQUE7QURkUjtBQ2tCSTtFQUNJLGNBQUE7RUFDQSxxQkFBQTtBRGhCUjtBQ21CSTtFQUNJLFNBQUE7RUFDQSxXQUFBO0VBQ0EsZ0JBQUE7RUFDQSxnQkFBQTtFQUNBLGVBQUE7RUFDQSxlQUFBO0VBQ0EsY0FBQTtFQUNBLHFCQUFBO0VBQ0Esb0JBQUE7QURqQlI7QUN1QkE7RUFDSSwwRUFBQTtBRHBCSiIsImZpbGUiOiJzcmMvYXBwL3BhZ2VzL2ZlY2hhbWVudG8vZmVjaGFtZW50by5wYWdlLnNjc3MiLCJzb3VyY2VzQ29udGVudCI6WyJAY2hhcnNldCBcIlVURi04XCI7XG5jYWJlw6dhbGhvIGRhIHBhZ2luYSBob21lIC50b3Age1xuICBwb3NpdGlvbjogZml4ZWQ7XG4gIG1hcmdpbi1ib3R0b206IDYwMHB4ICFpbXBvcnRhbnQ7XG4gIHotaW5kZXg6IDk5OTtcbn1cblxucCB7XG4gIG1hcmdpbi10b3A6IDYwcHg7XG4gIG1hcmdpbi1ib3R0b206IC01MHB4O1xufVxuXG4uYWx0byB7XG4gIC0tYmFja2dyb3VuZDogdXJsKFwiL2Fzc2V0cy9pbWcvR3J1cG9TQy10b3AxMy5wbmdcIikgMCAwLzEwMCUgMTAwJSBuby1yZXBlYXQ7XG4gIG1heC1oZWlnaHQ6IDY1cHg7XG59XG5cbi5waW5jaXBhbCBzcGFuIHtcbiAgY29sb3I6ICNmZmZmZmY7XG59XG4ucGluY2lwYWwgaW9uLWl0ZW0ge1xuICAtLWJvcmRlci1yYWRpdXM6IDVweDtcbn1cbi5waW5jaXBhbCBpb24tbGFiZWwge1xuICBmb250LXNpemU6IDIwcHg7XG4gIHdoaXRlLXNwYWNlOiBwcmUtbGluZTtcbn1cblxuLmRhZG9zIHtcbiAgbWFyZ2luLXRvcDogLTUwcHg7XG59XG4uZGFkb3MgaW9uLXNsaWRlcyB7XG4gIGhlaWdodDogNyU7XG59XG4uZGFkb3Mgc3BhbiB7XG4gIGNvbG9yOiAjZmZmZmZmO1xufVxuLmRhZG9zIGlvbi1pdGVtIHtcbiAgLS1ib3JkZXItcmFkaXVzOiA1cHg7XG59XG4uZGFkb3MgaW9uLWxhYmVsIHtcbiAgZm9udC1zaXplOiA5cHg7XG4gIHdoaXRlLXNwYWNlOiBwcmUtbGluZTtcbn1cbi5kYWRvcyBpb24tYnV0dG9uIHtcbiAgd2lkdGg6IDkwO1xuICBoZWlnaHQ6IDEwMDtcbiAgbWF4LWhlaWdodDogNDBweDtcbiAgbWluLWhlaWdodDogNDBweDtcbiAgbWF4LXdpZHRoOiA1MHB4O1xuICBtaW4td2lkdGg6IDUwcHg7XG4gIGZvbnQtc2l6ZTogOXB4O1xuICB3aGl0ZS1zcGFjZTogcHJlLWxpbmU7XG4gIC0tYm9yZGVyLXJhZGl1czogNnB4O1xufVxuXG4uYmFpeG8ge1xuICAtLWJhY2tncm91bmQ6IHVybChcIi9hc3NldHMvaW1nL0dydXBvU0MtdG9wMTMucG5nXCIpIDAgMC8xMDAlIDEwMCUgbm8tcmVwZWF0O1xufSIsImNhYmXDp2FsaG8gZGEgcGFnaW5hIGhvbWVcclxuICAgIC50b3Age1xyXG4gICAgICAgIHBvc2l0aW9uOiBmaXhlZDtcclxuICAgICAgICBtYXJnaW4tYm90dG9tOiA2MDBweCAhaW1wb3J0YW50O1xyXG4gICAgICAgIHotaW5kZXg6IDk5OTsgICAgICAgXHJcbiAgICB9XHJcblxyXG4gICAgcHtcclxuICAgICAgICBtYXJnaW4tdG9wOiA2MHB4O1xyXG4gICAgICAgIG1hcmdpbi1ib3R0b206IC01MHB4O1xyXG4gICAgfVxyXG5cclxuICAgIC5hbHRvIHtcclxuICAgICAgICAtLWJhY2tncm91bmQ6IHVybCgnL2Fzc2V0cy9pbWcvR3J1cG9TQy10b3AxMy5wbmcnKSAwIDAvMTAwJSAxMDAlIG5vLXJlcGVhdDtcclxuICAgICAgICBtYXgtaGVpZ2h0OiA2NXB4O1xyXG4gICAgfVxyXG5cclxuXHJcbi5waW5jaXBhbCB7ICAgIFxyXG5cclxuICAgIFxyXG4gICBzcGFuIHtcclxuICAgICAgICBjb2xvcjogI2ZmZmZmZjsgICBcclxuICAgICAgICBcclxuICAgIH1cclxuICAgIFxyXG4gICAgaW9uLWl0ZW0geyAgXHJcbiAgICAgICAgLS1ib3JkZXItcmFkaXVzOiA1cHg7ICAgIFxyXG4gICAgICAgICAgICAgXHJcbiAgICB9XHJcblxyXG4gICAgaW9uLWxhYmVsIHtcclxuICAgICAgICBmb250LXNpemU6IDIwcHg7XHJcbiAgICAgICAgd2hpdGUtc3BhY2U6IHByZS1saW5lOyAgIFxyXG4gICAgfVxyXG4gICAgICAgIFxyXG5cclxufVxyXG5cclxuLmRhZG9zIHtcclxuXHJcbiAgICBtYXJnaW4tdG9wOiAtNTBweDtcclxuXHJcbiAgICBpb24tc2xpZGVzIHtcclxuICAgICAgICBoZWlnaHQ6IDclOyAgICAgICAgICAgICAgICBcclxuICAgIH1cclxuXHJcbiAgICBzcGFuIHtcclxuICAgICAgICBjb2xvcjogI2ZmZmZmZjsgICBcclxuICAgICAgICBcclxuICAgIH1cclxuICAgIFxyXG4gICAgaW9uLWl0ZW0geyAgXHJcbiAgICAgICAgLS1ib3JkZXItcmFkaXVzOiA1cHg7ICAgIFxyXG4gICAgICAgICAgICAgXHJcbiAgICB9XHJcblxyXG4gICAgaW9uLWxhYmVsIHtcclxuICAgICAgICBmb250LXNpemU6IDlweDtcclxuICAgICAgICB3aGl0ZS1zcGFjZTogcHJlLWxpbmU7ICAgXHJcbiAgICB9XHJcblxyXG4gICAgaW9uLWJ1dHRvbiB7XHJcbiAgICAgICAgd2lkdGg6OTA7XHJcbiAgICAgICAgaGVpZ2h0OjEwMDtcclxuICAgICAgICBtYXgtaGVpZ2h0OiA0MHB4O1xyXG4gICAgICAgIG1pbi1oZWlnaHQ6IDQwcHg7XHJcbiAgICAgICAgbWF4LXdpZHRoOiA1MHB4O1xyXG4gICAgICAgIG1pbi13aWR0aDogNTBweDtcclxuICAgICAgICBmb250LXNpemU6IDlweDtcclxuICAgICAgICB3aGl0ZS1zcGFjZTogcHJlLWxpbmU7ICAgICAgICAgICAgXHJcbiAgICAgICAgLS1ib3JkZXItcmFkaXVzOiA2cHg7ICAgICBcclxuICAgIH1cclxuXHJcbiAgICAgIFxyXG59XHJcblxyXG4uYmFpeG8geyAgICAgIFxyXG4gICAgLS1iYWNrZ3JvdW5kOiB1cmwoJy9hc3NldHMvaW1nL0dydXBvU0MtdG9wMTMucG5nJykgMCAwLzEwMCUgMTAwJSBuby1yZXBlYXQ7XHJcbiAgICAvLyBiYWNrZ3JvdW5kLXJlcGVhdDogbm8tcmVwZWF0OyAgICBcclxuICAgIC8vIGJhY2tncm91bmQtc2l6ZTogY292ZXIgO1xyXG59XHJcbiAgICAgICJdfQ== */"

/***/ }),

/***/ "./src/app/pages/fechamento/fechamento.page.ts":
/*!*****************************************************!*\
  !*** ./src/app/pages/fechamento/fechamento.page.ts ***!
  \*****************************************************/
/*! exports provided: FechamentoPage */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "FechamentoPage", function() { return FechamentoPage; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm2015/core.js");
/* harmony import */ var _ionic_angular__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @ionic/angular */ "./node_modules/@ionic/angular/dist/fesm5.js");
/* harmony import */ var _services_dados_sc_service__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../services/dados-sc.service */ "./src/app/pages/services/dados-sc.service.ts");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/fesm2015/router.js");





//import da lib responsavel pelo recebimeto de parametros

let FechamentoPage = class FechamentoPage {
    constructor(navCtrl, service, route) {
        this.navCtrl = navCtrl;
        this.service = service;
        this.route = route;
    }
    ngOnInit() {
    }
    Fechamento() {
        this.service.getFechamento(this.data, this.total, this.comercial, this.linha, this.psico, this.pgunidades, this.pgvolumes, this.inciolinha, this.faltalinha, this.conferido, this.faltaconferir, this.tlinha, this.tconferencia, this.v762, this.v766, this.v790).then((result) => {
            this.fechamentos = result['fecha'];
            console.log("getFechamento");
        }).catch((error) => {
            console.error(error);
        });
    }
};
FechamentoPage.ctorParameters = () => [
    { type: _ionic_angular__WEBPACK_IMPORTED_MODULE_2__["NavController"] },
    { type: _services_dados_sc_service__WEBPACK_IMPORTED_MODULE_3__["DadosSCService"] },
    { type: _angular_router__WEBPACK_IMPORTED_MODULE_4__["ActivatedRoute"] }
];
tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"]([
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["ViewChild"])(_ionic_angular__WEBPACK_IMPORTED_MODULE_2__["IonSlides"], { static: false }),
    tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"]("design:type", _ionic_angular__WEBPACK_IMPORTED_MODULE_2__["IonSlides"])
], FechamentoPage.prototype, "slides", void 0);
FechamentoPage = tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"]([
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
        selector: 'app-fechamento',
        template: __webpack_require__(/*! raw-loader!./fechamento.page.html */ "./node_modules/raw-loader/index.js!./src/app/pages/fechamento/fechamento.page.html"),
        styles: [__webpack_require__(/*! ./fechamento.page.scss */ "./src/app/pages/fechamento/fechamento.page.scss")]
    }),
    tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"]("design:paramtypes", [_ionic_angular__WEBPACK_IMPORTED_MODULE_2__["NavController"], _services_dados_sc_service__WEBPACK_IMPORTED_MODULE_3__["DadosSCService"], _angular_router__WEBPACK_IMPORTED_MODULE_4__["ActivatedRoute"]])
], FechamentoPage);



/***/ })

}]);
//# sourceMappingURL=pages-fechamento-fechamento-module-es2015.js.map