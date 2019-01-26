import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
import { HttpClientModule } from '@angular/common/http';
import { CookieService } from 'angular2-cookie/services/cookies.service';
import { PopoverModule } from 'ngx-popover'
import { FileDropModule } from 'ngx-file-drop';
import { StarRatingModule } from 'angular-star-rating';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NavbarComponent } from './components/navbar/navbar.component';
import { HomeComponent } from './components/home/home.component';
import { NotFoundComponent } from './components/not-found/not-found.component';
import { FooterComponent } from './components/footer/footer.component';
import { FormComponent } from './components/giphy/form/form.component';
import { ListComponent } from './components/giphy/list/list.component';
import { ChatComponent } from './components/chat/chat.component';
import { LoginComponent } from './components/login/login.component';
import { SpinnerComponent } from './components/spinner/spinner.component';
import { SimpleSpinnerComponent } from './components/simple-spinner/simple-spinner.component';

import { SafeUrlPipe } from './pipes/safe-url.pipe';
import { ChatCamouflageComponent } from './components/chat-camouflage/chat-camouflage.component';
import { RatingComponent } from './components/rating/rating.component';
import { CopyClipboardComponent } from './components/copy-clipboard/copy-clipboard.component';
import { ShortPipe } from './pipes/short.pipe';
import { AppCheckboxComponent } from './components/app-checkbox/app-checkbox.component'

@NgModule({
  declarations: [
    AppComponent,
    NavbarComponent,
    HomeComponent,
    NotFoundComponent,
    FooterComponent,
    FormComponent,
    ListComponent,
    ChatComponent,
    ChatCamouflageComponent,
    LoginComponent,
    SpinnerComponent,
    SimpleSpinnerComponent,
    SafeUrlPipe,
    RatingComponent,
    CopyClipboardComponent,
    ShortPipe,
    AppCheckboxComponent,
  ],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    AppRoutingModule,
    FormsModule,
    HttpModule,
    HttpClientModule,
    PopoverModule,
    FileDropModule,
    StarRatingModule.forRoot()
  ],
  providers: [
    CookieService,
  ],
  bootstrap: [
    AppComponent
  ]
})
export class AppModule { }
