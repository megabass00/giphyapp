import { Component, OnInit } from '@angular/core';
import { Giphy } from 'src/app/interfaces/giphy';

@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.css']
})
export class FormComponent implements OnInit {

  giphy: Giphy;

  constructor() {
    this.giphy.title = null;
    this.giphy.description = null;
    this.giphy.url = 'https://media.tenor.com/images/61f264d4e7167addb805f9d16e75352d/tenor.gif';
    this.giphy.rating = null;
    this.giphy.copiesNumber = 0;
  }

  ngOnInit() {
  }

}
