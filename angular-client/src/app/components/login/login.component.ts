import { Component, OnInit } from '@angular/core';
import { UserService } from '../../services/user.service'

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  constructor(private ws: UserService) { }

  username: string;
  password: string;

  ngOnInit() {
  }

  login() {
    console.log({ username: this.username, password: this.password });
    this.ws.getAccessToken(this.username, this.password)
      .subscribe((data) => {
        console.log(data);
    });
  }
}
