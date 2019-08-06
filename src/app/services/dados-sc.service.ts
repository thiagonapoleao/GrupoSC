import { Injectable } from '@angular/core';
import { Http } from '@angular/http';

@Injectable({
  providedIn: 'root'
})
export class DadosSCService {

  private api : String = 'http://localhost:8000';
 
  constructor(public http : Http) { }

  getLogin(){

  }

}
