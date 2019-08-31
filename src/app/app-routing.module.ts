import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  { path: '', redirectTo: 'home', pathMatch: 'full'},    
  { path: 'home', loadChildren: './pages/home/home.module#HomePageModule' },  
  { path: 'login', loadChildren: './pages/login/login.module#LoginPageModule' },
  { path: 'upm', loadChildren: './pages/upm/upm.module#UpmPageModule' },
  { path: 'upmlinha', loadChildren: './pages/upmlinha/upmlinha.module#UpmlinhaPageModule' },
  { path: 'analiseprodconf', loadChildren: './pages/analiseprodconf/analiseprodconf.module#AnaliseprodconfPageModule' },
  { path: 'api', loadChildren: './pages/api/api.module#ApiPageModule' },
  { path: 'conferencia', loadChildren: './pages/conferencia/conferencia.module#ConferenciaPageModule' },
  { path: 'conferencia', loadChildren: './pages/conferencia/conferencia.module#ConferenciaPageModule' },  { path: 'errseparacao', loadChildren: './pages/errseparacao/errseparacao.module#ErrseparacaoPageModule' },



  //{ path: 'services', loadChildren: './pages/services/services.module#ServicesPageModule' }

];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule {}
