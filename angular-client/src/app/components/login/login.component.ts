import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router'
import { CookieService } from 'angular2-cookie/core';
import { UserService } from '../../services/user.service'
import { LoggedUser } from '../../services/logged-user.service'
import { User } from 'src/app/interfaces/user';
import { environment } from '../../../environments/environment'

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  public Formdata:any = {};
  public validationError:any = {};
  public sendind:boolean = false;

  constructor(
    private ws: UserService, 
    private _cookieService:CookieService,
    private loggedUser:LoggedUser,
    private router: Router
  ) {
    if(_cookieService.get('remember')) {
      this.Formdata.username = this._cookieService.get('username');
      this.Formdata.password = this._cookieService.get('password');
      this.Formdata.rememberme = this._cookieService.get('remember');
    }
  }

  ngOnInit() {
  }

  login() {
    this.sendind = true;
    var username = this.Formdata.username;
    var password = this.Formdata.password;
    // console.log({ username: username, password: password });

    if (this.Formdata.rememberme) {
      this._cookieService.put('username', this.Formdata.username);
      this._cookieService.put('password', this.Formdata.password);
    }else{
      this._cookieService.put('username', '');
      this._cookieService.put('password', '');
    }
    this._cookieService.put('remember', this.Formdata.rememberme);

    this.ws.login(username, password)
      .subscribe(
        data => this.saveUserData(data),
        err => this.manageError(err)
      );
  }

  private saveUserData(data) {
    this.sendind = false;
    console.log('Saving user data', data);
    var user = new User();
    user.id = data.id;
    user.type = data.type;
    user.masterName = data.name;
    user.userName = data.last_name;
    user.email = data.email;
    user.avatar = environment.hostUrl+ 'images/users/' + data.image;
    
    this.ws.setUser(user);
    this.router.navigate(['/']);
  }

  private manageError(error) {
    console.log('Managing error', error);
    this.sendind = false;
    this.validationError = error.json().error;
  }
}
