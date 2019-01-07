console.log('Chat code');

const socket = io();

let message = document.getElementById('message');
let username = document.getElementById('username');
let btnSend = document.getElementById('send');
let output = document.getElementById('output');
let actions = document.getElementById('actions');

btnSend.addEventListener('click', function() {
    var msg = {
        username: username.value,
        message: message.value
    };
    console.log(msg);
    socket.emit('chat:message', msg);
    
})