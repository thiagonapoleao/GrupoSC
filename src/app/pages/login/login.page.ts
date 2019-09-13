import { Component, OnInit, ViewChild } from '@angular/core';
import { IonSlides } from '@ionic/angular';
import { Keyboard } from '@ionic-native/keyboard/ngx';
import { DadosSCService } from '../services/dados-sc.service';
import { NavController } from '@ionic/angular';
//import da lib responsavel pelo recebimeto de parametros
import { ActivatedRoute } from '@angular/router';
import { Acesso } from './login.model';
import { NavigationExtras } from '@angular/router';



@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage implements OnInit {
  @ViewChild(IonSlides, { static: false }) slides: IonSlides;
  navigation: NavigationExtras;
  acessos: number;

  //replica aqui os atributos
  usuario: any;
  nome: any;
  senha: any;
  data_cadastro: any;
  role: any;

  constructor(public navCtrl: NavController, public service: DadosSCService, private route: ActivatedRoute) {
   
  }


  ngOnInit() { }


  Login() {
    this.service.getLogin(this.usuario, this.senha).then((result: any[]) => {
      this.acessos = result['acessos'];
      console.log(this.acessos);
      if (this.acessos == 1) {
        console.log(this.acessos);
        this.navCtrl.navigateBack(['home'], this.navigation);
      }else{
        console.log(this.usuario);
        console.log(this.senha);
      }
      console.log("getDados");
    }).catch((error: any) => {
      console.error("error: " + error);
    });
  }


}



