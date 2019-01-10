import { Injectable } from '@angular/core';
import { User } from '../interfaces/user';

// @Injectable({
//   providedIn: 'root'
// })
@Injectable()
export class LoggedUser {

  public data:User;

  constructor() { }
}
