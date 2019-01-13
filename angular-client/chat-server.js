// import { environment } from './src/environments/environment';
const express = require('express');
const path = require('path');
const http = require('http');
const socketIO = require('socket.io');

const app = express();
const port = process.env.PORT || 3000;

var environment = { production: false };
var usersConnected = {};
var usersTyping = {};


var staticPath = (environment.production) ? 'dist/angular-client' : 'app';
app.use(express.static(path.join(__dirname, staticPath)));

var redirectPath = (environment.production) ? 'dist/angular-client/index.html' : 'src/index.html';
app.get('*', (req, res) => {
    res.sendFile(path.join(__dirname, redirectPath));
});

const server = http.createServer(app);
const io = socketIO.listen(server);


function prepareJson(data) {
    var retval = [];
    for (let [key, user] of Object.entries(data)) {
        retval.push(user);
    }
    return JSON.stringify(retval);
}


io.on('connection', (socket) => {
    console.log('New user connected: '+socket.id);

    socket.on('disconnect', () => {
        console.log('User disconnected: '+socket.id +') :: Users connected '+Object.keys(usersConnected).length);
        delete usersConnected[socket.id];
        if (usersConnected[socket.id])
            delete usersConnected[socket.id];
    });


    socket.on('chat:user', (user) => {
        var identifier = socket.id;
        usersConnected[identifier] = user;
        console.log('Added new user ('+ socket.id +') :: Users connected '+Object.keys(usersConnected).length);
        var dataToSend = prepareJson(usersConnected);
        io.sockets.emit('chat:user', dataToSend);
        // socket.broadcast.send('chat:user', dataToSend);
    });

    socket.on('chat:message', (data) => {
       console.log(data);
       io.sockets.emit('chat:message', data);
    });

    socket.on('chat:typing', (data) => {
        if (!data.content) return;
        console.log('Received typing from '+data.user.masterName+' ('+data.content+')');
        var identifier = socket.id;
        if (data.content.length > 1) {
            usersTyping[identifier] = data.user;
        }else{
            delete usersTyping[identifier];
        }
        var dataToSend = prepareJson(usersTyping);
        io.sockets.emit('chat:typing', dataToSend);
        // socket.broadcast.send('chat:typing', dataToSend);
    });

    socket.on('chat:file', (data) => {
        console.log('Reveived file from '+ data.user.masterName);
        socket.emit('chat:fileUploaded', 'File uploaded successfully in server');
        io.sockets.emit('chat:receivingFile', 'Downloading file').emit('chat:file', data);
        // io.sockets.emit('chat:file', data);
    });

    socket.on('chat:giphy', (data) => {
        console.log('Reveived giphy from '+ data.user.masterName);
        io.sockets.emit('chat:giphy', data);
    });

    socket.on('chat:link', (data) => {
        console.log('Reveived link from '+ data.user.masterName);
        io.sockets.emit('chat:link', data);
    });

    socket.on('chat:closeAllTabs', () => {
        console.log('Receved message to close all tabs');
        io.sockets.emit('chat:closeAllTabs', 'closeTabs');
    });
});

server.listen(port, () => {
    console.log(`Server running on port ${port}`); 
});
