import { Component, Input, OnInit, ViewEncapsulation, ElementRef, ViewChild } from '@angular/core';
import { Idle } from 'idlejs/dist';
import { DatePipe } from '@angular/common';
import { UploadEvent, UploadFile, FileSystemFileEntry, FileSystemDirectoryEntry } from 'ngx-file-drop';

import { ChatService } from '../../services/chat.service';
import { GiphiesService } from '../../services/giphies.service'

import { LoggedUser } from '../../services/logged-user.service'
import { User } from '../../interfaces/user'
import { Giphy } from '../../interfaces/giphy'
import { ChatMessage, ChatMessageType } from '../../interfaces/chat-message'

import { Action } from '../../services/chat.service';
import { Event } from '../../services/chat.service';
import { from } from 'rxjs';


@Component({
  selector: 'app-chat',
  templateUrl: './chat.component.html',
  styleUrls: ['./chat.component.css'],
  encapsulation: ViewEncapsulation.None,
})
export class ChatComponent implements OnInit {
  @ViewChild('contentScroll') private contentScroll: ElementRef;
  @ViewChild('sendMessageInput') private sendMessageInput: ElementRef;
  @ViewChild('searchGiphyInput') private searchGiphyInput: ElementRef;

  // action = Action;
  idle: Idle;
  ioConnection: any;

  user: User;
  chatMessageType = ChatMessageType;
  messages: ChatMessage[] = [];
  usersConnected: User[] = [];
  usersTyping: User[] = [];

  giphies: Giphy[] = [];
  giphiesFiltered: Giphy[] = [];
  initializedGiphies: boolean = false;

  showActionMenu: boolean = false;
  newMsg: string;
  content: string;
  fileUploading: boolean = false;
  receivingFile: boolean = false;
  isDroppingFile: boolean = false;
  

  constructor(
    private chatService: ChatService,
    private giphiesService: GiphiesService,
    private loggedUser: LoggedUser
  ) 
  { 
    this.user = this.loggedUser.data;
  }


  ngOnInit(): void {
    this.initIoConnection();
    this.sendMessageInput.nativeElement.focus();
    this.initAutoLogout();
    this.initGiphies();
  }

  // initialization
  private initIoConnection(): void {
    this.chatService.initSocket();

    // user reveived //
    this.ioConnection = this.chatService.onUserConnected().subscribe((usersData: string) => {
        var users = JSON.parse(usersData);
        this.usersConnected = users;
    });
    
    // message received //
    this.ioConnection = this.chatService.onMessage().subscribe((message: ChatMessage) => {
        this.messages.push(message);
        this.scrollToBottom();
    });

    // type received //
    this.ioConnection = this.chatService.onType().subscribe((usersData: string) => {
        var users = JSON.parse(usersData);
        this.usersTyping = users;
    });

    // receiving file
    this.ioConnection = this.chatService.onReceivingFile().subscribe((message: string) => {
        this.receivingFile = true;
        console.log(message);
    });
    // file received
    this.ioConnection = this.chatService.onFile().subscribe((message: ChatMessage) => {
        this.messages.push(message);
        this.scrollToBottom();
        this.receivingFile = false;
    });

    // giphy received
    this.ioConnection = this.chatService.onGiphy().subscribe((message: ChatMessage) => {
        this.messages.push(message);
        this.scrollToBottom();
    });

    // link received
    this.ioConnection = this.chatService.onLink().subscribe((message: ChatMessage) => {
        this.messages.push(message);
        this.scrollToBottom();
    })


    // close all tabs meesage
    this.ioConnection = this.chatService.onCloseAllTabs().subscribe((data: string) => {
        console.log('CLOSING ALL TABS!!!');
        // window.location.href = '/';
        window.location.href = 'https://www.the-art-company.com/es/';
    })
    
    // events //
    this.chatService.onEvent(Event.CONNECT).subscribe(() => {
        console.log('Connected to Chat of Masters');
        this.chatService.sendUser(this.user);
    });
      
    this.chatService.onEvent(Event.DISCONNECT).subscribe(() => {
        console.log('Disconnected of chat');
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

  private initGiphies(): void {
    console.log('Initializing giphies');
    this.giphiesService.getGiphies().subscribe(
      data => { 
        // console.log(data);
        this.giphies = this.giphiesFiltered = data;
        this.initializedGiphies = true;
      },
      err => console.log(err)
    );
  }

  public menu() {
    this.showActionMenu = !this.showActionMenu;
  }

  private scrollToBottom() {
    try {
        this.contentScroll.nativeElement.scrollTop = this.contentScroll.nativeElement.scrollHeight;
    } catch(err) { }
  }

  public clearMessages() {
    this.messages = [];
    this.showActionMenu = false;
  }
  
  public searchGiphy(event: any) {
    var term = event.target.value;
    if (!term || term==='') return;
    term = term.toLowerCase();
    console.log('Searching: '+ term);
    this.giphiesFiltered = this.giphies.filter(
      giphy => giphy.title.toLocaleLowerCase().includes(term)
    );
  }

  public resetSearch() {
    this.searchGiphyInput.nativeElement.value = '';
    this.searchGiphyInput.nativeElement.focus();
    this.giphiesFiltered = this.giphies;
  }

  
  // custom properties
  private _userTypingString = '';
  @Input()
  get userTypingString(): string { 
    if (!this.usersTyping.length) return '';
    var retval = '';    
    for (var i=0; i<this.usersTyping.length; i++) {
      var u:User = this.usersTyping[i];
      retval += u.masterName+', ';
    }
    retval += (this.usersTyping.length > 1) ? ' are typing...' : ' is typing...';
    return retval;
  }



  // chat methods
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

      if (newMessage.includes('http://') ||
          newMessage.includes('https://')) 
      {
        console.log('URL detected!!!');
        var urlRegex = /(https?:\/\/[^ ]*)/;
        var link = newMessage.match(urlRegex)[1];
        this.chatService.sendLink({
          user: this.user,
          date: Date.now(),
          content: link,
          type: ChatMessageType.LINK
        });
        this.newMsg = '';
        this.scrollToBottom();
        this.sendMessageInput.nativeElement.focus();
        return false;
      }
      
      newMessage = this.filterMessage(newMessage);
      this.chatService.sendMessage({
        user: this.user,
        content: newMessage,
        date: Date.now(),
        type: ChatMessageType.TEXT
      });

      this.newMsg = '';
      this.scrollToBottom();
      return false;
  }

  public sendTyping(event: any): void {
    this.chatService.sendTyping({
      user: this.user,
      content: this.newMsg, 
      date: Date.now(),
      type: ChatMessageType.TEXT
    });
  }

  public sendFile(file): void {
    this.fileUploading = true;
    var reader = new FileReader();
    reader.onload = (e: any) => {
      console.log('File readed OK');
      this.chatService.sendFile({
        user: this.user,
        content: e.target.result,
        date: Date.now(),
        type: ChatMessageType.FILE
      });
      this.ioConnection = this.chatService.onFileUploaded().subscribe((data) => {
        console.log(data);
        this.fileUploading = false;
      });
    }
    reader.readAsDataURL(file);
  }

  public sendInputFile(event: any) {
    if (event.target.files && event.target.files[0]) {
      this.sendFile(event.target.files[0]);
    }
  } 

  public sendGiphy(giphy) {
    this.chatService.sendGiphy({
      user: this.user,
      date: Date.now(),
      content: giphy,
      type: ChatMessageType.GIPHY
    })
  }

  public closeAllTabs() {
    this.showActionMenu = false;
    this.chatService.sendCloseAllTabs();
  }


  public replyMessage(message: ChatMessage) {
    console.log(message);
    var replyHtml = `<span class="reply-msg">Reply to: (${ message.user.masterName }) ${ message.content }</div>`;
    this.newMsg = replyHtml;
    this.sendMessageInput.nativeElement.focus();
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
      type: ChatMessageType.TEXT
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

  public isImageLink(link: string): boolean {
    var extension = link.substr(link.lastIndexOf('.') + 1);
    if (!extension) return false;
    extension = extension.toLocaleLowerCase();
    console.log(extension);
    if (extension === 'jpg'
      || extension === 'jpeg'
      || extension === 'png'
      || extension === 'gif'
      || extension === 'svg')
    {
      return true;
    }else{
      return false;
    }
  }


  // file drop/drag
  public dropped(event: UploadEvent) {
    if (event.files.length > 1) {
      alert('You only send one image file each time');
      return;
    }

    var file:UploadFile = event.files[0];
    if (file.fileEntry.isFile) {
      const fileEntry = file.fileEntry as FileSystemFileEntry;
      fileEntry.file((file: File) => {
        // console.log(droppedFile.relativePath);
        // console.log(file);
        if (file.type.includes('jpg') 
          || file.type.includes('jpeg')
          || file.type.includes('png')
          || file.type.includes('gif'))
        {
          this.sendFile(file);
        }else{
          alert('You can not send not image files');
        }
      });
    } else {
      const fileEntry = file.fileEntry as FileSystemDirectoryEntry;
      console.log(file.relativePath, fileEntry);
      alert('You must send a valid file');
    }
  }
 
  public fileOver(event){
    this.isDroppingFile = true;
    // console.log(event);
  }
 
  public fileLeave(event){
    this.isDroppingFile = true;
    // console.log(event);
  }
}
