// imports ^w^
const express = require("express");
const http = require("http");
var path = require('path');

// redirect to https :/
http.createServer(function (req, res) {
  res.sendFile(path.join(__dirname, '..') + '/docs/index.html');
  //res.writeHead(301, { "Location": "https://" + req.headers['host'] + req.url });
  res.end();
}).listen(80);