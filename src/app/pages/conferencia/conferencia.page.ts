import { Component, OnInit, ViewChild} from '@angular/core';
import { DadosSCService } from '../services/dados-sc.service';
import { NavController} from '@ionic/angular';
//import da lib responsavel pelo recebimeto de parametros
import { ActivatedRoute } from '@angular/router';
import { Analise } from './conferencia.model';


@Component({
  selector: 'app-conferencia',
  templateUrl: './conferencia.page.html',
  styleUrls: ['./conferencia.page.scss'],
})
export class ConferenciaPage implements OnInit {
  analises : Analise[];

  //replica aqui os atributos
  codigo: any;
  nome: any;
  total: any;
  media: any;
  porcen: any;

  constructor(public navCtrl: NavController, public service: DadosSCService, private route: ActivatedRoute) { 
    this.getDados();
  }


  getDados() {
    this.service.getAlluser().then(( result : any[]) =>{
      this.analises = result['analises'];
    }).catch((error : any) => {
      console.error("error: " + error);
    });
  }
  ngOnInit() {
  }

}
