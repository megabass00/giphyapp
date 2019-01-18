import { Component } from '@angular/core';
import { UserService } from './services/user.service';
import { LoggedUser } from './services/logged-user.service';
// import { from } from 'rxjs';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'GiphyAPP - Angular Client';

  constructor(private loggedUser:LoggedUser, private authService: UserService) {
    if (this.authService.getUser()) {
      this.loggedUser.data = this.authService.getUser();
      this.authService.userLogged = this.authService.getUser();
      console.log('Recover loggued user', this.authService.userLogged);
      this.authService.isLoggedIn = true;
    }else{
      this.loggedUser = null;
      this.authService.isLoggedIn = false;
    }
  }
}
