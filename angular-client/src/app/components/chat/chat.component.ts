import { Component, OnInit, ViewEncapsulation, ElementRef, ViewChild } from '@angular/core';
import { Idle } from 'idlejs/dist';
// import * as io from 'socket.io-client';
import { DatePipe } from '@angular/common';
import { ChatService } from '../../services/chat.service';

import { LoggedUser } from '../../services/logged-user.service'
import { User } from '../../interfaces/user'
import { ChatMessage } from '../../interfaces/chat-message'

import { Action } from '../../services/chat.service';
import { Event } from '../../services/chat.service';

@Component({
  selector: 'app-chat',
  templateUrl: './chat.component.html',
  styleUrls: ['./chat.component.css'],
  encapsulation: ViewEncapsulation.None,
})
export class ChatComponent implements OnInit {
  @ViewChild('contentScroll') private contentScroll: ElementRef;
  @ViewChild('sendMessageInput') private sendMessageInput: ElementRef;

  // action = Action;
  idle: Idle;
  ioConnection: any;

  user: User;
  messages: ChatMessage[] = [];
  usersConnected: User[] = [];
  usersTyping: User[] = [];

  newMsg: string;
  content: string;

  constructor(
    private chatService: ChatService,
    private loggedUser: LoggedUser
  ) 
  { 
    this.user = this.loggedUser.data;
  }


  ngOnInit(): void {
    this.initIoConnection();
    // this.initAutoLogout();
    this.sendMessageInput.nativeElement.focus();
  }

  // initialization
  private initIoConnection(): void {
    this.chatService.initSocket();

    this.ioConnection = this.chatService.onUserConnected().subscribe((message: ChatMessage) => {
        // this.messages.push(message);
        console.log(message);
    });
  
    this.ioConnection = this.chatService.onMessage().subscribe((message: ChatMessage) => {
        this.messages.push(message);
        // console.log(this.messages);
    });

    this.ioConnection = this.chatService.onType().subscribe((message: ChatMessage) => {
        var msg = message.user.masterName+' is typing...';
        console.log(msg);
        // this.usersTyping.push(message.user);
        // console.log(this.usersTyping);
    });
    

    this.chatService.onEvent(Event.CONNECT).subscribe(() => {
        console.log('connected');
        this.usersConnected.push(this.user);
        this.chatService.sendUser(this.user);
    });
      
    this.chatService.onEvent(Event.DISCONNECT).subscribe(() => {
        console.log('disconnected');
    });
  }

  private initAutoLogout(): void {
    this.idle = new Idle()
      .whenNotInteractive()
      .within(10)
      .do(() => {
        console.log('Closing tab after security time');
        window.location.href = '/';
      })
      .start();
  }


  // public methods
  public typeMessage(event: any) {
    if (event.key === "Enter") {
      this.sendMessage(event);
    }else{
      this.sendTyping(event);
    }
  }

  public sendMessage(event: any): boolean {
  // public sendMessage(message: string): void {
      if (event) event.stopPropagation();
      if (!this.newMsg) return false;
      var newMessage = this.newMsg.trim();
      if (newMessage.length <= 0) return false;
      
      newMessage = this.filterMessage(newMessage);
      this.chatService.sendMessage({
        user: this.user,
        content: newMessage,
        date: Date.now(),
      });

      this.newMsg = '';

      try {
          this.contentScroll.nativeElement.scrollTop = this.contentScroll.nativeElement.scrollHeight;
      } catch(err) { }     
      return false;
  }

  public sendTyping(event: any): void {
    this.chatService.sendTyping({
      user: this.user,
      content: this.newMsg, 
      date: Date.now(),
    });
  }

  public replyMessage(message: ChatMessage) {
    console.log(message);
    var replyHtml = `<p>
      Reply to: (${ message.user.masterName }) ${ message.content }
    </p>`;
    this.newMsg = replyHtml;
    // console.log(replyHtml);
    // this.sendMessageInput.nativeElement.insertAdjacentHTML('afterbegin', replyHtml);
  }

  public sendNotification(params: any, action: Action): void {
    let message: ChatMessage;

    // if (action === Action.JOINED) {
    //   message = {
    //     user: this.user,
    //     action: action
    //   }
    // } else if (action === Action.RENAME) {
    //   message = {
    //     action: action,
    //     user: this.user
    //   };
    // }
    message = {
      user: this.user,
      content: this.newMsg,
      date: Date.now(),
    }

    this.chatService.sendMessage(message); 
  }

  public filterMessage(message: string): string {
    var words = message.split(' ');
    return words.map(word => {
      if (word === word.toUpperCase()) {
        return `<strong>${ word.toLowerCase() }</strong>`;
      }else{
        return word;
      }
    })
    .join(' ')
    .replace(/(\\r\\n)|([\r\n])/gmi, '<br/>');
  }
  
  /*socket: SocketIOClient.Socket;
  idle: Idle;
  newMsg: string;
  content: string;
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
        window.location.href = 'http://google.es';
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
  }*/

  // sendMessage() {
  //   console.log('Clickkkk');
  //   let message: ChatMessage;
  //   this.socket.emit('chat:message', {
  //     user: this.user,
  //     content: this.newMsg
  //   });
  //   this.newMsg = '';
  // }
}
