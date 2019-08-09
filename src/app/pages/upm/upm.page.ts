import { Component, OnInit } from '@angular/core';
import { DadosSCService } from '../../services/dados-sc.service';
import { NavController } from '@ionic/angular';

@Component({
  selector: 'app-upm',
  templateUrl: './upm.page.html',
  styleUrls: ['./upm.page.scss'],
})
export class UpmPage implements OnInit {

  upm: any;

  constructor(public navCtrl: NavController, public service: DadosSCService) { 
    this.getBusca();
  }

  ngOnInit() {
  }

  getBusca() {
    this.service.getBusca().subscribe(
      data => this.upm = data,
      err => console.log(err)
    );
  }

}
