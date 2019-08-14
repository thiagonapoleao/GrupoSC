import { Component, OnInit } from '@angular/core';
import { DadosSCService } from '../services/dados-sc.service';
import { NavController } from '@ionic/angular';
import { ActivatedRoute } from '@angular/router';
import { Upm } from './upm.model';

@Component({
  selector: 'app-upm',
  templateUrl: './upm.page.html',
  styleUrls: ['./upm.page.scss'],
})
export class UpmPage implements OnInit {

  upms: Upm[];
  indicador: any;
  meta: any;
  upm: any;
  erros: any;


  constructor(public navCtrl: NavController, public service: DadosSCService, private route: ActivatedRoute) {

    this.getDados();
  }


  getDados() {
    this.service.getUpm().then((result: any[]) => {
      this.upms = result['umps'];
    }).catch((error: any) => {
      console.error("error: " + error);
    });
  }

  ngOnInit() {
  }



}
