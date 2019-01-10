import { Component, OnInit } from '@angular/core';
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
    private loggedUser:LoggedUser
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

    this.ws.getAccessToken(username, password)
      .subscribe(
        data => this.getUserData(data),
        err => this.manageError(err)
    );
  }


  private getUserData(data) {
    console.log(data);
    this.ws.getUserData(data.access_token)
      .subscribe(
        data => this.saveUserData(data),
        err => this.manageError(err)
    );
  }

  private saveUserData(data) {
    this.sendind = false;
    console.log('Saving user data:');
    console.log(data);
    this.loggedUser.data = new User();
    this.loggedUser.data.id = data.id;
    this.loggedUser.data.type = data.type;
    this.loggedUser.data.masterName = data.name;
    this.loggedUser.data.userName = data.last_name;
    this.loggedUser.data.email = data.email;
    this.loggedUser.data.avatar = environment.hostUrl+ 'images/users/' +data.image;
    
    localStorage.setItem('giphyUser', JSON.stringify(this.loggedUser.data));
  }

  private manageError(error) {
    this.sendind = false;
    this.validationError = error;
    console.log('Managing error: '+ error.message);
  }
}
