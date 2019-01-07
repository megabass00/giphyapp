console.log('GiphyChat Server is initializing...');

const path = require('path')
const express = require('express');
const app = express();


// settings
app.set('port', process.env.PORT || 3000)
// remove all node process: killall node

// static files
// console.log(path.join(__dirname, 'public'))
app.use(express.static(path.join(__dirname, 'public')))

// start server
const server = app.listen(app.get('port'), () => {
    console.log('Server on port ' + app.get('port'))
})


// websockets
const socketIO = require('socket.io')
const io = socketIO.listen(server)

io.on('connection', (socket) => {
    console.log('New connection: ' + socket.id);

    socket.emit('chat:message', (data) => {
        console.log(data)
        
    })
})
