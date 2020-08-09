<?
  session_start();
  header("Content-Type: application/json");
  require_once '../inc/conn.php';
  require_once '../inc/function.php';
  
include('Net/SSH2.php');

$user='root';
$pass='!Bomload9632';

$ip="61.19.21.221";
$port="22";


  $val = $_POST['val'];
  $arr_return = array();
  
  if($val==1){
	  
###############################


$ssh = new Net_SSH2($ip,$port);
if (!$ssh->login($user, $pass)) {
   # exit("Login Failed : $ip8 Port  : $port8");
	 $arr_return["msg"] = "Login Failed : $ip Port  : $port";
}
#$ssh->exec('pm2 start /home/ohoking/domains/proking.com/public_html/nodejs/node_ohoking_member.js');
$ssh->exec('pm2 start /home/ohoking/domains/proking.com/public_html/nodejs/node_ohoking_member.js');
#$pidof=$ssh->exec('pidof httpd');

 $arr_return["msg"] = "เปิด Node แล้ว $pidof";
###############################

  }else if($val==0){
###############################

$ssh = new Net_SSH2($ip,$port);
if (!$ssh->login($user, $pass)) {
   # exit("Login Failed : $ip8 Port  : $port8");
	 $arr_return["msg"] = "Login Failed : $ip Port  : $port";
}
#$ssh->exec('pm2 stop /home/ohoking/domains/proking.com/public_html/nodejs/node_ohoking_member.js');
$ssh->exec('pm2 stop /home/ohoking/domains/proking.com/public_html/nodejs/node_ohoking_member.js');
 $arr_return["msg"] = "ปิด Node แล้ว";
###############################
   # $arr_return["msg"] = "ปิด Node แล้ว";
  }

  echo json_encode($arr_return);
?>