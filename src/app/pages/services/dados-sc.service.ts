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
      //let url = 'http://172.20.10.6/phpp/api-prodconferencia.php'; //laravel
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

  getMonitorFechamentoOP(data: String) {
    var headers = new Headers();
    headers.append('Access-Control-Allow-Origin', '*');
    headers.append('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT');
    headers.append('Accept', 'application/json');
    headers.append('content-type', 'application/json');
    headers.append('Content-Type', 'multipart/form-data');
    let options = new RequestOptions({ headers: headers });

    var myData = JSON.stringify({
      //php : ta na tela      
      data: data 
    });
    return new Promise((resolve, reject) => {
      this.http.post('http://localhost/phpp/api-fechamento-operacional.php', myData, options)
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

  // getFechamentoOP() {
  //   return new Promise((resolve, reject) => {
  //     //let url = 'http://172.20.10.6/phpp/api-fechamento-operacional.php'; //laravel
  //     let url = 'http://localhost/phpp/api-fechamento-operacional.php'; //laravel
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

  getFechamento(data: String, total: number, comercial: number, linha: number, psico: number, pgunidades: number, pgvolumes: number, inciolinha: number, faltalinha: number, conferido: number, faltaconferir: number, tlinha: number, tconferencia: number, v762: number, v766: number, v790: number) {
    var headers = new Headers();
    headers.append('Access-Control-Allow-Origin', '*');
    headers.append('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT');
    headers.append('Accept', 'application/json');
    headers.append('content-type', 'application/json');
    headers.append('Content-Type', 'multipart/form-data');
    let options = new RequestOptions({ headers: headers });

    var myData = JSON.stringify({
      //php : ta na tela      
      data: data,
      captacao_total: total,
      captacao_comercial: comercial,
      linha: linha,
      psico: psico,
      pedido_grande_unidades: pgunidades,
      pedido_grande_volumes: pgvolumes,
      inicio_linha: inciolinha,
      falta_inicio_linha: faltalinha,
      conferencia: conferido,
      falta_conferencia: faltaconferir,
      termino_linha: tlinha,
      termino_conferencia: tconferencia,
      rede762: v762,
      rede766: v766,
      rede790: v790
    });


    return new Promise((resolve, reject) => {
      this.http.post('http://localhost/phpp/api-fechamento.php', myData, options)
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


