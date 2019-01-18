import { Injectable } from '@angular/core';
import { CanActivate, Router } from '@angular/router';

import { UserService } from '../services/user.service';

@Injectable({
  providedIn: 'root'
})
export class AuthGuard implements CanActivate {

  constructor(
    private authService: UserService,
    private router: Router
  ) 
  { }

  canActivate() {
    if (this.authService.isLoggedIn) {
      return true;
    }else{
      this.router.navigate(['/login']);
      return false;
    }
  }
}
