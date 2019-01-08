import { User } from './user'
// import { Action } from '../services/chat.service';

export interface ChatMessage {
    date: Number,
    user: User;
    content: String;
    // action: Action;
}