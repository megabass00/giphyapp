import { Injectable } from '@angular/core';
import { Observable } from 'rxjs/Rx';
import { map, catchError } from 'rxjs/operators';
import { Http, Headers, Response } from '@angular/http'
import { environment } from '../../environments/environment'

@Injectable({
  providedIn: 'root'
})
export class GiphiesService {

  private accessToken:string;

  constructor(private http:Http) {
    if (localStorage.getItem('giphyToken')) {
      this.accessToken = localStorage.getItem('giphyToken');
    }else{
      throw console.error('No API access token finded');
    }
  }


  public getGiphies() {
    return this.http.get(environment.hostUrl+'api/giphies', {
      headers: this.getHeaders()
    })
    .pipe(
      map((res: Response) => res.json()),
      catchError((error: any) => Observable.throw(error.json().error || 'Server error'))
    );
  }

  private getHeaders() {
    return new Headers({
      "Accept": "application/json",
      "Authorization": "Bearer " + this.accessToken,
    });
  }
}
