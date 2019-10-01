import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { Routes, RouterModule } from '@angular/router';

import { IonicModule } from '@ionic/angular';

import { LancafechamentoPage } from './lancafechamento.page';

const routes: Routes = [
  {
    path: '',
    component: LancafechamentoPage
  }
];

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    RouterModule.forChild(routes)
  ],
  declarations: [LancafechamentoPage]
})
export class LancafechamentoPageModule {}
