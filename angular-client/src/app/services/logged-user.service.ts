import { Injectable } from '@angular/core';
import { User } from '../interfaces/user'

@Injectable()
export class LoggedUser {
  public data:User;

  constructor() { }
}
