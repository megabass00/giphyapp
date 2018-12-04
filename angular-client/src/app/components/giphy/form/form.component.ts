import { Component, OnInit } from '@angular/core';
import { Giphy } from 'src/app/interfaces/giphy';

@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.css']
})
export class FormComponent implements OnInit {

  giphy: Giphy = new Giphy();

  constructor() {
  }

  ngOnInit() {
  }

}
