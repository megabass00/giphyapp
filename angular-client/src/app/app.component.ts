import { Component } from '@angular/core';
import { LoggedUser } from './services/logged-user.service'

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'GiphyAPP - Angular Client';

  constructor(private loggedUser:LoggedUser) {
    if (localStorage.getItem('giphyUser')) {
      this.loggedUser.data = JSON.parse(localStorage.getItem('giphyUser'));
      console.log('Recover loggued user:');
      console.log(this.loggedUser.data);
    }
  }
}
