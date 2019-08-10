import { Component, OnInit } from '@angular/core';
import { DadosSCService } from '../services/dados-sc.service';
import { NavController } from '@ionic/angular';
//import da lib responsavel pelo recebimeto de parametros
import { ActivatedRoute } from '@angular/router';


@Component({
  selector: 'app-analiseprodconf',
  templateUrl: './analiseprodconf.page.html',
  styleUrls: ['./analiseprodconf.page.scss'],
})
export class AnaliseprodconfPage implements OnInit {
  //replica aqui os atributos
  codigo: any;
  nome: any;
  total: any;
  media: any;
  porcen: any;

  //aciona o construtor para receber dados
  constructor(public navCtrl: NavController, public service: DadosSCService, private route: ActivatedRoute) {
    this.route.queryParams.subscribe(parametros => {
      this.codigo = parametros["codigo"];
      this.nome = parametros["nome"];
      this.total = parametros["total"];
      this.media = parametros["media"];
      this.porcen = parametros["porcen"];
    });

  }

  ngOnInit() {
  }

}