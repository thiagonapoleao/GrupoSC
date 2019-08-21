import { Component, OnInit, ViewChild } from '@angular/core';
import { IonSlides } from '@ionic/angular';
import { DadosSCService } from '../services/dados-sc.service';
import { Upm } from '../upm/upm.model';

@Component({
  selector: 'app-home',
  templateUrl: './home.page.html',
  styleUrls: ['./home.page.scss'],
})
export class HomePage implements OnInit {
  @ViewChild(IonSlides, { static: false }) slides: IonSlides;

  upms: Upm[];
  upmTotal: Upm = new Upm();
  upmLinha: Upm = new Upm();
  upmPsico: Upm = new Upm();



  constructor(public service: DadosSCService) {
  }

  ngOnInit() {
    this.getDados();
    console.log
  }
  getDados() {
    this.service.getUpm().then((result: any[]) => {
      this.upms = result['upms'];
      console.log(this.upms);     
    }).catch((error: any) => {
      console.error("error: " + error);
    }).finally(() => {
      this.upms.forEach(u => {
        if (u.indicador == "Total") {
          console.log(this.upmTotal);
          this.upmTotal = u;
        }
        if (u.indicador == "Linha") {
          console.log(this.upmLinha);
          this.upmLinha = u;
        }
        if (u.indicador == "Psico") {
          console.log(this.upmPsico);
          this.upmPsico = u;
        }
      });
    });
  }

  // getDados() {
  //   this.service.getUpm().then((result: any[]) => {
  //     this.upms = result['upms'];
  //     console.log(this.upms);
  //   }).catch((error: any) => {
  //     console.error("error: " + error);
  //   }).finally(() => {
  //     this.upms.forEach(u => {
  //       if (u.indicador == "Linha") {
  //         console.log(this.upmTotal);
  //         this.upmTotal = u;
  //       }
  //     });
  //   });
  // }
}
