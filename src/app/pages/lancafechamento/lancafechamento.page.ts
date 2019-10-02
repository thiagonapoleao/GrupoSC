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

    //configura os campos referente a linha
    let flinha = this.linha - this.inciolinha;
    this.faltalinha = flinha;
    let hlinha = Math.floor(this.faltalinha / 11000);
    let mlinha = Math.floor(((this.faltalinha / 11000) - hlinha) * 60);
    let hlinhaatual = hlinha + 22;
    if (hlinhaatual >= 24) {
      let formathlinha = hlinhaatual - 24;
      this.tlinha = String(formathlinha) + ":" + String(mlinha);
    }
    else {
      this.tlinha = String(hlinhaatual) + ":" + String(mlinha);
    }
    // console.log("falta linha " + (this.faltalinha / 11000))
    // console.log("hora " + hlinha);
    // console.log("minut " + mlinha);
    // console.log(this.tlinha);

    //configura os campos referente a conferencia
    let fconf = (this.linha + this.psico) - this.conferido;
    this.faltaconferir = fconf;
    let hconf = Math.floor(this.faltaconferir / 11000);
    let mconf = Math.floor(((this.faltaconferir / 11000) - hconf) * 60);
    let hconfatual = hconf + 22;
    if (hconfatual >= 24) {
      let formathconf = hconfatual - 24;
      this.tconferencia = String(formathconf) + ":" + String(mconf);
    }
    else {
      this.tconferencia = String(hconfatual) + ":" + String(mconf);
    }

    // console.log("falta conf " + (this.faltaconferir / 11000))
    // console.log("hora " + hconf);
    // console.log("minut " + mconf);
    // console.log("falata conf: " + this.tconferencia);     



    this.service.getFechamento(this.data, this.total, this.comercial, this.linha, this.psico, this.pgunidades, this.pgvolumes, this.inciolinha, this.faltalinha, this.conferido, this.faltaconferir, this.tlinha, this.tconferencia, this.v762, this.v766, this.v790).then((result: any[]) => {
      this.fechamentos = result['fecha'];
      console.log("getFechamento");
    }).catch((error: any) => {
      console.error(error);
    });
  }

}

