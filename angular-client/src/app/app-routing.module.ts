import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './components/home/home.component';
import { FormComponent } from './components/giphy/form/form.component';
import { ListComponent } from './components/giphy/list/list.component';
import { NotFoundComponent } from './components/not-found/not-found.component';
import { HttpClientModule } from '@angular/common/http';
import { ChatComponent } from './components/chat/chat.component';

const routes: Routes = [
  {path: '', component: HomeComponent},
  {path: 'giphies/add', component: FormComponent},
  {path: 'giphies/list', component: ListComponent},
  {path: 'chat', component: ChatComponent},
  {path: '**', component: NotFoundComponent},
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes),
    HttpClientModule
  ],
  exports: [
    RouterModule
  ]
})
export class AppRoutingModule { }
