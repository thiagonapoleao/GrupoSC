import { Component, OnInit, ViewChild } from '@angular/core';
import { DadosSCService } from '../services/dados-sc.service';
import { NavController } from '@ionic/angular';
import { ActivatedRoute } from '@angular/router';
import { Upm } from './upm.model';
import { Hora } from './upm.model';
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


  @ViewChild('barCanvas', { static: false }) barCanvas;
  @ViewChild('barCanvas', { static: false }) barCanvas1;
  @ViewChild('lineCanvas', { static: false }) lineCanvas;
  @ViewChild('pieCanvas', { static: false }) pieCanvas;
  @ViewChild('doughnutCanvas', { static: false }) doughnutCanvas;

  barChart: any;
  lineChart: any;
  pieChart: any;
  doughnutChart: any;




  constructor(public navCtrl: NavController, public service: DadosSCService, private route: ActivatedRoute) {
    this.getDados();
    this.getDadosUpm();
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
      console.log(this.upmh);
    }).catch((error: any) => {
      console.error("error: " + error);
    });
  }

  ngOnInit() {
  }

  ngAfterViewInit() {
    setTimeout(() => {
      this.barCanvas = this.getBarChart();
      this.barCanvas1 = this.getBarChart1();
      //this.lineChart = this.getLineChart();
    }, 150)
    setTimeout(() => {
      // this.pieCanvas = this.getPieChart();
      // this.doughnutChart = this.getDoughnutChart();
    }, 250)
  }


  getChart(context, chartType, data, options?) {
    return new chartJs(context, {
      data,
      options,
      type: chartType
    })
  }


  getBarChart() {
    console.log(this.upmh);
    type: 'bar'
    const data = {
      labels: [this.upmh[0]['horasD'], this.upmh[1]['horasD'], this.upmh[2]['horasD'], this.upmh[3]['horasD'], this.upmh[4]['horasD'], this.upmh[5]['horasD'], this.upmh[6]['horasD'], this.upmh[7]['horasD'], this.upmh[8]['horasD'], this.upmh[9]['horasD']],
      datasets: [{
        label: 'Erros Por Hora',
        data: [this.upmh[0].difErros, this.upmh[1].difErros, this.upmh[2].difErros, this.upmh[3].difErros, this.upmh[4].difErros, this.upmh[5].difErros, this.upmh[6].difErros, this.upmh[7].difErros, this.upmh[8].difErros, this.upmh[9].difErros],
        backgroundColor: [
          'rgb(18, 34, 70)',
          'rgb(18, 34, 70)',
          'rgb(18, 34, 70)',
          'rgb(18, 34, 70)',
          'rgb(18, 34, 70)',
          'rgb(18, 34, 70)',
          'rgb(18, 34, 70)',
          'rgb(18, 34, 70)',
          'rgb(18, 34, 70)',
          'rgb(18, 34, 70)',
        ],

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


  getBarChart1() {
    console.log(this.upmh);
    type: 'bar'
    const data = {
      labels: [this.upmh[0]['horasD'], this.upmh[1]['horasD'], this.upmh[2]['horasD'], this.upmh[3]['horasD'], this.upmh[4]['horasD'], this.upmh[5]['horasD'], this.upmh[6]['horasD'], this.upmh[7]['horasD'], this.upmh[8]['horasD'], this.upmh[9]['horasD']],
      datasets: [{
        label: 'Erros Por Hora',
        data: [this.upmh[0].upm, this.upmh[1].upm, this.upmh[2].upm, this.upmh[3].upm, this.upmh[4].upm, this.upmh[5].upm, this.upmh[6].upm, this.upmh[7].upm, this.upmh[8].upm, this.upmh[9].upm],
        backgroundColor: [
          'rgb(18, 34, 70)',
          'rgb(18, 34, 70)',
          'rgb(18, 34, 70)',
          'rgb(18, 34, 70)',
          'rgb(18, 34, 70)',
          'rgb(18, 34, 70)',
          'rgb(18, 34, 70)',
          'rgb(18, 34, 70)',
          'rgb(18, 34, 70)',
          'rgb(18, 34, 70)',
        ],

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
