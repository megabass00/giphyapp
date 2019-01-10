import { Component, OnInit } from '@angular/core';
import { CookieService } from 'angular2-cookie/core';
import { UserService } from '../../services/user.service'

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  public Formdata:any = {};
  public validationError:any = {};
  public sendind:boolean = false;

  constructor(private ws: UserService, private _cookieService:CookieService) {
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
        data => this.loginOk(data),
        err => this.manageError(err),
        // () => console.log('yay')
    );
  }

  private loginOk(data) {
    this.sendind = false;
  }

  private manageError(error) {
    this.sendind = false;
    this.validationError = error;
    console.log('Managing error');
    console.log(error);
  }
}
