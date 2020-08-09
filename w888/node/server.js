var mysql = require('mysql');
var io = require('socket.io').listen(3002);
var fs = require('fs');
var connectionsArray = [];
var sql_txt = "";
var connection = mysql.createConnection({
    host: '210.1.60.131',
    user: 'openroot',
    password: '963214785',
    database: 'admin_lotto17',
    port: 3306
});
var POLLING_INTERVAL = 5000;
var pollingTimer;

connection.connect(function(err) {
  if (err) {
    console.log(err);
  }
});
var pollingLoop = function() {
  // Doing the database query
  var query = connection.query(sql_txt),
    ballss = [];
  query
    .on('error', function(err) {
      console.log(err);
      updateSockets(err);
    })
    .on('result', function(rows) {
      ballss.push(rows);
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
	
	socket.on('setDate', function(data) {
		clearTimeout(pollingTimer);
		sql_txt = "select sum(case when ((b_share_m)+(b_myshare_3)+(b_myshare_2)+(b_myshare_1)) > (b_share_force_1)  then  ((b_total)*((100- ((b_share_m)+(b_myshare_3)+(b_myshare_2)+(b_myshare_1)))/100))else  ((b_total)*((100-b_share_force_1)/100))end	) as bt , sum(case when ((b_share_m)+(b_myshare_3)+(b_myshare_2)+(b_myshare_1)) > (b_share_force_1)  then  ((br_pay_1)*((100- ((b_share_m)+(b_myshare_3)+(b_myshare_2)+(b_myshare_1)))/100))else  ((br_pay_1)*((100-b_share_force_1)/100))end	) as bs , sum(case when ((b_share_m)+(b_myshare_3)+(b_myshare_2)+(b_myshare_1)) > (b_share_force_1)  then  ((br_bonus_1)*((100- ((b_share_m)+(b_myshare_3)+(b_myshare_2)+(b_myshare_1)))/100))else  ((br_bonus_1)*((100-b_share_force_1)/100))end	) as bb from bom_tb_lotto_bill_play where   b_date = '"+data.d+"'  and b_accept=1";
		pollingLoop();
    });
	
        socket.on('disconnect', function() {
                var socketIndex = connectionsArray.indexOf(socket);
                console.log('socketID = %s got disconnected', socketIndex);
                if (~socketIndex) {
                  connectionsArray.splice(socketIndex, 1);
                }
				if (connectionsArray.length<=0) {
					clearTimeout(pollingTimer);
				}
          });

        console.log('A new socket is connected!');
        connectionsArray.push(socket);
        console.log('Number of connections:' + connectionsArray.length);     
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