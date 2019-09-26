import { Injectable } from '@angular/core';
import { Http, Headers, RequestOptions } from '@angular/http';
import { map } from 'rxjs/operators';
// import { resolve } from 'path';
// import { reject } from 'q';

@Injectable({
  providedIn: 'root'
})
export class DadosSCService {

  //private api: String = 'https://dadosabertos.camara.leg.br/api/v2/';
  private api: String = 'http://localhost';
  // url: string = "http://localhost/phpp/";

  constructor(public http: Http) { }


  getAlluser() {
    return new Promise((resolve, reject) => {
      //let url = 'http://172.20.10.6/phpp/api.php'; //laravel
      let url = 'http://localhost/phpp/api-prodconferencia.php'; //laravel
      this.http.get(url)
        .toPromise()
        .then((result: any) => {
          resolve(result.json());
        },
          (error) => {
            resolve(error.json());
          });
    });
  }


  
  getFechamento(){
    let headers = new Headers(
      {
        'Content-Type': 'application/json'
      });
    let options = new RequestOptions({ headers: headers });
    return new Promise((resolve, reject) => {
      this.http.post('http://localhost/phpp/api-fechamento.php',
        options
      )
        .toPromise()
        .then((response) => {
          console.log(response);
          resolve(response.json());
        }).catch(error => {
          console.error(error.status);
          console.error(JSON.stringify(error));
          reject(error.json());
        });
    });
  }



  getLogin(usuario: String, senha: String) {
    let headers = new Headers(
      {
        'Content-Type': 'application/json'
      });
    let options = new RequestOptions({ headers: headers });
    return new Promise((resolve, reject) => {
      this.http.post('http://localhost/phpp/api-login.php',
        {
          "user": usuario,
          "password": senha
        }, options
      )
        .toPromise()
        .then((response) => {
          console.log(response);
          resolve(response.json());
        }).catch(error => {
          console.error(error.status);
          console.error(JSON.stringify(error));
          reject(error.json());
        });
    });
  }



  getFarol() {
    return new Promise((resolve, reject) => {
      //let url = 'http://172.20.10.6/phpp/api-indicadores.php'; //laravel
      let url = 'http://localhost/phpp/api-indicadores.php'; //laravel
      this.http.get(url)
        .toPromise()
        .then((result: any) => {
          resolve(result.json());
        },
          (error) => {
            resolve(error.json());
          });
    });
  }

  getUpm() {
    return new Promise((resolve, reject) => {
      // let url = 'http://172.20.10.6/phpp/upm.php'; //laravel
      let url = 'http://localhost/phpp/api-upm.php'; //laravel
      this.http.get(url)
        .toPromise()
        .then((result: any) => {
          resolve(result.json());
          console.log("getUPM");
        },
          (error) => {
            resolve(error.json());
            console.log("erro");
          });
    });
  }

  getUpmhr() {
    return new Promise((resolve, reject) => {
      // let url = 'http://172.20.10.6/phpp/upm.php'; //laravel
      let url = 'http://localhost/phpp/api-upmhora.php'; //laravel
      this.http.get(url)
        .toPromise()
        .then((result: any) => {
          resolve(result.json());
          console.log("getUPMHORA");
        },
          (error) => {
            resolve(error.json());
            console.log("erro");
          });
    });
  }

  getEstacao() {
    return new Promise((resolve, reject) => {
      // let url = 'http://172.20.10.6/phpp/upm.php'; //laravel
      let url = 'http://localhost/phpp/api-upmestacao.php'; //laravel
      this.http.get(url)
        .toPromise()
        .then((result: any) => {
          resolve(result.json());
          console.log("getEstacao");
        },
          (error) => {
            resolve(error.json());
            console.log("erro");
          });
    });
  }

  getErrseparacao() {
    return new Promise((resolve, reject) => {
      //let url = 'http://172.20.10.6/phpp/errseparacao.php'; //laravel
      let url = 'http://localhost/phpp/api-errseparacao.php'; //laravel
      this.http.get(url)
        .toPromise()
        .then((result: any) => {
          resolve(result.json());
          console.log("then separacao");
        },
          (error) => {
            resolve(error.json());
            console.error(error);
          });
    });
  }




  // getDeputados() {
  //   return new Promise((resolve, reject) => {
  //     let url = this.api + 'deputados';
  //     this.http.get(url)
  //       .toPromise()
  //       .then((result: any) => {
  //         resolve(result.json());
  //       },
  //         (error) => {
  //           reject(error.json());
  //         });
  //   });
  // }

  // getDespesas(id: Number) {
  //   return new Promise((resolve, reject) => {
  //     let url = this.api + 'deputados/' + id + '/despesas';
  //     this.http.get(url)
  //       .toPromise()
  //       .then((result: any) => {
  //         resolve(result.json());
  //       },
  //         (error) => {
  //           resolve(error.json());
  //         });
  //   });
  // }




}


