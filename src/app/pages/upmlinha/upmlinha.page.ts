import { Component, OnInit, ViewChild } from '@angular/core';
import { DadosSCService } from '../services/dados-sc.service';
import { NavController } from '@ionic/angular';
import { ActivatedRoute } from '@angular/router';
import { Upm } from './upmlinha.model';


@Component({
  selector: 'app-upmlinha',
  templateUrl: './upmlinha.page.html',
  styleUrls: ['./upmlinha.page.scss'],
})
export class UpmlinhaPage implements OnInit {


  upms: Upm[];
  tipo: any;
  meta: any;
  upm: any;
  erros: any;
  conferencia: any;
  data: any;
  hora: any;



  constructor(public navCtrl: NavController, public service: DadosSCService, private route: ActivatedRoute) {
    this.getDados();
  }


  getDados() {
    this.service.getUpm().then((result: any[]) => {
      this.upms = result['upms'];
    }).catch((error: any) => {
      console.error("error: " + error);
    });
  }

  ngOnInit() {
  }


}
