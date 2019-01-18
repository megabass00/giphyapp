import { Injectable } from '@angular/core';
import { CanActivate, Router } from '@angular/router';
import { Observable } from 'rxjs';

import { LoggedUser } from '../services/logged-user.service';
// import { UserService } from '../services/user.service';

@Injectable({
  providedIn: 'root'
})
export class AuthGuard implements CanActivate {

  constructor(
    private loggedUser: LoggedUser, 
    private router: Router
  ) 
  { }

  canActivate() {
    if (this.loggedUser.data) {
      return true;
    }else{
      this.router.navigate(['/login']);
      return false;
    }
  }
}
