import { Component, OnInit } from '@angular/core';
import { DadosSCService } from '../services/dados-sc.service';
import { NavController } from '@ionic/angular';
//import da lib responsavel pelo recebimeto de parametros
import { ActivatedRoute } from '@angular/router';
import { Analise } from './errseparacao.model'

@Component({
  selector: 'app-errseparacao',
  templateUrl: './errseparacao.page.html',
  styleUrls: ['./errseparacao.page.scss'],
})
export class ErrseparacaoPage implements OnInit {
  analises: Analise[];

  //replica aqui os atributos
  codigo: any;
  nome: any;
  total: any;
  data: any;
  hora: any;

  constructor(public navCtrl: NavController, public service: DadosSCService, private route: ActivatedRoute) {
    this.getDados();
  }

  getDados() {
    this.service.getErrseparacao().then((result: any[]) => {
      this.analises = result['erros'];
      console.log(result['erros']);
    }).catch((error: any) => {
      console.error("error: " + error);
    });
  }


  ngOnInit() {
  }

}
