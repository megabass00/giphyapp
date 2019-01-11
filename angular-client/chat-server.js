// import { environment } from './src/environments/environment';
const express = require('express');
const path = require('path');
const http = require('http');
const socketIO = require('socket.io');

const app = express();
const port = process.env.PORT || 3000;

var environment = { production: false };
var usersConnected = {};


var staticPath = (environment.production) ? 'dist/angular-client' : 'app';
app.use(express.static(path.join(__dirname, staticPath)));
// app.use(express.static(path.join(__dirname, 'dist/angular-client')));
// app.use(express.static(path.join(__dirname, 'app')));

var redirectPath = (environment.production) ? 'dist/angular-client/index.html' : 'src/index.html';
app.get('*', (req, res) => {
    res.sendFile(path.join(__dirname, redirectPath));
    // res.sendFile(path.join(__dirname, 'dist/angular-client/index.html'));
    // res.sendFile(path.join(__dirname, 'src/index.html'));
});

const server = http.createServer(app);
const io = socketIO.listen(server);

io.on('connection', (socket) => {
    console.log('New user connected: '+socket.id);

    socket.on('disconnect', () => {
        console.log('User disconnected: '+socket.id);
    });

    socket.on('chat:message', (data) => {
       console.log(data);
       io.sockets.emit('chat:message', data);
    });

    socket.on('chat:typing', (data) => {
        console.log('Received typing from '+data.user.masterName);
        // console.log(data);
        // io.sockets.emit('chat:typing', data);
        socket.broadcast.send('chat:typing', data);
     });

    socket.on('chat:user', (user) => {
        console.log('Connected new user: '+ socket.id);
        var identifier = socket.id;
        usersConnected[identifier] = user;
        // console.log(usersConnected);

        var data = [];
        for (let [key, user] of Object.entries(usersConnected)) {
            console.log(user);
            data.push(user);
        }

        var dataToSend = JSON.stringify(data);
        // var dataToSend = JSON.stringify(usersConnected);
        // console.log(dataToSend);
        io.sockets.emit('chat:user', dataToSend);
        // socket.broadcast.send('chat:user', dataToSend);
    });
});

server.listen(port, () => {
    console.log(`Server running on port ${port}`); 
});
