(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["pages-login-login-module"],{

/***/ "./node_modules/raw-loader/index.js!./src/app/pages/login/login.page.html":
/*!***********************************************************************!*\
  !*** ./node_modules/raw-loader!./src/app/pages/login/login.page.html ***!
  \***********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "<ion-content>\r\n  <div class=\"pincipal\">\r\n\r\n    \r\n    <ion-slides>\r\n      <ion-slide>\r\n        <div class=\"slide-inner ion-padding\">\r\n          <span>Login</span>\r\n\r\n          <ion-item class=\"ion-margin-top\" lines=\"none\">\r\n            <ion-input type=\"text\" name =\"usuario\" placeholder=\"usuario\" [(ngModel)]=usuario></ion-input>\r\n          </ion-item>\r\n\r\n          <ion-item class=\"ion-margin-top\" lines=\"none\">\r\n            <ion-input type=\"password\" name = \"senha\" placeholder=\"Senha\" [(ngModel)]=senha></ion-input>\r\n          </ion-item>\r\n\r\n          <ion-button class=\"ion-margin-top\" (click)=\"Login()\" color=\"light\" expand=\"block\">Entrar</ion-button>\r\n        </div>\r\n      </ion-slide>\r\n\r\n     \r\n    </ion-slides>\r\n  </div>\r\n</ion-content>"

/***/ }),

/***/ "./src/app/pages/login/login.module.ts":
/*!*********************************************!*\
  !*** ./src/app/pages/login/login.module.ts ***!
  \*********************************************/
/*! exports provided: LoginPageModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "LoginPageModule", function() { return LoginPageModule; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm2015/core.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/fesm2015/common.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/fesm2015/forms.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/fesm2015/router.js");
/* harmony import */ var _ionic_angular__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @ionic/angular */ "./node_modules/@ionic/angular/dist/fesm5.js");
/* harmony import */ var _login_page__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./login.page */ "./src/app/pages/login/login.page.ts");







const routes = [
    {
        path: '',
        component: _login_page__WEBPACK_IMPORTED_MODULE_6__["LoginPage"]
    }
];
let LoginPageModule = class LoginPageModule {
};
LoginPageModule = tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"]([
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["NgModule"])({
        imports: [
            _angular_common__WEBPACK_IMPORTED_MODULE_2__["CommonModule"],
            _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormsModule"],
            _ionic_angular__WEBPACK_IMPORTED_MODULE_5__["IonicModule"],
            _angular_router__WEBPACK_IMPORTED_MODULE_4__["RouterModule"].forChild(routes)
        ],
        declarations: [_login_page__WEBPACK_IMPORTED_MODULE_6__["LoginPage"]]
    })
], LoginPageModule);



/***/ }),

/***/ "./src/app/pages/login/login.page.scss":
/*!*********************************************!*\
  !*** ./src/app/pages/login/login.page.scss ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = ".pincipal {\n  background: #122045;\n  position: absolute;\n  left: 0;\n  right: 0;\n  bottom: 0;\n  height: 100%;\n  background-image: url(\"/assets/img/GrupoSC.png\");\n  background-repeat: no-repeat;\n  background-size: contain;\n}\n.pincipal ion-slides {\n  height: 100%;\n}\n.pincipal span {\n  color: #ffffff;\n}\n.pincipal ion-item {\n  --border-radius: 10px;\n}\n.pincipal .segment {\n  color: #ffffff;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvcGFnZXMvbG9naW4vQzpcXERlc2Vudm9sdmltZW50b1xcVENDXFxWMDBcXEdydXBvU0Mvc3JjXFxhcHBcXHBhZ2VzXFxsb2dpblxcbG9naW4ucGFnZS5zY3NzIiwic3JjL2FwcC9wYWdlcy9sb2dpbi9sb2dpbi5wYWdlLnNjc3MiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7RUFDQSxtQkFBQTtFQUNBLGtCQUFBO0VBQ0EsT0FBQTtFQUNBLFFBQUE7RUFDQSxTQUFBO0VBQ0EsWUFBQTtFQUNBLGdEQUFBO0VBQ0EsNEJBQUE7RUFDQSx3QkFBQTtBQ0NBO0FEQ0k7RUFDSSxZQUFBO0FDQ1I7QURFSTtFQUNJLGNBQUE7QUNBUjtBREdJO0VBQ0kscUJBQUE7QUNEUjtBRElJO0VBQ0ksY0FBQTtBQ0ZSIiwiZmlsZSI6InNyYy9hcHAvcGFnZXMvbG9naW4vbG9naW4ucGFnZS5zY3NzIiwic291cmNlc0NvbnRlbnQiOlsiLnBpbmNpcGFsIHtcclxuYmFja2dyb3VuZDogIzEyMjA0NTtcclxucG9zaXRpb246IGFic29sdXRlO1xyXG5sZWZ0OiAwO1xyXG5yaWdodDogMDtcclxuYm90dG9tOiAwO1xyXG5oZWlnaHQ6IDEwMCU7XHJcbmJhY2tncm91bmQtaW1hZ2U6IHVybCgnL2Fzc2V0cy9pbWcvR3J1cG9TQy5wbmcnKTtcclxuYmFja2dyb3VuZC1yZXBlYXQ6IG5vLXJlcGVhdDtcclxuYmFja2dyb3VuZC1zaXplOiBjb250YWluO1xyXG5cclxuICAgIGlvbi1zbGlkZXMge1xyXG4gICAgICAgIGhlaWdodDogMTAwJTsgICAgXHJcbiAgICB9XHJcblxyXG4gICAgc3BhbiB7XHJcbiAgICAgICAgY29sb3I6ICNmZmZmZmY7ICAgICAgIFxyXG4gICAgfVxyXG4gICAgXHJcbiAgICBpb24taXRlbSB7ICAgICAgICAgICAgXHJcbiAgICAgICAgLS1ib3JkZXItcmFkaXVzOiAxMHB4O1xyXG4gICAgfVxyXG5cclxuICAgIC5zZWdtZW50IHtcclxuICAgICAgICBjb2xvcjogI2ZmZmZmZjtcclxuICAgIH1cclxuXHJcblxyXG59XHJcblxyXG4iLCIucGluY2lwYWwge1xuICBiYWNrZ3JvdW5kOiAjMTIyMDQ1O1xuICBwb3NpdGlvbjogYWJzb2x1dGU7XG4gIGxlZnQ6IDA7XG4gIHJpZ2h0OiAwO1xuICBib3R0b206IDA7XG4gIGhlaWdodDogMTAwJTtcbiAgYmFja2dyb3VuZC1pbWFnZTogdXJsKFwiL2Fzc2V0cy9pbWcvR3J1cG9TQy5wbmdcIik7XG4gIGJhY2tncm91bmQtcmVwZWF0OiBuby1yZXBlYXQ7XG4gIGJhY2tncm91bmQtc2l6ZTogY29udGFpbjtcbn1cbi5waW5jaXBhbCBpb24tc2xpZGVzIHtcbiAgaGVpZ2h0OiAxMDAlO1xufVxuLnBpbmNpcGFsIHNwYW4ge1xuICBjb2xvcjogI2ZmZmZmZjtcbn1cbi5waW5jaXBhbCBpb24taXRlbSB7XG4gIC0tYm9yZGVyLXJhZGl1czogMTBweDtcbn1cbi5waW5jaXBhbCAuc2VnbWVudCB7XG4gIGNvbG9yOiAjZmZmZmZmO1xufSJdfQ== */"

/***/ }),

/***/ "./src/app/pages/login/login.page.ts":
/*!*******************************************!*\
  !*** ./src/app/pages/login/login.page.ts ***!
  \*******************************************/
/*! exports provided: LoginPage */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "LoginPage", function() { return LoginPage; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm2015/core.js");
/* harmony import */ var _ionic_angular__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @ionic/angular */ "./node_modules/@ionic/angular/dist/fesm5.js");
/* harmony import */ var _services_dados_sc_service__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../services/dados-sc.service */ "./src/app/pages/services/dados-sc.service.ts");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/fesm2015/router.js");





//import da lib responsavel pelo recebimeto de parametros

let LoginPage = class LoginPage {
    constructor(navCtrl, service, route) {
        this.navCtrl = navCtrl;
        this.service = service;
        this.route = route;
    }
    ngOnInit() { }
    Login() {
        this.service.getLogin(this.usuario, this.senha).then((result) => {
            this.acessos = result['acessos'];
            console.log(this.acessos);
            if (this.acessos == 1) {
                console.log(this.acessos);
                this.navCtrl.navigateBack(['home'], this.navigation);
            }
            else {
                console.log(this.usuario);
                console.log(this.senha);
            }
            console.log("getDados");
        }).catch((error) => {
            console.error("error: " + error);
        });
    }
};
LoginPage.ctorParameters = () => [
    { type: _ionic_angular__WEBPACK_IMPORTED_MODULE_2__["NavController"] },
    { type: _services_dados_sc_service__WEBPACK_IMPORTED_MODULE_3__["DadosSCService"] },
    { type: _angular_router__WEBPACK_IMPORTED_MODULE_4__["ActivatedRoute"] }
];
tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"]([
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["ViewChild"])(_ionic_angular__WEBPACK_IMPORTED_MODULE_2__["IonSlides"], { static: false }),
    tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"]("design:type", _ionic_angular__WEBPACK_IMPORTED_MODULE_2__["IonSlides"])
], LoginPage.prototype, "slides", void 0);
LoginPage = tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"]([
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
        selector: 'app-login',
        template: __webpack_require__(/*! raw-loader!./login.page.html */ "./node_modules/raw-loader/index.js!./src/app/pages/login/login.page.html"),
        styles: [__webpack_require__(/*! ./login.page.scss */ "./src/app/pages/login/login.page.scss")]
    }),
    tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"]("design:paramtypes", [_ionic_angular__WEBPACK_IMPORTED_MODULE_2__["NavController"], _services_dados_sc_service__WEBPACK_IMPORTED_MODULE_3__["DadosSCService"], _angular_router__WEBPACK_IMPORTED_MODULE_4__["ActivatedRoute"]])
], LoginPage);



/***/ })

}]);
//# sourceMappingURL=pages-login-login-module-es2015.js.map