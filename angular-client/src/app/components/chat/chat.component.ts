import { Component, OnInit, ViewEncapsulation } from '@angular/core';
import { Idle } from 'idlejs/dist';
import * as io from 'socket.io-client';
import { DatePipe } from '@angular/common';

@Component({
  selector: 'app-chat',
  templateUrl: './chat.component.html',
  styleUrls: ['./chat.component.css'],
  encapsulation: ViewEncapsulation.None,
})
export class ChatComponent implements OnInit {
  
  socket: SocketIOClient.Socket;
  idle: Idle;
  newMsg: String;
  content: String;
  messages: Array<any>;
    
  
  constructor() {
    // this.socket = io.connect();
    this.socket = require('socket.io-client')('http://localhost:3000');
  }

  ngOnInit() {
    // close window after 10 minutes
    this.idle = new Idle()
      .whenNotInteractive()
      .within(1)
      .do(() => {
        console.log('Closing tab after security time');
        window.close();
      })
      .start();

    this.content = '';
    this.messages = new Array();
    this.socket.on('chat:message', function(data) {
      this.messages.push(data);
      // console.log('New message received:');
      var today = new Date().toString();
      // var today = new DatePipe().transform(date, 'dd/MM/yyyy');
      // console.log(today);
      var li = `
        <div class="d-flex justify-content-start mb-4">
          <div class="img_cont_msg">
            <img src="https://devilsworkshop.org/files/2013/01/enlarged-facebook-profile-picture.jpg" class="rounded-circle user_img_msg">
          </div>
          <div class="msg_cotainer">
            ${ data.message }
            <span class="msg_time">
              ${ today }
            </span>
          </div>
        </div>
      `;
      this.content += li;
      // this.content += '<p>'+data.message+'</p>';
      console.log(this.content);
      console.log(this.messages);
    });
  }

  sendMesage() {
    console.log('Clickkkk');
    this.socket.emit('chat:message', {
      message: this.newMsg,
      user: 'Joda Master'
    });
    this.newMsg = '';
  }
}
