// import { environment } from './src/environments/environment';
const express = require('express');
const path = require('path');
const http = require('http');
const socketIO = require('socket.io');

const app = express();
const port = process.env.PORT || 3000;

var environment = { production: false };

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
});

server.listen(port, () => {
    console.log(`Server running on port ${port}`); 
});
