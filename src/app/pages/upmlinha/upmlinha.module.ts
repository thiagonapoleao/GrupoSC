import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { Routes, RouterModule } from '@angular/router';

import { IonicModule } from '@ionic/angular';

import { UpmlinhaPage } from './upmlinha.page';

const routes: Routes = [
  {
    path: '',
    component: UpmlinhaPage
  }
];

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    RouterModule.forChild(routes)
  ],
  declarations: [UpmlinhaPage]
})
export class UpmlinhaPageModule {}
