import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class DadosSCService {

  private api: String = 'https://dadosabertos.camara.leg.br/api/v2/';
  //private api : String = 'http://localhost:8000';
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
      let url = 'http://localhost:8000/api/allUser'; //laravel
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

}


