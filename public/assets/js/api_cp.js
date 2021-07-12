 
try{
 
  var http = require('follow-redirects').http;
  var fs = require('fs');

  const querystring = require('querystring');
  
var  data = querystring.parse( process.argv[2] ).data; 

// console.log( data);

var rslt = [{
  "VIDRapport": "44698303-1106677",
  "VCode_err": "",
  "VInfo_negatif": 2709016,
  "VFlag_CB": 1 ,
  "R_GRAV_CB": "A8 - NIVEAU 5-TRES ELEVE",   
  "R_GRAV_HIST_SALF": "B999 - NIVEAU 3-MOYEN",   
  "R_GRAV_FIC": "C999 - NIVEAU 1-TRES FAIBLE",
  "R_GRAV_CDL": "D999 - NIVEAU 3-MOYEN",
  "VRating": 5,
  "VSCORE_CB": "505",
  "VGRADE_SCORE_CB": "D3",
  "R_GRAV_TSL": "E999 - NIVEAU 3-MOYEN",
  "V_LibAnomalie": ""
}] ;

console.log( JSON.stringify(rslt) );
  

 
  // var options = {
  //   'method': 'POST',
  //   'hostname': '10.240.0.114',
  //   'path': '/4DACTION/WS_CB_JSON',
  //   'headers': {
  //     'Authorization': 'Basic RFJDX1dTOipkcl8yMzQxJA==',
  //     'Content-Type': 'application/json'
  //   },
  //   'maxRedirects': 20
  // };
  
  // var req = http.request(options, function (res) {
  //   var chunks = [];
  
  //   res.on("data", function (chunk) {
  //     chunks.push(chunk);
  //   });
  
  //   res.on("end", function (chunk) {
  //     var body = Buffer.concat(chunks);
  //     console.log(body.toString());
  //   });
  
  //   res.on("error", function (error) {
  //     console.error(error);
  //   });
  // });

  
  //   req.write(    data     );
  
  //  req.end();

}
catch(e){
  console.log("Erreur :"+ e)

}