<meta charset="utf-8">
<input name="b_reboot_httpd" type="submit" value="httpd Restart ทั้งหมด" class="input" id="b_reboot_httpd"/>&nbsp;&nbsp;||&nbsp;&nbsp;
<input name="b_reboot_zx" type="submit" value="เครื่องค้าง" class="input" id="b_reboot_zx"/><br><br>
<?php
include('Net/SSH2.php');
include('function.php');

############################httpd Restart
if(isset($_POST[b_reboot_httpd])){

for($xx=0;$xx<count($a_server8);$xx++){
$ip8=$a_server8[$xx];
$port8="26191";

$ssh8 = new Net_SSH2($ip8,$port8);
if (!$ssh8->login($user, $pass)) {
    exit("Login Failed : $ip8 Port  : $port8");
}
echo "<h3>$ip8 : $port8</h3>".date("d-m-Y H:i:s").'<br>';

echo $ssh8->exec('service httpd restart');
echo $ssh8->exec('systemctl restart httpd.service');
}
}


############################เครื่องค้าง
if(isset($_POST[b_reboot_zx])){

for($xx=0;$xx<count($a_server8);$xx++){
$ip8=$a_server8[$xx];
$port8="26191";

$ssh8 = new Net_SSH2($ip8,$port8);
if (!$ssh8->login($user, $pass)) {
    exit("Login Failed : $ip8 Port  : $port8");
}
echo "<h3>$ip8 : $port8</h3>".date("d-m-Y H:i:s").'<br>';

echo $ssh8->exec('find /var/log -type f -exec /bin/cp /dev/null {} \;');
echo $ssh8->exec('reboot');
}
}


##################httpd  Restart
if(isset($_POST[b_restart])){
	
$ip=$_POST[tserver];
$port="26191";
$ssh = new Net_SSH2($ip,$port);
if (!$ssh->login($user, $pass)) {
    exit("Login Failed : $ip");
}
echo "<h3>httpd Restart : $ip</h3>".date("d-m-Y H:i:s").'<br>';

echo $ssh->exec('service httpd restart');
echo $ssh->exec('systemctl restart httpd.service');

}


for($xx=0;$xx<count($a_server8);$xx++){
$ip=$a_server8[$xx];
$port="26191";
$ssh = new Net_SSH2($ip,$port);
if (!$ssh->login($user, $pass)) {
    exit("Login Failed : $ip Port  : $port");
}
echo '<form action="" method="post">
<b>'.$ip.'</b>
<input name="tserver" type="hidden" id="tserver" value="'.$ip.'">
<input name="b_restart" type="submit" value="httpd Restart" class="input"/>
<br>
</form>';

echo $pidof=$ssh->exec('pidof httpd');
$exp=@explode(" ",$pidof);



echo "<br><b>Count = ".count($exp)."</b><hr>";
}

?>

