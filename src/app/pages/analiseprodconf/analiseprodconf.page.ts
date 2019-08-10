import { Component, OnInit } from '@angular/core';
import { DadosSCService } from '../../services/dados-sc.service';
import { NavController } from '@ionic/angular';


@Component({
  selector: 'app-analiseprodconf',
  templateUrl: './analiseprodconf.page.html',
  styleUrls: ['./analiseprodconf.page.scss'],
})
export class AnaliseprodconfPage implements OnInit {

  analise: any;

  constructor(public navCtrl: NavController, public service: DadosSCService) { 
    this.getBusca();
  }

  ngOnInit() {
  }

  getBusca() {
    this.service.getBusca().subscribe(
      data => this.analise = data,
      error => console.log(error)
    );
  }

}
