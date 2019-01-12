import { Injectable } from '@angular/core';
import { Observable } from 'rxjs/Observable';
import { Observer } from 'rxjs/Observer';
import * as socketIo from 'socket.io-client';
import { environment } from '../../environments/environment';

import { User } from '../interfaces/user'
import { ChatMessage } from '../interfaces/chat-message'

// const SERVER_URL = 'http://localhost:3000';
// const SERVER_URL = location.protocol+'//'+location.hostname+':'+port;


// custom enum
export enum Action {
  JOINED,
  LEFT,
  RENAME
}

export enum Event {
  CONNECT = 'connect',
  DISCONNECT = 'disconnect'
}


@Injectable({
  providedIn: 'root'
})
export class ChatService {

    constructor() { }


    private socket;

    public initSocket(): void {
        console.log('Initializing chatService with server url: '+ environment.chatServerURL);
        this.socket = socketIo(environment.chatServerURL);
    }

    // sendind user
    public sendUser(user: User): void {
        this.socket.emit('chat:user', user);
    }

    public onUserConnected(): Observable<string> {
        return new Observable<string>(observer => {
            console.log('New user connected');
            this.socket.on('chat:user', (data: string) => observer.next(data));
        });
    }

    // sendind messages
    public sendMessage(message: ChatMessage): void {
        this.socket.emit('chat:message', message);
    }

    public onMessage(): Observable<ChatMessage> {
        return new Observable<ChatMessage>(observer => {
            this.socket.on('chat:message', (data: ChatMessage) => observer.next(data));
        });
    }

    // someone is typing
    public sendTyping(message: ChatMessage): void {
        this.socket.emit('chat:typing', message);
    }

    public onType(): Observable<string> {
        return new Observable<string>(observer => {
            this.socket.on('chat:typing', (data:string) => observer.next(data));
        });
    }

    // sendind files
    public sendFile(message: ChatMessage): void {
        this.socket.emit('chat:file', message);
    }

    public onFile(): Observable<ChatMessage> {
        return new Observable<ChatMessage>(observer => {
            this.socket.on('chat:file', (data: ChatMessage) => observer.next(data));
        });
    }

    // sending giphies
    public sendGiphy(message: ChatMessage): void {
        this.socket.emit('chat:giphy', message);
    }

    public onGiphy(): Observable<ChatMessage> {
        return new Observable<ChatMessage>(observer => {
            this.socket.on('chat:giphy', (data: ChatMessage) => observer.next(data));
        });
    }

    // close all tabs
    public sendCloseAllTabs(): void {
        this.socket.emit('chat:closeAllTabs');
    }

    public onCloseAllTabs(): Observable<string> {
        return new Observable<string>(observer => {
            this.socket.on('chat:closeAllTabs', (data: string) => observer.next(data));
        })
    }


    // manage events
    public onEvent(event: Event): Observable<any> {
        return new Observable<Event>(observer => {
            this.socket.on(event, () => observer.next());
        });
    }
}
