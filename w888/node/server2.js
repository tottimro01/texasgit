var mysql = require('mysql');
var io = require('socket.io').listen(3002);
var fs = require('fs');
var connectionsArray = [];
var connection = mysql.createConnection({
    host: 'localhost',
    user: 'c1root',
    password: '963214785',
    database: 'c1open',
    port: 3306
});
var POLLING_INTERVAL = 90000;
var pollingTimer;

connection.connect(function(err) {
  if (err) {
    console.log(err);
  }
});

var pollingLoop = function() {
  // Doing the database query
  var query = connection.query('SELECT * FROM bom_tb_data_football_single'),
    ballss = [];
  query
    .on('error', function(err) {
      console.log(err);
      updateSockets(err);
    })
    .on('result', function(rows) {
      ballss.push(rows);
        //console.log(rows);
    })
    .on('end', function() {
      // loop on itself only if there are sockets still connected
      if (connectionsArray.length) {
        pollingTimer = setTimeout(pollingLoop, POLLING_INTERVAL);
        updateSockets({
          ballss: ballss
        });
      } else {
        console.log('The server timer was stopped because there are no more socket connections on the app');
      }
    });
};
var ballss = [];
var isInitBalls = false;
io.sockets.on('connection', function(socket){
	if (!connectionsArray.length) {
            pollingLoop();
       }

        socket.on('disconnect', function() {
                var socketIndex = connectionsArray.indexOf(socket);
                console.log('socketID = %s got disconnected', socketIndex);
                if (~socketIndex) {
                  connectionsArray.splice(socketIndex, 1);
                }
          });

        console.log('A new socket is connected!');
        connectionsArray.push(socket);
        console.log('Number of connections:' + connectionsArray.length);

        if(!isInitBalls){
                connection.query('SELECT * FROM bom_tb_data_football_single')
                .on('result', function(row){
                        ballss.push(row);
                })
                .on('end', function(){
                        socket.emit('loadTable', ballss);
                })
                isInitBalls = true;
        }else{
                socket.emit('loadTable', ballss);
        }

        socket.on('setVal', function(data1,data2,data3,data4){
        io.sockets.emit('setVal', data1,data2,data3,data4);
                if(data3=="t1"){
                                        var up_txt = 'update bom_tb_data_football_single set b_name_1 = "'+data2+'" where b_id = '+data1+' and b_add = '+data4;
                                        connection.query(up_txt);
                                        for(var i=0;i<ballss.length;i++){
                                                        if(ballss[i].b_id==data1 && ballss[i].b_add==data4){
                                                                ballss[i].b_name_1 = data2;
                                                        }
                                        }
                }else if(data3=="t2"){
                                        var up_txt = 'update bom_tb_data_football_single set b_name_2 = "'+data2+'" where b_id = '+data1+' and b_add = '+data4;
                                        connection.query(up_txt);
                                        for(var i=0;i<ballss.length;i++){
                                                        if(ballss[i].b_id==data1 && ballss[i].b_add==data4){
                                                                ballss[i].b_name_2 = data2;
                                                        }
									}
                }
    });
});
var updateSockets = function(data) {
  // adding the time of the last update
  ballss = [];
  ballss = data.ballss;
  data.time = new Date();
  console.log('Pushing new data to the clients connected ( connections amount = %s ) - %s', connectionsArray.length , data.time);
  //socket.emit('loadTable', data.ballss);
  // sending new data to all the sockets connected
  connectionsArray.forEach(function(tmpSocket) {
    tmpSocket.volatile.emit('loadTableRef', data);
  });
};
