import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
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

  getLogin() {

  }


  getDeputados() {
    return new Promise((resolve, reject) => {
      let url = this.api + 'deputados';
      this.http.get(url)
        .toPromise()
        .then((result: any) => {
          resolve(result.json());
        },
          (error) => {
            reject(error.json());
          });
    });
  }

  getDespesas(id: Number) {
    return new Promise((resolve, reject) => {
      let url = this.api + 'deputados/' + id + '/despesas';
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


  getAlluser() {
    return new Promise((resolve, reject) => {
      //let url = 'http://172.20.10.6/phpp/api.php'; //laravel
      let url = 'http://localhost/phpp/api.php'; //laravel
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
      let url = 'http://localhost/phpp/upm.php'; //laravel
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

getErros() {    
  return new Promise((resolve, reject) => {
   // let url = 'http://172.20.10.6/phpp/api-erros-separacao.php'; //laravel
    let url = 'http://localhost/phpp/api-erros-separacao.php'; //laravel
    this.http.get(url)
    .toPromise()
    .then((result: any) => {
      resolve(result.json());
      console.log("getErros");
    },
      (error) => {
        resolve(error.json());
        console.log("erro");
      });
});
}


}


