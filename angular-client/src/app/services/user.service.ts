import { Injectable } from '@angular/core';
import { Http, Headers, Response } from '@angular/http';
import { Observable } from 'rxjs/Rx';
import { map, catchError } from 'rxjs/operators';
import { environment } from '../../environments/environment'
import { User } from '../interfaces/user'
 

@Injectable({
  providedIn: 'root'
})
export class UserService {

  private apiUrl = environment.hostUrl;

  constructor(private http: Http) {

  }

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
        catchError((error: any) => Observable.throw(error.json().error || 'Server error'))
      );
  } 
}
