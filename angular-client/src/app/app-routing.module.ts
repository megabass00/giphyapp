import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AuthGuard } from './guards/auth.guard'

import { LoginComponent } from './components/login/login.component';
import { HomeComponent } from './components/home/home.component';
import { FormComponent } from './components/giphy/form/form.component';
import { ListComponent } from './components/giphy/list/list.component';
import { NotFoundComponent } from './components/not-found/not-found.component';
import { HttpClientModule } from '@angular/common/http';
import { ChatComponent } from './components/chat/chat.component';
import { ChatCamouflageComponent } from './components/chat-camouflage/chat-camouflage.component';

const routes: Routes = [
  {path: '', component: HomeComponent},
  {path: 'login', component: LoginComponent},
  {path: 'giphies/add', component: FormComponent, canActivate: [AuthGuard]},
  {path: 'giphies/list', component: ListComponent, canActivate: [AuthGuard]},
  {path: 'chat', component: ChatComponent, canActivate: [AuthGuard]},
  {path: 'chat-camouflage', component: ChatCamouflageComponent, canActivate: [AuthGuard]},
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
