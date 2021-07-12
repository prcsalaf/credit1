 
try{
 
    var http = require('follow-redirects').http;
    var fs = require('fs');

    const querystring = require('querystring');
    
var  data = querystring.parse( process.argv[2] ).data; 
   
    var options = {
      'method': 'POST',
      'hostname': '10.240.0.114',
      'path': '/4DACTION/WS_CB_JSON',
      'headers': {
        'Authorization': 'Basic RFJDX1dTOipkcl8yMzQxJA==',
        'Content-Type': 'application/json'
      },
      'maxRedirects': 20
    };
    
    var req = http.request(options, function (res) {
      var chunks = [];
    
      res.on("data", function (chunk) {
        chunks.push(chunk);
      });
    
      res.on("end", function (chunk) {
        var body = Buffer.concat(chunks);
        console.log(body.toString());
      });
    
      res.on("error", function (error) {
        console.error(error);
      });
    });
 
    
      req.write(  '[' + data  +']'  );
    
     req.end();

}
catch(e){
    console.log("Erreur :"+ e)

}