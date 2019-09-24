import { Component, OnInit, ViewChild } from '@angular/core';
import { DadosSCService } from '../services/dados-sc.service';
import { NavController } from '@ionic/angular';
import { ActivatedRoute } from '@angular/router';
import { Upm, Hora, Uestacao } from './upm.model';

import chartJs from 'chart.js';



@Component({
  selector: 'app-upm',
  templateUrl: './upm.page.html',
  styleUrls: ['./upm.page.scss'],
})
export class UpmPage implements OnInit {

  upms: Upm[];
  tipo: any;
  meta: any;
  upm: any;
  erros: any;
  conferencia: any;
  data: any;
  hora: any;

  upmh: Hora[];
  confT: any;
  errosT: any;
  difErros: any;
  horasG: any;
  horasD: any;

  estacoes: Uestacao[];
  estacao: any;
  t_prod: any;
  qtd_cnf: any;
  falta_epm: any;
  falta_upm: any;
  sobra_epm: any;
  sobra_upm: any;
  troca_epm: any;
  troca_upm: any;
  erro_conf_epm: any;
  erro_conf_upm: any;
  trava_valid_epm: any;
  trava_valid_upm: any;

  @ViewChild('barCanvas', { static: false }) barCanvas;
  @ViewChild('barCanvas2', { static: false }) barCanvas2;
  @ViewChild('barCanvas3', { static: false }) barCanvas3;
  // @ViewChild('lineCanvas', { static: false }) lineCanvas;
  // @ViewChild('pieCanvas', { static: false }) pieCanvas;
  // @ViewChild('doughnutCanvas', { static: false }) doughnutCanvas;

  barChart: any;
  lineChart: any;
  pieChart: any;
  doughnutChart: any;




  constructor(public navCtrl: NavController, public service: DadosSCService, private route: ActivatedRoute) {
    this.buscaDados();
  }

  buscaDados() {
    this.getDados();
    this.getDadosUpm();
    this.getDadosEstacao();
  }


  getDados() {
    this.service.getUpm().then((result: any[]) => {
      this.upms = result['upms'];
    }).catch((error: any) => {
      console.error("error: " + error);
    });
  }

  getDadosUpm() {
    this.service.getUpmhr().then((result: any[]) => {
      this.upmh = result['upmh'];
      //console.log(this.upmh);
    }).catch((error: any) => {
      console.error("error: " + error);
    });
  }

  getDadosEstacao() {
    this.service.getEstacao().then((result: any[]) => {
      this.estacoes = result['estacoes'];
      console.log(this.estacoes);
    }).catch((error: any) => {
      console.error("error: " + error);
    });
  }


  ngOnInit() {
    setInterval(() => {
      this.buscaDados();
      this.barCanvas = this.getBarChart();
      this.barCanvas2 = this.getBarChart2();
      this.barCanvas3 = this.getBarChart3();
      //this.barCanvas1 = this.getBarChart1();
      //this.lineChart = this.getLineChart();
    }, 9000)
    // setTimeout(() => {
    //   // this.pieCanvas = this.getPieChart();
    //   // this.doughnutChart = this.getDoughnutChart();
    // }, 3000)
  }

  ngAfterViewInit() {

  }


  getChart(context, chartType, data, options?) {
    return new chartJs(context, {
      data,
      options,
      type: chartType
    })
  }


  getBarChart() {
    //console.log(this.upmh);
    type: 'bar'
    let rotulos: any[] = [];
    let dados: any[] = [];
    let cores: any[] = [];
    for (let upmh of this.upmh) {
      rotulos.push(upmh.horasD);
      dados.push(upmh.difErros);
      cores.push('rgb(18, 34, 70)');
    }
    const data = {
      //labels: [this.upmh[0]['horasD'], this.upmh[1]['horasD'], this.upmh[2]['horasD']],
      labels: rotulos,
      datasets: [{
        label: 'Erros Por Hora',
        //data: [this.upmh[0].difErros, this.upmh[1].difErros, this.upmh[2].difErros],
        data: dados,
        // backgroundColor: [
        //   'rgb(18, 34, 70)',
        //   'rgb(18, 34, 70)',
        //   'rgb(18, 34, 70)',      
        // ],
        backgroundColor: cores,
      }]
    };

    const options = {
      responsive: true,
      tooltips: {
        enabled: false
      },
      animation: {
        onComplete: function () {
          var ctx = this.chart.ctx;
          ctx.textAlign = "center";
          ctx.textBaseline = "middle";
          var chart = this;
          var datasets = this.config.data.datasets;

          datasets.forEach(function (dataset: Array<any>, i: number) {
            ctx.font = "10px Arial";
            ctx.fillStyle = "Black";
            chart.getDatasetMeta(i).data.forEach(function (p: any, j: any) {
              ctx.fillText(datasets[i].data[j], p._model.x, p._model.y - 5);
            });

          });
        }
      },
      legend: {
        display: true,
        labels: {
          fontColor: 'rgb(18, 34, 70)'
        }
      },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
    return this.getChart(this.barCanvas.nativeElement, 'bar', data, options);
  }


  getBarChart2() {
    //console.log(this.upmh);
    type: 'bar'
    let rotulos: any[] = [];
    let dados: any[] = [];
    let cores: any[] = [];
    for (let upmh of this.upmh) {
      rotulos.push(upmh.horasD);
      dados.push(upmh.upm);
      cores.push('rgb(18, 34, 70)');
    }
    const data = {
      labels: rotulos,
      datasets: [{
        label: 'UPM',
        data: dados,
        backgroundColor: cores,
      }]
    };

    const options = {
      responsive: true,
      tooltips: {
        enabled: false
      },
      animation: {
        onComplete: function () {
          var ctx = this.chart.ctx;
          ctx.textAlign = "center";
          ctx.textBaseline = "middle";
          var chart = this;
          var datasets = this.config.data.datasets;

          datasets.forEach(function (dataset: Array<any>, i: number) {
            ctx.font = "10px Arial";
            ctx.fillStyle = "Black";
            chart.getDatasetMeta(i).data.forEach(function (p: any, j: any) {
              ctx.fillText(datasets[i].data[j], p._model.x, p._model.y - 5);
            });

          });
        }
      },
      legend: {
        display: true,
        labels: {
          fontColor: 'rgb(18, 34, 70)'
        }
      },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
    return this.getChart(this.barCanvas2.nativeElement, 'bar', data, options);
  }

  getBarChart3() {
    console.log(this.estacoes);
    type: 'bar'
    let rotulos: any[] = [];
    let dados: any[] = [];
    let cores: any[] = [];
    for (let estacoes of this.estacoes) {
      rotulos.push(estacoes.estacao);
      dados.push(estacoes.troca_upm);
      cores.push('rgb(18, 34, 70)');
    }
    const data = {
      labels: rotulos,
      datasets: [{
        label: 'Erros por Estacão',
        data: dados,
        backgroundColor: cores,
      }]
    };

    const options = {
      responsive: true,
      tooltips: {
        enabled: false
      },
      animation: {
        onComplete: function () {
          var ctx = this.chart.ctx;
          ctx.textAlign = "center";
          ctx.textBaseline = "middle";
          var chart = this;
          var datasets = this.config.data.datasets;

          datasets.forEach(function (dataset: Array<any>, i: number) {
            ctx.font = "10px Arial";
            ctx.fillStyle = "Black";
            chart.getDatasetMeta(i).data.forEach(function (p: any, j: any) {
              ctx.fillText(datasets[i].data[j], p._model.x, p._model.y - 5);
            });

          });
        }
      },
      legend: {
        display: true,
        labels: {
          fontColor: 'rgb(18, 34, 70)'
        }
      },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
    return this.getChart(this.barCanvas3.nativeElement, 'bar', data, options);
  }


  // getLineChart() {
  //   const data = {
  //     labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril'],
  //     datasets: [{
  //       label: 'Menu Dataset',
  //       fill: false,
  //       lineTension: 0.1,
  //       backgroundColor: 'rgb(0, 178, 255)',
  //       borderColor: 'rgb(231, 205, 35)',
  //       borderCapStyle: 'butt',
  //       borderJoinStyle: 'miter',
  //       pointRadius: 1,
  //       pointHitRadius: 10,
  //       data: [20, 15, 98, 4],
  //       scanGaps: false,
  //     },{
  //       label: 'Meu segundo Dataset',
  //       fill: false,
  //       lineTension: 0.1,
  //       backgroundColor: 'rgb(177, 0, 49)',
  //       borderColor: 'rgb(51, 50, 46)',
  //       borderCapStyle: 'butt',
  //       borderJoinStyle: 'miter',
  //       pointRadius: 1,
  //       pointHitRadius: 10,
  //       data: [29, 135, 13, 70],
  //       scanGaps: false,
  //     }
  //   ]
  //   }
  //   return this.getChart(this.lineCanvas.nativeElement, 'line', data);
  // }

  // getPieChart(){
  //   const data = {
  //     labels: ['Vermelho', 'Azul', 'Amarelo'],
  //     datasets: [{
  //       data: [300, 75, 224],
  //       backgroundColor: [
  //         'rgb(200, 6, 0)', 
  //         'rgb(36, 0, 255)', 
  //         'rgb(242, 255, 0)'
  //       ]
  //     }]
  //   }
  //   return this.getChart(this.pieCanvas.nativeElement, 'pie', data);
  // }


  // getDoughnutChart(){
  //   const data = {
  //     labels: ['Vermelho', 'Azul', 'Amarelo'],
  //     datasets: [{
  //       label: 'Teste chart',
  //       data: [12, 65, 32],
  //       backgroundColor: [
  //         'rgb(200, 6, 0)', 
  //         'rgb(36, 0, 255)', 
  //         'rgb(242, 255, 0)'
  //       ]
  //     }]
  //   }
  //   return this.getChart(this.doughnutCanvas.nativeElement, 'doughnut', data);
  // }

}
