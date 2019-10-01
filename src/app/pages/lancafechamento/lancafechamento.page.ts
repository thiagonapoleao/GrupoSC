import { Component, OnInit, ViewChild } from '@angular/core';
import { IonSlides } from '@ionic/angular';
import { DadosSCService } from '../services/dados-sc.service';
import { NavController } from '@ionic/angular';
//import da lib responsavel pelo recebimeto de parametros
import { ActivatedRoute } from '@angular/router';
import { NavigationExtras } from '@angular/router';
import { Fechamento } from './lancafechamento.model';
@Component({
  selector: 'app-lancafechamento',
  templateUrl: './lancafechamento.page.html',
  styleUrls: ['./lancafechamento.page.scss'],
})
export class LancafechamentoPage implements OnInit {
  @ViewChild(IonSlides, { static: false }) slides: IonSlides;
  navigation: NavigationExtras;


  //replica aqui os atributos
  fechamentos: Fechamento[];
  data: any;
  total: any;
  comercial: any;
  linha: any;
  psico: any;
  pgunidades: any;
  pgvolumes: any;
  inciolinha: any;
  faltalinha: any;
  conferido: any;
  faltaconferir: any;
  tlinha: any;
  tconferencia: any;
  v762: any;
  v766: any;
  v790: any;

  constructor(public navCtrl: NavController, public service: DadosSCService, private route: ActivatedRoute) {

  }

  ngOnInit() {
  }

  Fechamento() {
    this.service.getFechamento(this.data, this.total, this.comercial, this.linha, this.psico, this.pgunidades, this.pgvolumes, this.inciolinha, this.faltalinha, this.conferido, this.faltaconferir, this.tlinha, this.tconferencia, this.v762, this.v766, this.v790).then((result: any[]) => {
      this.fechamentos = result['fecha'];
      console.log("getFechamento");
    }).catch((error: any) => {
      console.error(error);
    });
  }

}

