<meta charset="utf-8">
<?php
include('Net/SSH2.php');
include('function.php');


for($xx=0;$xx<count($a_server);$xx++){
$ip=$a_server[$xx];
$port="26191";
$ssh = new Net_SSH2($ip,$port);
if (!$ssh->login($user, $pass)) {
header( "location: https://w2.stepzx.com/login.php" );
#exit();
exit("Login Failed : $ip Port  : $port");
}
#echo "<b>$ip</b><br>";

$pidof=$ssh->exec('pidof httpd');
$exp=@explode(" ",$pidof);

if(count($exp)<$row){
header( "location: ".$a_web[$xx]."" );
exit();
}
/*
echo $pidof;
echo "<hr>";
echo $a_web[$xx];
echo "<br>";
echo"Count = ".count($exp);
echo "<hr>";
*/
}

?>

