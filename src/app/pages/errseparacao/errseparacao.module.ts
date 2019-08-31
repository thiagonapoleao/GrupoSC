import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { Routes, RouterModule } from '@angular/router';

import { IonicModule } from '@ionic/angular';

import { ErrseparacaoPage } from './errseparacao.page';

const routes: Routes = [
  {
    path: '',
    component: ErrseparacaoPage
  }
];

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    RouterModule.forChild(routes)
  ],
  declarations: [ErrseparacaoPage]
})
export class ErrseparacaoPageModule {}
