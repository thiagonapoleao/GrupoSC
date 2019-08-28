import { Component, OnInit, ViewChild } from '@angular/core';
import { IonSlides } from '@ionic/angular';
import { DadosSCService } from '../services/dados-sc.service';
import { Analise } from '../home/home.model';

@Component({
  selector: 'app-home',
  templateUrl: './home.page.html',
  styleUrls: ['./home.page.scss'],
})
export class HomePage implements OnInit {
  @ViewChild(IonSlides, { static: false }) slides: IonSlides;

  analises: Analise[];
  anlQuebra: Analise = new Analise();
  anlChegada: Analise = new Analise();
  anlSaida: Analise = new Analise();
  anlCancT: Analise = new Analise();
  anlCancO: Analise = new Analise();
  anlCancC: Analise = new Analise();
  anlDevT: Analise = new Analise();
  anlDevLog: Analise = new Analise();
  anlDevCom: Analise = new Analise();
  anlDevWeb: Analise = new Analise();
  anlBloq: Analise = new Analise();
  anlLeadTime: Analise = new Analise();
  anlUpmSepTotal: Analise = new Analise();
  anlUpmSepLinha: Analise = new Analise();
  anlUpmSepPsico: Analise = new Analise();
  anlUpmAudTotal: Analise = new Analise();
  anlUpmAudLinha: Analise = new Analise();
  anlUpmAudPsico: Analise = new Analise();
  anlAcuLote: Analise = new Analise();
  anlFefo: Analise = new Analise();
  anlUnidades: Analise = new Analise();
  anlVenda: Analise = new Analise();





  constructor(public service: DadosSCService) {
  }

  ngOnInit() {
    this.getDados();
    console.log
  }


  getDados() {
    this.service.getFarol().then((result: any[]) => {
      this.analises = result['analises'];
      console.log(this.analises);
    }).catch((error: any) => {
      console.error("error: " + error);
    }).finally(() => {
      this.analises.forEach(u => {
        if (u.indicadores == "Quebras GMD + CRI") {
          console.log(this.anlQuebra);
          this.anlQuebra = u;
        } else if (u.indicadores == "Chegadas CD (D ?2)") {
          console.log(this.anlChegada);
          this.anlChegada = u;
        } else if (u.indicadores == "Saidas CD") {
          console.log(this.anlSaida);
          this.anlSaida = u;
        } else if (u.indicadores == "Canc. Total") {
          console.log(this.anlCancT);
          this.anlCancT = u;
        } else if (u.indicadores == "Canc. Operacional") {
          console.log(this.anlCancO);
          this.anlCancO = u;
        } else if (u.indicadores == "Canc. Comercial") {
          console.log(this.anlCancC);
          this.anlCancC = u;
        } else if (u.indicadores == "Devolucao Total WEB + BO") {
          console.log(this.anlDevT);
          this.anlDevT = u;
        } else if (u.indicadores == "Devolucao BO Log") {
          console.log(this.anlDevLog);
          this.anlDevLog = u;
        } else if (u.indicadores == "Devolucao BO Com") {
          console.log(this.anlDevCom);
          this.anlDevCom = u;
        } else if (u.indicadores == "Devolucao (WEB)") {
          console.log(this.anlDevWeb);
          this.anlDevWeb = u;
        } else if (u.indicadores == "Bloqueio") {
          console.log(this.anlBloq);
          this.anlBloq = u;
        } else if (u.indicadores == "Lead Time Interno Total (visao CD)") {
          console.log(this.anlLeadTime);
          this.anlLeadTime = u;
        } else if (u.indicadores == "UPM Separacao Total") {
          console.log(this.anlUpmSepTotal);
          this.anlUpmSepTotal = u;
        } else if (u.indicadores == "UPM Separacao linha") {
          console.log(this.anlUpmSepLinha);
          this.anlUpmSepLinha = u;
        } else if (u.indicadores == "UPM Separacao Psico") {
          console.log(this.anlUpmSepPsico);
          this.anlUpmSepPsico = u;
        } else if (u.indicadores == "UPM Auditoria Total") {
          console.log(this.anlUpmAudTotal);
          this.anlUpmAudTotal = u;
        } else if (u.indicadores == "UPM Auditoria linha") {
          console.log(this.anlUpmAudLinha);
          this.anlUpmAudLinha = u;
        } else if (u.indicadores == "UPM Auditoria Psico") {
          console.log(this.anlUpmAudPsico);
          this.anlUpmAudPsico = u;
        } else if (u.indicadores == "Acuracidade Lote") {
          console.log(this.anlAcuLote);
          this.anlAcuLote = u;
        } else if (u.indicadores == "FEFO - Reposicao Lote Antigo") {
          console.log(this.anlFefo);
          this.anlFefo = u;
        } else if (u.indicadores == "Unidades Separadas Total") {
          console.log(this.anlUnidades);
          this.anlUnidades = u;
        } else if (u.indicadores == "Venda") {
          console.log(this.anlVenda);
          this.anlVenda = u;
        } else {
          console.log();
        }

      });
    });
  }


}
