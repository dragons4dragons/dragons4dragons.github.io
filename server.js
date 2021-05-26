const express = require('express');
const app = new express();

var location = 'new';

app.get('/', function(request, response){
    response.sendFile(__dirname + '/' + location + '/index.html');
});

app.use(express.static(location))

app.listen(3000, () => {
  console.log("server running!");
})