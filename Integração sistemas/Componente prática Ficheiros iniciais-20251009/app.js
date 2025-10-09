// app.js (replace everything with this)
const http = require('http');
const fs = require('fs');
const path = require('path');

http.createServer((req, res) => {
  const pathname = req.url === '/' ? '/index.html' : req.url;
  const filePath = path.join(__dirname, pathname);

  const mimes = {
    '.html': 'text/html',
    '.js': 'text/javascript',
    '.css': 'text/css',
    '.xml': 'application/xml',
    '.json': 'application/json',
    '.ico': 'image/x-icon'
  };
  const ext = path.extname(filePath).toLowerCase();
  const type = mimes[ext] || 'application/octet-stream';

  fs.readFile(filePath, (err, data) => {
    if (err) {
      res.writeHead(404, {'Content-Type': 'text/plain'});
      return res.end('404 Not Found');
    }
    res.writeHead(200, {'Content-Type': type});
    res.end(data);
  });
}).listen(8080, () => {
  console.log('Server running at http://localhost:8080');
});