import { Component, OnInit, ViewChild } from '@angular/core';
import { DadosSCService } from '../services/dados-sc.service';
import { NavController } from '@ionic/angular';
//import da lib responsavel pelo recebimeto de parametros
import { ActivatedRoute } from '@angular/router';
import { Analiseerros } from './separacao.model';

@Component({
  selector: 'app-separacao',
  templateUrl: './separacao.page.html',
  styleUrls: ['./separacao.page.scss'],
})
export class SeparacaoPage implements OnInit {

  analises: Analiseerros[];
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
    this.service.getErros().then((result: any[]) => {
      this.analises = result['analises'];
    }).catch((error: any) => {
      console.error("error: " + error);
    });
  }

  ngOnInit() {
  }

}
