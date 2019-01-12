import { Component, OnInit } from '@angular/core';
import { LoggedUser } from '../../services/logged-user.service'

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {

  constructor(private loggedUser:LoggedUser) { }

  ngOnInit() {
  }

}
