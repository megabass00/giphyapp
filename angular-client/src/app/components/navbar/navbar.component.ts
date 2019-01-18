import { Component, OnInit } from '@angular/core';
import { LoggedUser } from '../../services/logged-user.service'
import { UserService } from '../../services/user.service'
import { Router } from '@angular/router'

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {

  constructor(
    private authService: UserService, 
    private loggedUser: LoggedUser,
    private router: Router) { 
  }

  private isLogged: boolean;


  ngOnInit() {
    this.isLogged = this.authService.isLoggedIn;
  }
  
  public logout(event: any): void {
    console.log('Logout!!!');
    localStorage.removeItem('giphyToken');
    localStorage.removeItem('giphyUser');
    this.authService.userLogged = null;
    this.authService.isLoggedIn = false;
    this.loggedUser = null;
    this.router.navigate(['/login']);
  }

}
