import { Component } from '@angular/core';

import { Platform } from '@ionic/angular';
import { SplashScreen } from '@ionic-native/splash-screen/ngx';
import { StatusBar } from '@ionic-native/status-bar/ngx';
import { DadosSCService } from './pages/services/dados-sc.service';

@Component({
  selector: 'app-root',
  templateUrl: 'app.component.html',
  styleUrls: ['app.component.scss']
})
export class AppComponent {
  public appPages = [
    {
      title: 'Farol',
      url: '/home',
      icon: 'home'
    },
    {
      title: 'UPM',
      url: '/upm',
      icon: 'upm'
    },
    {
      title: 'Produção por Conferente',
      url: '/conferencia',
      icon: 'conferencia'
    },
    {
      title: 'Produção por Conferente',
      url: '/analiseprodconf',
      icon: 'conferencia'
    },
    {
      title: 'Erros por separador',
      url: '/errseparacao',
      icon: 'errseparacao'
    },
    {
      title: 'Fechamento Operacional',
      url: '/fechamento',
      icon: 'fechamento'
    },
    {
      title: 'UPM Linha',
      url: '/upmlinha',
      icon: 'upmlinha'
    }
  ];

  constructor(
    private platform: Platform,
    private splashScreen: SplashScreen,
    private statusBar: StatusBar
  ) {
    this.initializeApp();
  }

  initializeApp() {
    this.platform.ready().then(() => {
      this.statusBar.styleDefault();
      this.splashScreen.hide();
    });
  }
}

