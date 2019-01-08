import { Injectable } from '@angular/core';
import { Observable } from 'rxjs/Observable';
import { Http, Headers, Response } from '@angular/http';
import { map, catchError } from 'rxjs/operators';
import { environment } from '../../environments/environment'
import { User } from '../interfaces/user'
 

@Injectable({
  providedIn: 'root'
})
export class UserService {

  private apiUrl = environment.apiUrl;
  // private oauthUrl = "http://server.techalin.com/oauth/token";
  // private usersUrl = "http://server.techalin.com/api/users";

  constructor(private http: Http) { }

  getAccessToken(username: string, password: string) {
    var headers = new Headers({
        "Content-Type": "application/json",
        "Accept": "application/json"
    });

    let postData = {
        grant_type: "password",
        client_id: 2,
        client_secret: environment.clientSecret,
        username: username,
        password: password,
        scope: ""
    }

    return this.http.post(this.apiUrl+'oauth/token', JSON.stringify(postData), {
        headers: headers
      })
      .pipe(
        map((res: Response) => res.json()),
        catchError((error: any) => Observable.throw(error.json().error || 'Server error'))
      );
        // .map((res: Response) => res.json())
        // .catch((error: any) => Observable.throw(error.json().error || 'Server error'));
  }

  getUserData(accessToken: string): Observable<User[]> {
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
        // .map((res: Response) => res.json())
        // .catch((error: any) => Observable.throw(error.json().error || 'Server error'));
  }

}
