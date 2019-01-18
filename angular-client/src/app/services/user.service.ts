import { Injectable, Input, Output, EventEmitter } from '@angular/core';
import { Http, Headers, Response } from '@angular/http';
import { Router } from '@angular/router';
import { Observable } from 'rxjs/Rx';
import { map, catchError, concat } from 'rxjs/operators';
import { environment } from '../../environments/environment';
import { User } from '../interfaces/user';
 

@Injectable({
  providedIn: 'root'
})
export class UserService {

  @Output() getLoggedIn: EventEmitter<any> = new EventEmitter();
  public _isLoggedIn: boolean = false;
  public userLogged: User = null;

  private apiUrl = environment.hostUrl;

  constructor(private http: Http, private router: Router) { 
    if (localStorage.getItem('giphyUser')) {
      this.userLogged = this.getUser();
      this.isLoggedIn = true;
      console.log('Recover loggued user', this.userLogged);
    }else{
      this.isLoggedIn = false;
      this.router.navigate(['/login']);
    }
  }

  // public methods
  login(username: string, password: string) {
    console.log('Login in...');
    return this.getAccessToken(username, password)
              .concatMap(token => this.getUserData(token));
  }


  // API calls
  getAccessToken(username: string, password: string) {
    var headers = new Headers({
        "Content-Type": "application/json",
        "Accept": "application/json"
    });
    let postData = {
        grant_type: "password",
        client_id: 2, // id dentro de oauth_clients
        client_secret: environment.clientSecret,
        username: username,
        password: password,
        scope: ""
    }
    return this.http.post(this.apiUrl+'oauth/token', JSON.stringify(postData), {
        headers: headers
      })
      .pipe(
        map((res: Response) => this.saveTokenInMemory(res)),
        catchError((error: any) => Observable.throw(error || 'Server error'))
      );
  }

  getUserData(accessToken: string): Observable<User> {
    // console.log('Getting user data with token: '+ accessToken);
    var headers = new Headers({
        "Accept": "application/json",
        "Authorization": "Bearer " + accessToken,
    });
    return this.http.get(this.apiUrl+'api/user', {
        headers: headers
      })
      .pipe(
        map((res: Response) => res.json()),
        catchError((error: any) => Observable.throw(error || 'Server error'))
      );
  } 


  // helpers
  saveTokenInMemory(res: Response) {
    var tokenJson = res.json();
    this.setToken(tokenJson.access_token);
    console.log('AuthToken was saved ok');
    return tokenJson.access_token;
  }


  // custom setter/getter
  @Input() set isLoggedIn(v: boolean) {
    this._isLoggedIn = v;
    this.getLoggedIn.emit(v);
  }

  get isLoggedIn(): boolean {
    return this._isLoggedIn;
  }

  setToken(token: string): void {
    if (token) {
      localStorage.setItem('giphyToken', token);
    }
  }

  getToken(): string {
    return localStorage.getItem('giphyToken');
  }

  setUser(user: User): void {
    if (user) {
      this.userLogged = user;
      this.isLoggedIn = true;
      localStorage.setItem('giphyUser', JSON.stringify(user));
    }
  }

  getUser(): User {
    if (localStorage.getItem('giphyUser')) {
      return JSON.parse(localStorage.getItem('giphyUser'));
    }else{
      return null;
    }
  }

}
