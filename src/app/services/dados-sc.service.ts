import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class DadosSCService {

  //private api : String = 'http://localhost:8000';
  url: string = "http://localhost/phpp/";
 
  constructor(public http: Http) { }

  getLogin(){

  }

  getBusca() {
    return this.http.get(this.url + 'dados.php').pipe(map(res =>res.json()));
  }

}
