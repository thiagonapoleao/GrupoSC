import { Component, OnInit } from '@angular/core';
import { DadosSCService } from '../services/dados-sc.service';
import { User } from './user.model';


@Component({
  selector: 'app-api',
  templateUrl: './api.page.html',
  styleUrls: ['./api.page.scss'],
})
export class ApiPage implements OnInit {
  users: User[];

  constructor(public servico: DadosSCService) { }

  ngOnInit() {
    this.getDados();
  }
  getDados() {

    this.servico.getAlluser().then((result: any) => {
      this.users = result;
    }).catch((error: any) => {
      console.error("Erro: " + error);
    });
  }

  filterList(evt) {
    const searchTerm = evt.srcElement.value;
    if (!searchTerm) {
      this.ngOnInit();
      return;
    }
    this.users = this.users.filter(
      termo => {
        if (termo.name && searchTerm) {
          if (termo.name.toLowerCase().indexOf(searchTerm.toLowerCase()) > -1) {
            return true;
          }
          return false;
        }
      }
    );
  }

}
