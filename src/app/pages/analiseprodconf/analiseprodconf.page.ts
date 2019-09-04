import { Component, OnInit } from '@angular/core';
import { DadosSCService } from '../services/dados-sc.service';
import { NavController } from '@ionic/angular';
//import da lib responsavel pelo recebimeto de parametros
import { ActivatedRoute } from '@angular/router';
import { Analise } from './analise.model';


@Component({
  selector: 'app-analiseprodconf',
  templateUrl: './analiseprodconf.page.html',
  styleUrls: ['./analiseprodconf.page.scss'],
})
export class AnaliseprodconfPage implements OnInit {
  analises: Analise[];
  //replica aqui os atributos
  codigo: any;
  nome: any;
  total: any;
  media: any;
  porcen: any;

  //aciona o construtor para receber dados
  constructor(public navCtrl: NavController, public service: DadosSCService, private route: ActivatedRoute) {
    this.getDados();
  }

  getDados() {
    this.service.getAlluser().then((result: any[]) => {
      this.analises = result['analises'];
    }).catch((error: any) => {
      console.error("error: " + error);
    });
  }


  ngOnInit() {
  }

}