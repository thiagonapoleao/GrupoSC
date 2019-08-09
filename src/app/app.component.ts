import { Component } from '@angular/core';

import { Platform } from '@ionic/angular';
import { SplashScreen } from '@ionic-native/splash-screen/ngx';
import { StatusBar } from '@ionic-native/status-bar/ngx';
import { DatabaseService} from './provider/database.service';

@Component({
  selector: 'app-root',
  templateUrl: 'app.component.html',
  styleUrls: ['app.component.scss']
})
export class AppComponent {
  public appPages = [
    {
      title: 'Home',
      url: '/home',
      icon: 'home'
    },
    {
      title: 'UPM Total',
      url: '/upm',
      icon: 'upm'
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


// public appPages: any = null; 
//[
//   {
//     title: 'Home',
//     url: '/home',
//     icon: 'home'
//   },
//   {
//     title: 'UPM Total',
//     url: '/upm',
//     icon: 'upm'
//   }
// ];

// constructor(private platform: Platform, private splashScreen: SplashScreen, private statusBar: StatusBar, public dbprovider: DatabaseService)
// {
//   this.initializeApp();
// }

// initializeApp() {
//   this.platform.ready().then(() => {
//     this.statusBar.styleDefault();
//     this.dbprovider.createdataBase().then(() => {
//       this.openTabsPage(this.splashScreen);
//       alert("Banco criado com sucesso!");
//     }).catch(e => {
//         alert("Não foi possivel criar o banco!");
//       console.error(e)
//       this.openTabsPage(this.splashScreen);
//     });      
//   });
// }

// public openTabsPage(splashScreen: SplashScreen) {
//   splashScreen.hide();
//   this.appPages = this.openTabsPage;
// }

// }

