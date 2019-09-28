import { Component, OnInit, ViewChild } from '@angular/core';
import { IonSlides } from '@ionic/angular';
import { DadosSCService } from '../services/dados-sc.service';
import { NavController } from '@ionic/angular';
//import da lib responsavel pelo recebimeto de parametros
import { ActivatedRoute } from '@angular/router';
import { NavigationExtras } from '@angular/router';
import { Fechamento } from './fechamento.model';


@Component({
  selector: 'app-fechamento',
  templateUrl: './fechamento.page.html',
  styleUrls: ['./fechamento.page.scss'],
})
export class FechamentoPage implements OnInit {
  @ViewChild(IonSlides, { static: false }) slides: IonSlides;
  navigation: NavigationExtras;
  

  //replica aqui os atributos
  fechamentos : Fechamento[];
  data: any;
  captacao_total: any;
  captacao_comercial: any;
  linha: any;
  psico: any;
  pedido_grande_unidades: any;
  pedido_grande_volumes: any;
  inicio_linha: any;
  falta_inicio_linha: any;
  conferencia: any;
  falta_conferencia: any;
  termino_linha: any;
  termino_conferencia: any;
  rede762: any;
  rede766: any;
  rede790: any; 

  constructor(public navCtrl: NavController, public service: DadosSCService, private route: ActivatedRoute) {
   
  }

  ngOnInit() {
  }

  Fechamento() {
    this.service.getFechamento(this.data, this.captacao_total, this.captacao_comercial, this.linha, this.psico, this.pedido_grande_unidades, this.pedido_grande_volumes, this.inicio_linha, this.falta_inicio_linha, this.conferencia, this.falta_conferencia, this.termino_linha, this.termino_conferencia, this.rede762, this.rede766, this.rede790).then((result: any[]) => {
      this.fechamentos = result['fecha'];     
      console.log("getFechamento");
    }).catch((error: any) => {
      console.error("error: " + error);
    });
  }

  // Fechamento() {
  //   this.service.getFechamento().then((result: any[]) => {
  //     this.fechamentos = result['fecha'];
  //     console.log(result['fechamento']);
  //   }).catch((error: any) => {
  //     console.error("error: " + error);
  //   });
  // }


}
