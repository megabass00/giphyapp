import { Component, OnInit } from '@angular/core';
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
    private router: Router) {
      this.authService.getLoggedIn.subscribe(isLogged => this.isLogged = isLogged);  
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
    this.router.navigate(['/login']);
  }

}
