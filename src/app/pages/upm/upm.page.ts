import { Component, OnInit, ViewChild } from '@angular/core';
import { DadosSCService } from '../services/dados-sc.service';
import { NavController } from '@ionic/angular';
import { ActivatedRoute } from '@angular/router';
import { Upm } from './upm.model';
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

  @ViewChild('barCanvas', { static: false }) barCanvas;
  @ViewChild('lineCanvas', { static: false }) lineCanvas;
  @ViewChild('pieCanvas', { static: false }) pieCanvas;
  @ViewChild('doughnutCanvas', { static: false }) doughnutCanvas;

  barChart: any;
  lineChart: any;
  pieChart: any;
  doughnutChart: any;




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

  ngAfterViewInit() {
    setTimeout(() => {
      this.barCanvas = this.getBarChart();
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
    console.log(this.upms);
    const data = {
      labels: [this.upms[0]['tipo'], this.upms[1]['tipo'], this.upms[2]['tipo']],
      datasets: [{
        label: 'UPM',
        data: [this.upms[0].upm , this.upms[1].upm, this.upms[2].upm],
        backgroundColor: [
          'rgb(255, 0, 0)',
          'rgb(20, 0, 255)',
          'rgb(255, 230, 0)',
        ],            
        borderWidth: 5
      }]
    };

    const options = {
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
