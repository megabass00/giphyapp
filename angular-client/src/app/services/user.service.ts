import { Injectable } from '@angular/core';
import { Http, Headers, Response } from '@angular/http';
import { Observable } from 'rxjs/Rx';
import { map, catchError, concat } from 'rxjs/operators';
import { environment } from '../../environments/environment'
import { User } from '../interfaces/user'
 

@Injectable({
  providedIn: 'root'
})
export class UserService {

  public isLoggedIn: boolean = false;
  public userLogged: User = null;

  private apiUrl = environment.hostUrl;

  constructor(private http: Http) { 
    // if (this.getUser()) {
    //   this.userLogged = this.getUser();
    //   console.log('Recover loggued user', this.userLogged);
    //   this.isLoggedIn = true;
    // }else{
    //   this.isLoggedIn = false;
    // }
  }

  // public methods
  login(username: string, password: string) {
    var token$ = this.getAccessToken(username, password);
    var user$ = this.getUserData();
    return concat(token$, user$);
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
        map(function (res: Response) {
          var tokenJson = res.json();
          // console.log(tokenJson.access_token);
          localStorage.setItem('giphyToken', tokenJson.access_token);
          console.log('AuthToken was saved ok');
          return tokenJson;
        }),
        catchError(function(error: any) {
          var errorJson = error.json();
          console.log(errorJson);
          return Observable.throw(errorJson || 'Server error');
        })
      );
  }


  getUserData(): Observable<User> {
    // console.log('Getting user data with token: '+ accessToken);
    var headers = new Headers({
        "Accept": "application/json",
        "Authorization": "Bearer " + this.getToken(),
    });

    return this.http.get(this.apiUrl+'api/user', {
        headers: headers
      })
      .pipe(
        map((res: Response) => res.json()),
        catchError((error: any) => Observable.throw(error.json().error || 'Server error'))
      );
  } 


  // helpers
  // private saveUserData(data) {
  //   console.log('Saving user data', data);
  //   this.userLogged = new User();
  //   this.userLogged.id = data.id;
  //   this.userLogged.type = data.type;
  //   this.userLogged.masterName = data.name;
  //   this.userLogged.userName = data.last_name;
  //   this.userLogged.email = data.email;
  //   this.userLogged.avatar = environment.hostUrl+ 'images/users/' +data.image;

  //   this.setUser(this.userLogged);
  //   // this.router.navigate(['/']);
  // }

  // private manageError(error) {
  //   // this.sendind = false;
  //   // this.validationError = error;
  //   console.log('Managing error: '+ error.message);
  // }


  // custom setter/getter
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
      localStorage.setItem('giphyUser', JSON.stringify(user))
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
