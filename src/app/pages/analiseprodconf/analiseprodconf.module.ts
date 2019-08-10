import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { Routes, RouterModule } from '@angular/router';

import { IonicModule } from '@ionic/angular';

import { AnaliseprodconfPage } from './analiseprodconf.page';

const routes: Routes = [
  {
    path: '',
    component: AnaliseprodconfPage
  }
];

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    RouterModule.forChild(routes)
  ],
  declarations: [AnaliseprodconfPage]
})
export class AnaliseprodconfPageModule {}
