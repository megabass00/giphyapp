import { Component, OnInit } from '@angular/core';
import { GiphiesService } from '../../../services/giphies.service'
import { HttpClient } from '@angular/common/http';
import { Giphy } from 'src/app/interfaces/giphy';

@Component({
  selector: 'app-list',
  templateUrl: './list.component.html',
  styleUrls: ['./list.component.css']
})
export class ListComponent implements OnInit {

  API_URL = 'http://192.168.14.111:8081/api';
  giphies: Giphy[];

  constructor(private giphyService: GiphiesService, private httpClient: HttpClient) {
    httpClient.get(this.API_URL + '/giphies')
      .subscribe((data: Giphy[]) => {
        console.log(data);
        this.giphies = data;
    });
   }

  ngOnInit() {
  }

}
