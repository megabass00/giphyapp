import { Injectable } from '@angular/core';
import { Observable } from 'rxjs/Rx';
import { map, catchError, throttleTime } from 'rxjs/operators';
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


  /*
  * API
  */
  public getGiphies() {
    return this.http.get(environment.hostUrl+'api/giphies', {
      headers: this.getHeaders()
    })
    .pipe(
      map((res: Response) => res.json()),
      catchError((error: any) => Observable.throw(error.json().error || 'Server error'))
    );
  }

  public searchGiphies(term: string) {
    return this.http.get(environment.hostUrl+'api/giphies/search/'+term, {
      headers: this.getHeaders()
    })
    .pipe(
      throttleTime(2000),
      map(res => res.json()),
      catchError((err: any) => Observable.throw(err.json().error || 'Server error'))
    );
  }


  /*
  * Helpers
  */
  private getHeaders() {
    return new Headers({
      "Accept": "application/json",
      "Authorization": "Bearer " + this.accessToken,
    });
  }
}
