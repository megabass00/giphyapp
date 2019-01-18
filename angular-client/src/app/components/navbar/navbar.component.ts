import { Component, OnInit } from '@angular/core';
import { LoggedUser } from '../../services/logged-user.service'
import { Router } from '@angular/router'

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {

  constructor(private loggedUser:LoggedUser, private router: Router) { 
  }

  ngOnInit() {
  }
  
  public logout(event: any): void {
    console.log('Logout!!!');
    localStorage.removeItem('giphyToken');
    localStorage.removeItem('giphyUser');
    this.loggedUser = null;
    this.router.navigate(['/']);
  }

}
