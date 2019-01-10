export interface User {
    id: number;
    type:string;
    masterName: string;
    userName: string;
    avatar: string;
    email: string;
}


export class User implements User {
    // constructor() {}
}