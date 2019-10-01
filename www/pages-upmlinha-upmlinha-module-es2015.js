(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["pages-upmlinha-upmlinha-module"],{

/***/ "./node_modules/raw-loader/index.js!./src/app/pages/upmlinha/upmlinha.page.html":
/*!*****************************************************************************!*\
  !*** ./node_modules/raw-loader!./src/app/pages/upmlinha/upmlinha.page.html ***!
  \*****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "<ion-header color=\"tertiary\">\r\n  <ion-toolbar color=\"tertiary\">\r\n    <ion-buttons slot=\"start\">\r\n      <ion-menu-button></ion-menu-button>\r\n    </ion-buttons>\r\n    <ion-title>\r\n      <span>Indicadores GrupoSC</span>\r\n    </ion-title>\r\n  </ion-toolbar>\r\n</ion-header>\r\n\r\n\r\n<ion-content class=\"alto\">\r\n  <ion-card class=\"pincipal\">\r\n    <p>\r\n      <ion-card-subtitle style=\"text-align:center; color: aliceblue; font-size: 16px\">Analise da UPM\r\n      </ion-card-subtitle>\r\n    </p>\r\n    <ion-item class=\"top\">\r\n      <ion-label>UPM</ion-label>\r\n      <ion-button color=\"danger\" class=\"menu\">Meta Mensal</ion-button>\r\n      <ion-button color=\"danger\" class=\"menu\">UPM</ion-button>\r\n      <ion-button color=\"danger\" class=\"menu\">Erros</ion-button>\r\n      <ion-button color=\"danger\" class=\"menu\">Qt Conf.</ion-button>\r\n    </ion-item>\r\n  </ion-card>\r\n  <ion-card class=\"dados\">\r\n    <ion-item *ngFor=\"let upm of upms\">\r\n      <ion-label>{{upm.tipo}}</ion-label>\r\n      <ion-button>{{upm.meta | number : '1.0-0' }}</ion-button>\r\n      <ion-button>{{upm.upm | number : '1.0-0' }}</ion-button>\r\n      <ion-button>{{upm.erros | number : '1.0-0' }}</ion-button>\r\n      <ion-button>{{upm.conferencia | number : '1.0-0' }}</ion-button>\r\n    </ion-item>\r\n  </ion-card>\r\n</ion-content>\r\n\r\n<ion-content class=\"baixo\">\r\n \r\n  <ion-card class=\"grafico\">\r\n    <ion-card-header>\r\n    </ion-card-header>\r\n    <ion-card-content>\r\n      <canvas #barCanvas></canvas>\r\n    </ion-card-content>\r\n  </ion-card>\r\n  <ion-card class=\"grafico\">\r\n    <ion-card-header>\r\n    </ion-card-header>\r\n    <ion-card-content>\r\n      <canvas #barCanvas2></canvas>\r\n    </ion-card-content>\r\n  </ion-card>\r\n  <ion-card class=\"grafico\">\r\n    <ion-card-header>\r\n    </ion-card-header>\r\n    <ion-card-content>\r\n      <canvas #barCanvas3></canvas>\r\n    </ion-card-content>\r\n  </ion-card>\r\n</ion-content>"

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
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm2015/core.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/fesm2015/common.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/fesm2015/forms.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/fesm2015/router.js");
/* harmony import */ var _ionic_angular__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @ionic/angular */ "./node_modules/@ionic/angular/dist/fesm5.js");
/* harmony import */ var _upmlinha_page__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./upmlinha.page */ "./src/app/pages/upmlinha/upmlinha.page.ts");







const routes = [
    {
        path: '',
        component: _upmlinha_page__WEBPACK_IMPORTED_MODULE_6__["UpmlinhaPage"]
    }
];
let UpmlinhaPageModule = class UpmlinhaPageModule {
};
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



/***/ }),

/***/ "./src/app/pages/upmlinha/upmlinha.page.scss":
/*!***************************************************!*\
  !*** ./src/app/pages/upmlinha/upmlinha.page.scss ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "@charset \"UTF-8\";\ncabeçalho da pagina home .top {\n  position: fixed;\n  margin-bottom: 40px !important;\n  z-index: 999;\n}\np {\n  margin-top: 8px;\n  margin-bottom: 0px;\n}\n.alto {\n  --background: url(\"/assets/img/GrupoSC-top13.png\") 0 0/100% 100% no-repeat;\n  max-height: 250px;\n}\n.pincipal ion-slides {\n  height: 7%;\n}\n.pincipal span {\n  color: #ffffff;\n}\n.pincipal ion-item {\n  --border-radius: 5px;\n}\n.pincipal ion-label {\n  font-size: 12px;\n  white-space: pre-line;\n}\n.pincipal ion-button {\n  width: 90;\n  height: 100;\n  max-height: 40px;\n  min-height: 40px;\n  max-width: 60px;\n  min-width: 60px;\n  font-size: 12px;\n  white-space: pre-line;\n  --border-radius: 6px;\n}\n.pincipal .menu {\n  font-size: 9px;\n}\n.dados {\n  margin-top: 8px;\n}\n.dados ion-slides {\n  height: 7%;\n}\n.dados span {\n  color: #ffffff;\n}\n.dados ion-item {\n  --border-radius: 5px;\n}\n.dados ion-label {\n  font-size: 12px;\n  white-space: pre-line;\n}\n.dados ion-button {\n  width: 90;\n  height: 100;\n  max-height: 40px;\n  min-height: 40px;\n  max-width: 60px;\n  min-width: 60px;\n  font-size: 12px;\n  white-space: pre-line;\n  --border-radius: 6px;\n}\n.dados .menu {\n  font-size: 9px;\n}\n.baixo {\n  --background: url(\"/assets/img/GrupoSC-top13.png\") 0 0/100% 100% no-repeat;\n}\n.grafico {\n  background-color: #ffffff;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvcGFnZXMvdXBtbGluaGEvdXBtbGluaGEucGFnZS5zY3NzIiwic3JjL2FwcC9wYWdlcy91cG1saW5oYS9DOlxcRGVzZW52b2x2aW1lbnRvXFxUQ0NcXFYwMFxcR3J1cG9TQy9zcmNcXGFwcFxccGFnZXNcXHVwbWxpbmhhXFx1cG1saW5oYS5wYWdlLnNjc3MiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUEsZ0JBQWdCO0FDQWhCO0VBRUUsZUFBQTtFQUNBLDhCQUFBO0VBQ0EsWUFBQTtBRENGO0FDRUE7RUFDRSxlQUFBO0VBQ0Esa0JBQUE7QURDRjtBQ0VBO0VBQ0UsMEVBQUE7RUFDQSxpQkFBQTtBRENGO0FDS0E7RUFDRSxVQUFBO0FERkY7QUNLQTtFQUNFLGNBQUE7QURIRjtBQ09BO0VBQ0Usb0JBQUE7QURMRjtBQ1NBO0VBQ0UsZUFBQTtFQUNBLHFCQUFBO0FEUEY7QUNVQTtFQUNFLFNBQUE7RUFDQSxXQUFBO0VBQ0EsZ0JBQUE7RUFDQSxnQkFBQTtFQUNBLGVBQUE7RUFDQSxlQUFBO0VBQ0EsZUFBQTtFQUNBLHFCQUFBO0VBQ0Esb0JBQUE7QURSRjtBQ1dBO0VBQ0EsY0FBQTtBRFRBO0FDY0E7RUFFQSxlQUFBO0FEWkE7QUNjQTtFQUNFLFVBQUE7QURaRjtBQ2VBO0VBQ0UsY0FBQTtBRGJGO0FDaUJBO0VBQ0Usb0JBQUE7QURmRjtBQ21CQTtFQUNFLGVBQUE7RUFDQSxxQkFBQTtBRGpCRjtBQ29CQTtFQUNFLFNBQUE7RUFDQSxXQUFBO0VBQ0EsZ0JBQUE7RUFDQSxnQkFBQTtFQUNBLGVBQUE7RUFDQSxlQUFBO0VBQ0EsZUFBQTtFQUNBLHFCQUFBO0VBQ0Esb0JBQUE7QURsQkY7QUNxQkE7RUFDQSxjQUFBO0FEbkJBO0FDd0JBO0VBQ0ksMEVBQUE7QURyQko7QUMwQkE7RUFDSSx5QkFBQTtBRHZCSiIsImZpbGUiOiJzcmMvYXBwL3BhZ2VzL3VwbWxpbmhhL3VwbWxpbmhhLnBhZ2Uuc2NzcyIsInNvdXJjZXNDb250ZW50IjpbIkBjaGFyc2V0IFwiVVRGLThcIjtcbmNhYmXDp2FsaG8gZGEgcGFnaW5hIGhvbWUgLnRvcCB7XG4gIHBvc2l0aW9uOiBmaXhlZDtcbiAgbWFyZ2luLWJvdHRvbTogNDBweCAhaW1wb3J0YW50O1xuICB6LWluZGV4OiA5OTk7XG59XG5cbnAge1xuICBtYXJnaW4tdG9wOiA4cHg7XG4gIG1hcmdpbi1ib3R0b206IDBweDtcbn1cblxuLmFsdG8ge1xuICAtLWJhY2tncm91bmQ6IHVybChcIi9hc3NldHMvaW1nL0dydXBvU0MtdG9wMTMucG5nXCIpIDAgMC8xMDAlIDEwMCUgbm8tcmVwZWF0O1xuICBtYXgtaGVpZ2h0OiAyNTBweDtcbn1cblxuLnBpbmNpcGFsIGlvbi1zbGlkZXMge1xuICBoZWlnaHQ6IDclO1xufVxuLnBpbmNpcGFsIHNwYW4ge1xuICBjb2xvcjogI2ZmZmZmZjtcbn1cbi5waW5jaXBhbCBpb24taXRlbSB7XG4gIC0tYm9yZGVyLXJhZGl1czogNXB4O1xufVxuLnBpbmNpcGFsIGlvbi1sYWJlbCB7XG4gIGZvbnQtc2l6ZTogMTJweDtcbiAgd2hpdGUtc3BhY2U6IHByZS1saW5lO1xufVxuLnBpbmNpcGFsIGlvbi1idXR0b24ge1xuICB3aWR0aDogOTA7XG4gIGhlaWdodDogMTAwO1xuICBtYXgtaGVpZ2h0OiA0MHB4O1xuICBtaW4taGVpZ2h0OiA0MHB4O1xuICBtYXgtd2lkdGg6IDYwcHg7XG4gIG1pbi13aWR0aDogNjBweDtcbiAgZm9udC1zaXplOiAxMnB4O1xuICB3aGl0ZS1zcGFjZTogcHJlLWxpbmU7XG4gIC0tYm9yZGVyLXJhZGl1czogNnB4O1xufVxuLnBpbmNpcGFsIC5tZW51IHtcbiAgZm9udC1zaXplOiA5cHg7XG59XG5cbi5kYWRvcyB7XG4gIG1hcmdpbi10b3A6IDhweDtcbn1cbi5kYWRvcyBpb24tc2xpZGVzIHtcbiAgaGVpZ2h0OiA3JTtcbn1cbi5kYWRvcyBzcGFuIHtcbiAgY29sb3I6ICNmZmZmZmY7XG59XG4uZGFkb3MgaW9uLWl0ZW0ge1xuICAtLWJvcmRlci1yYWRpdXM6IDVweDtcbn1cbi5kYWRvcyBpb24tbGFiZWwge1xuICBmb250LXNpemU6IDEycHg7XG4gIHdoaXRlLXNwYWNlOiBwcmUtbGluZTtcbn1cbi5kYWRvcyBpb24tYnV0dG9uIHtcbiAgd2lkdGg6IDkwO1xuICBoZWlnaHQ6IDEwMDtcbiAgbWF4LWhlaWdodDogNDBweDtcbiAgbWluLWhlaWdodDogNDBweDtcbiAgbWF4LXdpZHRoOiA2MHB4O1xuICBtaW4td2lkdGg6IDYwcHg7XG4gIGZvbnQtc2l6ZTogMTJweDtcbiAgd2hpdGUtc3BhY2U6IHByZS1saW5lO1xuICAtLWJvcmRlci1yYWRpdXM6IDZweDtcbn1cbi5kYWRvcyAubWVudSB7XG4gIGZvbnQtc2l6ZTogOXB4O1xufVxuXG4uYmFpeG8ge1xuICAtLWJhY2tncm91bmQ6IHVybChcIi9hc3NldHMvaW1nL0dydXBvU0MtdG9wMTMucG5nXCIpIDAgMC8xMDAlIDEwMCUgbm8tcmVwZWF0O1xufVxuXG4uZ3JhZmljbyB7XG4gIGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7XG59IiwiY2FiZcOnYWxobyBkYSBwYWdpbmEgaG9tZVxyXG4udG9wIHtcclxuICBwb3NpdGlvbjogZml4ZWQ7XHJcbiAgbWFyZ2luLWJvdHRvbTogNDBweCAhaW1wb3J0YW50O1xyXG4gIHotaW5kZXg6IDk5OTsgICAgICAgXHJcbn1cclxuXHJcbnB7XHJcbiAgbWFyZ2luLXRvcDogOHB4O1xyXG4gIG1hcmdpbi1ib3R0b206IDBweDtcclxufVxyXG5cclxuLmFsdG8ge1xyXG4gIC0tYmFja2dyb3VuZDogdXJsKCcvYXNzZXRzL2ltZy9HcnVwb1NDLXRvcDEzLnBuZycpIDAgMC8xMDAlIDEwMCUgbm8tcmVwZWF0O1xyXG4gIG1heC1oZWlnaHQ6IDI1MHB4O1xyXG59XHJcblxyXG5cclxuLnBpbmNpcGFsIHsgICAgXHJcblxyXG5pb24tc2xpZGVzIHtcclxuICBoZWlnaHQ6IDclOyAgICAgICAgICAgICAgICBcclxufVxyXG5cclxuc3BhbiB7XHJcbiAgY29sb3I6ICNmZmZmZmY7ICAgXHJcbiAgXHJcbn1cclxuXHJcbmlvbi1pdGVtIHsgIFxyXG4gIC0tYm9yZGVyLXJhZGl1czogNXB4OyAgICBcclxuICAgICAgIFxyXG59XHJcblxyXG5pb24tbGFiZWwge1xyXG4gIGZvbnQtc2l6ZTogMTJweDtcclxuICB3aGl0ZS1zcGFjZTogcHJlLWxpbmU7ICAgXHJcbn1cclxuXHJcbmlvbi1idXR0b24geyAgICAgIFxyXG4gIHdpZHRoOjkwO1xyXG4gIGhlaWdodDoxMDA7XHJcbiAgbWF4LWhlaWdodDogNDBweDtcclxuICBtaW4taGVpZ2h0OiA0MHB4O1xyXG4gIG1heC13aWR0aDogNjBweDtcclxuICBtaW4td2lkdGg6IDYwcHg7XHJcbiAgZm9udC1zaXplOiAxMnB4O1xyXG4gIHdoaXRlLXNwYWNlOiBwcmUtbGluZTsgICAgICAgICAgICBcclxuICAtLWJvcmRlci1yYWRpdXM6IDZweDsgICAgIFxyXG59XHJcblxyXG4ubWVudSB7XHJcbmZvbnQtc2l6ZTogOXB4O1xyXG59XHJcbiAgXHJcbn1cclxuXHJcbi5kYWRvcyB7XHJcblxyXG5tYXJnaW4tdG9wOiA4cHg7XHJcblxyXG5pb24tc2xpZGVzIHtcclxuICBoZWlnaHQ6IDclOyAgICAgICAgICAgICAgICBcclxufVxyXG5cclxuc3BhbiB7XHJcbiAgY29sb3I6ICNmZmZmZmY7ICAgXHJcbiAgXHJcbn1cclxuXHJcbmlvbi1pdGVtIHsgIFxyXG4gIC0tYm9yZGVyLXJhZGl1czogNXB4OyAgICBcclxuICAgICAgIFxyXG59XHJcblxyXG5pb24tbGFiZWwge1xyXG4gIGZvbnQtc2l6ZTogMTJweDtcclxuICB3aGl0ZS1zcGFjZTogcHJlLWxpbmU7ICAgXHJcbn1cclxuXHJcbmlvbi1idXR0b24geyAgICAgIFxyXG4gIHdpZHRoOjkwO1xyXG4gIGhlaWdodDoxMDA7XHJcbiAgbWF4LWhlaWdodDogNDBweDtcclxuICBtaW4taGVpZ2h0OiA0MHB4O1xyXG4gIG1heC13aWR0aDogNjBweDtcclxuICBtaW4td2lkdGg6IDYwcHg7XHJcbiAgZm9udC1zaXplOiAxMnB4O1xyXG4gIHdoaXRlLXNwYWNlOiBwcmUtbGluZTsgICAgICAgICAgICBcclxuICAtLWJvcmRlci1yYWRpdXM6IDZweDsgICAgIFxyXG59XHJcblxyXG4ubWVudSB7XHJcbmZvbnQtc2l6ZTogOXB4O1xyXG59XHJcbiAgXHJcbn1cclxuXHJcbi5iYWl4byB7ICAgICAgXHJcbiAgICAtLWJhY2tncm91bmQ6IHVybCgnL2Fzc2V0cy9pbWcvR3J1cG9TQy10b3AxMy5wbmcnKSAwIDAvMTAwJSAxMDAlIG5vLXJlcGVhdDtcclxuICAgIC8vIGJhY2tncm91bmQtcmVwZWF0OiBuby1yZXBlYXQ7ICAgIFxyXG4gICAgLy8gYmFja2dyb3VuZC1zaXplOiBjb3ZlciA7XHJcbiAgICB9XHJcbiAgICBcclxuLmdyYWZpY28ge1xyXG4gICAgYmFja2dyb3VuZC1jb2xvcjogI2ZmZmZmZjtcclxufVxyXG4gICAgICAiXX0= */"

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
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm2015/core.js");
/* harmony import */ var _services_dados_sc_service__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../services/dados-sc.service */ "./src/app/pages/services/dados-sc.service.ts");
/* harmony import */ var _ionic_angular__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @ionic/angular */ "./node_modules/@ionic/angular/dist/fesm5.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/fesm2015/router.js");
/* harmony import */ var chart_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! chart.js */ "./node_modules/chart.js/dist/Chart.js");
/* harmony import */ var chart_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(chart_js__WEBPACK_IMPORTED_MODULE_5__);






let UpmlinhaPage = class UpmlinhaPage {
    constructor(navCtrl, service, route) {
        this.navCtrl = navCtrl;
        this.service = service;
        this.route = route;
        this.soma = [];
        this.buscaDados();
    }
    buscaDados() {
        this.getDados();
        this.getDadosUpm();
        this.getDadosEstacao();
    }
    getDados() {
        this.service.getUpm().then((result) => {
            this.upms = result['upms']; // result['upms'] equivalente ao Jout da api php..
        }).catch((error) => {
            console.error("error: " + error);
        });
    }
    getDadosUpm() {
        this.service.getUpmhr().then((result) => {
            this.upmh = result['upmh']; // result['upmh'] equivalente ao Jout da api php..
            //console.log(this.upmh);
        }).catch((error) => {
            console.error("error: " + error);
        });
    }
    getDadosEstacao() {
        this.service.getEstacao().then((result) => {
            this.estacoes = result['erroestacao']; // result['erroestacao'] equivalente ao Jout da api php..
            // console.log("Erro por estaçãp: " + this.estacoes);
            for (let estacao of this.estacoes) {
                this.soma.push(parseInt(estacao.falta_upm) + parseInt(estacao.sobra_upm) + parseInt(estacao.troca_upm) + parseInt(estacao.erro_conf_upm));
            }
        }).catch((error) => {
            console.error("error: " + error);
        });
    }
    ngOnInit() {
        setInterval(() => {
            this.buscaDados();
            this.barCanvas = this.getBarChart();
            this.barCanvas2 = this.getBarChart2();
            this.barCanvas3 = this.getBarChart3();
            //this.barCanvas1 = this.getBarChart1();
            //this.lineChart = this.getLineChart();
        }, 3000);
        // setTimeout(() => {
        //   // this.pieCanvas = this.getPieChart();
        //   // this.doughnutChart = this.getDoughnutChart();
        // }, 3000)
    }
    ngAfterViewInit() {
    }
    getChart(context, chartType, data, options) {
        return new chart_js__WEBPACK_IMPORTED_MODULE_5___default.a(context, {
            data,
            options,
            type: chartType
        });
    }
    getBarChart() {
        //console.log(this.upmh);
        type: 'bar';
        let rotulos = [];
        let dados = [];
        let cores = [];
        for (let upmh of this.upmh) {
            rotulos.push(upmh.horasD);
            dados.push(upmh.difErros);
            cores.push('rgb(18, 34, 70)');
        }
        const data = {
            //labels: [this.upmh[0]['horasD'], this.upmh[1]['horasD'], this.upmh[2]['horasD']],
            labels: rotulos,
            datasets: [{
                    label: 'Erros Por Hora',
                    //data: [this.upmh[0].difErros, this.upmh[1].difErros, this.upmh[2].difErros],
                    data: dados,
                    // backgroundColor: [
                    //   'rgb(18, 34, 70)',
                    //   'rgb(18, 34, 70)',
                    //   'rgb(18, 34, 70)',      
                    // ],
                    backgroundColor: cores,
                }]
        };
        const options = {
            responsive: true,
            tooltips: {
                enabled: false
            },
            animation: {
                onComplete: function () {
                    var ctx = this.chart.ctx;
                    ctx.textAlign = "center";
                    ctx.textBaseline = "middle";
                    var chart = this;
                    var datasets = this.config.data.datasets;
                    datasets.forEach(function (dataset, i) {
                        ctx.font = "10px Arial";
                        ctx.fillStyle = "Black";
                        chart.getDatasetMeta(i).data.forEach(function (p, j) {
                            ctx.fillText(datasets[i].data[j], p._model.x, p._model.y - 5);
                        });
                    });
                }
            },
            legend: {
                display: true,
                labels: {
                    fontColor: 'rgb(18, 34, 70)'
                }
            },
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
            }
        };
        return this.getChart(this.barCanvas.nativeElement, 'bar', data, options);
    }
    getBarChart2() {
        //console.log(this.upmh);
        type: 'bar';
        let rotulos = [];
        let dados = [];
        let cores = [];
        for (let upmh of this.upmh) {
            rotulos.push(upmh.horasD);
            dados.push(upmh.upm);
            cores.push('rgb(18, 34, 70)');
        }
        const data = {
            labels: rotulos,
            datasets: [{
                    label: 'UPM',
                    data: dados,
                    backgroundColor: cores,
                }]
        };
        const options = {
            responsive: true,
            tooltips: {
                enabled: false
            },
            animation: {
                onComplete: function () {
                    var ctx = this.chart.ctx;
                    ctx.textAlign = "center";
                    ctx.textBaseline = "middle";
                    var chart = this;
                    var datasets = this.config.data.datasets;
                    datasets.forEach(function (dataset, i) {
                        ctx.font = "10px Arial";
                        ctx.fillStyle = "Black";
                        chart.getDatasetMeta(i).data.forEach(function (p, j) {
                            ctx.fillText(datasets[i].data[j], p._model.x, p._model.y - 5);
                        });
                    });
                }
            },
            legend: {
                display: true,
                labels: {
                    fontColor: 'rgb(18, 34, 70)'
                }
            },
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
            }
        };
        return this.getChart(this.barCanvas2.nativeElement, 'bar', data, options);
    }
    getBarChart3() {
        //console.log(this.upmh);
        type: 'bar';
        let rotulos = [];
        let dados = [];
        let cores = [];
        for (let estacoes of this.estacoes) {
            rotulos.push(estacoes.estacao);
            dados.push(estacoes.troca_upm);
            cores.push('rgb(18, 34, 70)');
        }
        const data = {
            labels: rotulos,
            datasets: [{
                    label: 'Erros por Estações',
                    data: this.soma,
                    backgroundColor: cores,
                }]
        };
        const options = {
            responsive: true,
            tooltips: {
                enabled: false
            },
            animation: {
                onComplete: function () {
                    var ctx = this.chart.ctx;
                    ctx.textAlign = "center";
                    ctx.textBaseline = "middle";
                    var chart = this;
                    var datasets = this.config.data.datasets;
                    datasets.forEach(function (dataset, i) {
                        ctx.font = "10px Arial";
                        ctx.fillStyle = "Black";
                        chart.getDatasetMeta(i).data.forEach(function (p, j) {
                            ctx.fillText(datasets[i].data[j], p._model.x, p._model.y - 5);
                        });
                    });
                }
            },
            legend: {
                display: true,
                labels: {
                    fontColor: 'rgb(18, 34, 70)'
                }
            },
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
            }
        };
        return this.getChart(this.barCanvas3.nativeElement, 'bar', data, options);
    }
};
UpmlinhaPage.ctorParameters = () => [
    { type: _ionic_angular__WEBPACK_IMPORTED_MODULE_3__["NavController"] },
    { type: _services_dados_sc_service__WEBPACK_IMPORTED_MODULE_2__["DadosSCService"] },
    { type: _angular_router__WEBPACK_IMPORTED_MODULE_4__["ActivatedRoute"] }
];
tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"]([
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["ViewChild"])('barCanvas', { static: false }),
    tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"]("design:type", Object)
], UpmlinhaPage.prototype, "barCanvas", void 0);
tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"]([
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["ViewChild"])('barCanvas2', { static: false }),
    tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"]("design:type", Object)
], UpmlinhaPage.prototype, "barCanvas2", void 0);
tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"]([
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["ViewChild"])('barCanvas3', { static: false }),
    tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"]("design:type", Object)
], UpmlinhaPage.prototype, "barCanvas3", void 0);
UpmlinhaPage = tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"]([
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
        selector: 'app-upmlinha',
        template: __webpack_require__(/*! raw-loader!./upmlinha.page.html */ "./node_modules/raw-loader/index.js!./src/app/pages/upmlinha/upmlinha.page.html"),
        styles: [__webpack_require__(/*! ./upmlinha.page.scss */ "./src/app/pages/upmlinha/upmlinha.page.scss")]
    }),
    tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"]("design:paramtypes", [_ionic_angular__WEBPACK_IMPORTED_MODULE_3__["NavController"], _services_dados_sc_service__WEBPACK_IMPORTED_MODULE_2__["DadosSCService"], _angular_router__WEBPACK_IMPORTED_MODULE_4__["ActivatedRoute"]])
], UpmlinhaPage);



/***/ })

}]);
//# sourceMappingURL=pages-upmlinha-upmlinha-module-es2015.js.map